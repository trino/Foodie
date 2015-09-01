<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RestaurantsController extends AppController {
    public $paginate = [
        'limit' => 10,
        'order' => ['ID' => 'DESC'],
    ];

    public function index($slug='') {
        $this->loadComponent('Paginator');
        $menus = "";
        if ($slug) {//this code fails if the user is not an employee
            $restaurant = $this->Manager->get_restaurant($slug);
            //print_r($restaurant); die;
            if(isset($restaurant->ID) && !is_null($restaurant->ID)){
                $menus = $this->Paginate($this->Manager->enum_menus($restaurant->ID));
                //echo '<pre>';print_r($this->Manager->enum_menus($restaurant->ID)); die;
            }
            $this->set('menus', $menus);
        }
        $this->set('manager',$this->Manager);
        $this->set('restaurant',$restaurant);
        if(isset($_GET['page'])) {
            die('ok2');
            $this->layout = 'blank';
            $this->render('loadmenus');   
        }
    }

    public function dashboard() {
        $this->layout='admin';
        if($this->Manager->check_permission("CanEditGlobalSettings") && isset($_GET["ID"])){
            $Restaurant = $_GET["ID"];
        } else {
            $Restaurant = $this->Manager->get_current_restaurant();
        }
        if($Restaurant) {
            if (isset($_POST["Name"])){
                $this->Manager->edit_restaurant($Restaurant, $_POST["Name"], $_POST["Genre"], $_POST["Email"], $_POST["Phone"], $_POST["Address"], $_POST["City"], $_POST["Province"], $_POST["Country"], $_POST["PostalCode"], $_POST["Description"], $_POST["DeliveryFee"], $_POST["Minimum"]);
                $this->Manager->edit_hours($Restaurant, $_POST);
                $this->Flash->success("Restaurant updated successfully");
            }
            $Restaurant = $this->Manager->get_restaurant($Restaurant, true);
        } else {
            $Restaurant = $this->Manager->blank_restaurant();
        }
        $this->set("Restaurant", $Restaurant);
        $this->set("Genres", $this->Manager->enum_genres());
    }


    public function all() {
        $this->layout='admin';
        //$this->set("Restaurants", $this->Manager->enum_restaurants());
        //$this->set("Genres", $this->Manager->enum_genres());
    }
    
   

    public function signup() {
        $this->layout='admin';
        $Me = $this->Manager->read('ID');
        $Restaurant="";
        $DidSave = false;
        if($Me) {
            $Restaurant = $this->Manager->get_current_restaurant();
        }
        if (isset($_POST["Name"])){
            $_POST["Email"] = trim(strtolower($_POST["Email"]));
            $DidSave = !$this->Manager->get_entry("restaurants",  $_POST["Email"], "Email") && !$this->Manager->is_email_in_use($_POST["Email"]);
            if($DidSave) {
                $Restaurant = $this->Manager->edit_restaurant($Restaurant, $_POST["Name"], $_POST["Genre"], $_POST["Email"], $_POST["Phone"], $_POST["Address"], $_POST["City"], $_POST["Province"], $_POST["Country"], $_POST["PostalCode"], $_POST["Description"], $_POST["DeliveryFee"], $_POST["Minimum"]);
                $this->Manager->edit_hours($Restaurant, $_POST);
                if ($Me) {
                    $this->Manager->hire_employee($Me, $Restaurant, 3);
                } else {
                    $this->Manager->new_profile(0, $_POST["Name"] . " (Owner)", "", 3, $_POST["Email"], $_POST["Phone"], $Restaurant);
                }
                $this->Flash->success("Restaurant created and you have been assigned to it");
                $this->redirect("/");
            } else {
                $this->Flash->error("That email address is in use");
            }
        }
        if($Restaurant) {
            $Restaurant = $this->Manager->get_restaurant($Restaurant, true);
        } else {
            $Restaurant = $this->Manager->blank_restaurant();
        }
        $this->set("Genres", $this->Manager->enum_genres());
        $this->set("Restaurant", $Restaurant);
    }

    public function menu_manager() {
        $this->layout='admin';
        //$menus = TableRegistry::get('menus');
        //$model = $menus->find()->where(['res_id' => $this->Manager->read('ID'),'parent'=>0])->order(['display_order'=>'asc'])->all();
        $model = $this->Manager->enum_menus("", "asc");
        $this->set('menus',$model);
    }

    public function report() {
        $this->layout='admin';
    }

    public function orders($type = "") {
        $this->set('type',$type);
        $this->layout='orders';
        if (isset($_GET["ID"]) && $this->Manager->check_permission("CanEditGlobalSettings")){
            $RestaurantID = $_GET["ID"];
        } else {
            $RestaurantID = $this->Manager->get_current_restaurant();
        }
        $this->set("OrderType", "Restaurant");
        $this->set("Orders", $this->Manager->enum_orders($RestaurantID));

        $q = $this->Manager->enum_orders($RestaurantID, false, $type != 'pending');
        if($type=='pending'){  //$q = $ord->find()->where(['res_id'=>$rid,'approved'=>0,'cancelled'=>0])->order(['order_time'=>'desc']);
            $this->set('title','Pending Orders');
        } else{ //$q = $ord->find()->where(['res_id'=>$rid,'(approved = 1 OR cancelled=1)'])->order(['order_time'=>'desc']);
            $this->set('title','Order History');
        }
        $this->set('Orders',$q);
                        
    }

    function eventlog(){
        $this->layout='admin';
        $Restaurant = $this->Manager->get_profile($this->Manager->read('ID'))->RestaurantID;

        $Events = $this->Manager->enum_events($Restaurant);
        $this->set("Events", $Events);

        $Profiles = $this->Manager->enum_profiles("RestaurantID", $Restaurant);
        $this->set("Profiles", $Profiles);
    }

    function employees(){
        $this->layout='admin';
        $Profile = $this->Manager->get_profile();
        if (isset($_GET["action"])){
            switch($_GET["action"]){
                case "usersearch":
                    $conditions = array();
                    $ProfileType = $this->get_profile_type($Profile->ID);
                    if(!$ProfileType->CanPossess && !$ProfileType->CanEditGlobalSettings) {
                        $conditions["RestaurantID"] = 0;
                    }
                    if ($_GET["Name"]){
                        $conditions[] = "Name like '%" . $_GET["Name"] . "%'";
                    }
                    if ($_GET["Email"]){
                        $conditions["Email"] = trim(strtolower($_GET["Email"]));
                    }
                    if ($_GET["Phone"]){
                        $conditions["Phone"] = $this->Manager->cleanphone($_GET["Phone"]);
                    }
                    $this->set("Users", $this->Manager->enum_all("profiles", $conditions));
                    break;
                case "newemployee":
                    $profile=$this->Manager->new_profile($Profile->ID, $_GET["Name"], "", $_GET["ProfileType"], $_GET["Email"], $_GET["Phone"], $Profile->RestaurantID, 0);
                    $this->Manager->status($profile, "Profile created", "Profile could not be created");
                    if($profile) {
                        $this->loadComponent("Mailer");
                        $this->Mailer->sendEmail($profile["Email"], "A profile was created for you", "Your user ID is " . $profile["Email"] . "<BR>Your password is: " . $profile["Password"]);
                    }
                    break;
                case "hire":
                    $this->Manager->status($this->Manager->hire_employee($_GET["ID"], $Profile->RestaurantID, 4), "Employee was hired", "Unable to hire employee");
                    break;
                case "fire":
                    $this->Manager->status($this->Manager->hire_employee($_GET["ID"], 0, 999), "Employee was fired", "Unable to fire employee");
                    break;
                case "possess":
                    if($this->Manager->check_permission("CanPossess")){
                        $this->Flash->success("You have possessed this user");
                        $this->Manager->login($_GET["ID"]);
                    } else {
                        $this->Flash->error("I'm sorry Dave, I'm afraid I can't do that");
                    }
            }
        }
        $this->set("Employees", $this->Manager->enum_employees($Profile->RestaurantID,$Profile->Hierarchy));
        $this->set("ProfileTypes", $this->Manager->enum_profiletypes(0, false));
    }

    function restaurants(){
        $this->layout='admin';
        if (isset($_GET["action"])) {
            if ($this->Manager->check_permission("CanEditGlobalSettings")) {
                $Restaurant = $_GET["ID"];
                switch (strtolower($_GET["action"])) {
                    case "open":
                        $this->Manager->openclose_restaurant($Restaurant, true);
                        break;
                    case "close":
                        $this->Manager->openclose_restaurant($Restaurant, false);
                        break;
                    case "delete":
                        $this->Manager->delete_restaurant($Restaurant);
                        break;
                }
                $this->Flash->success("The restaurant has been " . strtolower($_GET["action"]) . "ed");
            }
        }
    }

    function newsletter(){
        $this->layout='admin';
        $subscribers =  $this->Manager->enum_subscribers();
        $this->set("Subscribers", $subscribers);
        if (isset($_POST["action"]) && count($subscribers)){
            $this->loadComponent("Mailer");
            foreach($subscribers as $Email) {
                $this->Mailer->sendEmail($Email, $_POST["subject"], $_POST["newsletter"]);
            }
            $this->Flash->success(count($subscribers) .  " were emailed");
        }
    }

    function addresses(){
        $this->layout='admin';
        $RestaurantID = $this->Manager->get_current_restaurant();
        $this->set("RestaurantID", $RestaurantID);
        if (isset($_GET["action"])) {
            switch (strtolower($_GET["action"])) {
                case "deactivate":
                    $this->Manager->delete_notification_address($RestaurantID, $_GET["address"]);
                    $this->Flash->success("The address was deleted");
                    break;
                case "activate":
                    $MaxAdd = 3;
                    $DataType = $this->Manager->data_type($_GET["address"]);
                    $Current = $this->Manager->count_notification_addresses($RestaurantID, $DataType);
                    if($Current < $MaxAdd && ($DataType == 0 || $DataType == 1)) {
                        $this->Manager->add_notification_addresses($RestaurantID, $_GET["address"]);
                        $this->Flash->success("The address was added");
                    } else {
                        $this->Flash->error("You have depleted the number of addresses for that type, or the type is not allowed (" . $this->Manager->data_type_name($DataType) . ")");
                    }
                    break;
            }
        }
        $this->set("Addresses", $this->Manager->sort_notification_addresses($RestaurantID));
        $this->set("Employees", $this->Manager->enum_employees());
    }


    public function delete_order($ID, $type) {
        $this->Manager->delete_order($ID);
        $this->redirect('/restaurants/orders/'.$type);
    }

    public function approve_order($ID) {
        $this->Manager->approve_order($ID, true);
        $this->redirect('/restaurants/orders/pending');
    }
    
    public function cancel_order($ID) {
        $this->Manager->approve_order($ID, false);
        $this->redirect('/restaurants/orders/pending');
    }

    public function order_detail($ID) {
        $this->layout='orders';
        $this->set('order',$this->Manager->get_order($ID));
        $this->set('type','detail');
    }
    
    public function edit_order($ID) {
        $this->layout ='blank';
        $order = $this->Manager->get_order($ID);
        $restaurant = $this->Manager->get_restaurant($order->res_id);
        $this->set('restaurant',$restaurant);
        $this->set('order',$order);
    }
    
}
?>