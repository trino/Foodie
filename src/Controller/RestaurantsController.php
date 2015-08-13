<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class RestaurantsController extends AppController {
    public $paginate = [
        'limit' => 25,
        'order' => ['ID' => 'DESC'],
    ];

    public function index($slug='') {
         $this->set('restaurant',$slug);
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
        $this->set("Restaurants", $this->Manager->enum_restaurants());
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
    }

    public function report() {
        $this->layout='admin';
    }

    public function orders($type='history') {
        $this->layout='admin';
        $this->set('type',$type);
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
}
?>