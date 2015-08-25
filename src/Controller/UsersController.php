<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function dashboard() {
        $this->layout = "admin";
        $Me = $this->request->session()->read('Profile.ID');
        $this->set("Profile", $this->Manager->get_profile($Me));
    }

    function address_belongs_to_me($ID){
        if(!$ID){return true;}
        $Me = $this->request->session()->read('Profile.ID');
        $Address = $this->Manager->get_profile_address($ID);
        if($Address->UserID != $Me){
            die("You are attempting to edit an address that does not belong to you.");
        }
    }
    
     public function uploadmeal(){
        $this->layout='admin';
        $this->render();
    }

    public function search_addresses(){
        foreach($_POST as $Key => $Value){
            $_POST[$Key] = trim($Value);
        }
        $conditions = array("UserID" => 0);
        if($_POST["Name"]) {$conditions[] = "MATCH(Name) AGAINST('" . $_POST["Name"] . "' IN BOOLEAN MODE)";}
        if($_POST["Number"]) {$conditions["Number"] = $_POST["Number"];}
        if($_POST["Street"]) {$conditions["Street"] = $_POST["Street"];}
        if($_POST["City"]) {$conditions["City"] = $_POST["City"];}
        if($_POST["Country"]) {$conditions["Country"] = $_POST["Country"];}
        if($_POST["PostalCode"]) {$conditions["PostalCode"] = str_replace(" ", "", $_POST["PostalCode"]);}
        $_POST["Phone"] = $this->Manager->kill_non_numeric($_POST["Phone"]);
        if($_POST["Phone"]) {$conditions["Phone"] = $_POST["Phone"];}
        return $this->Manager->enum_all("profiles_addresses", $conditions);
    }

    public function images() {
        $action = $this->Manager->get('action');
        $this->layout = "admin";

        if($action) {
            switch ($action) {
                case "delete":
                    $this->Manager->delete_profile_image($_GET["file"]);
                    break;
                case "edit":
                    $this->Manager->edit_profile_image($_POST["UserID"], $_POST["filename"], $_POST["RestaurantID"], $_POST["Title"], $_POST["OrderID"]);
                    echo json_encode($_POST);
                    die();
                    break;
            }
        }

        $this->set("Restaurants", $this->Manager->enum_restaurants());
    }

    function upload($UserID){
        $this->layout = "none";
        $this->loadComponent("Image");
        $dir = "img/users/" . $UserID;
        $filename = $this->Image->handle_upload($dir);
        $filename = pathinfo($filename, PATHINFO_BASENAME);//filename only, with extension
        $dir = $dir . "/";
        $this->Image->make_thumb($dir . $filename, $dir . $filename . ".th", 128, 128, true);
        echo $filename;
        die();
    }


    public function addresses(){
        $this->Manager->verify_login($this, "Users");
        $this->layout = "admin";
        $Me = $this->request->session()->read('Profile.ID');
        if(isset($_POST["action"])){
            switch ($_POST["action"]) {
                case "search":
                    $Me="";
                    $this->set("Addresses", $this->search_addresses());
                    break;
                case "save":
                    if (isset($_POST["ID"])) {
                        $this->address_belongs_to_me($_POST["ID"]);
                    } else {
                        $_POST["ID"] = "";
                    }
                    $this->Manager->edit_profile_address($_POST["ID"], $Me, $_POST["Name"], $_POST["Phone"], $_POST["Number"], $_POST["Street"], $_POST["Apt"], $_POST["Buzz"], $_POST["City"], $_POST["Province"], $_POST["PostalCode"], $_POST["Country"], $_POST["Notes"]);
                    break;
            }
        }
        if (isset($_GET["action"])){
            switch($_GET["action"]){
                case "delete":
                    $this->address_belongs_to_me($_GET["ID"]);
                    $this->Manager->delete_profile_address($_GET["ID"]);
                    $this->Flash->success("Address was deleted");
                    break;
            }
        }

        if($Me) {$this->set("Addresses", $this->Manager->enum_profile_addresses($Me));}
    }

     public function orders() {
        $this->layout = "orders";
         if (isset($_GET["ID"]) && $this->Manager->check_permission("CanEditGlobalSettings")){
             $UserID = $_GET["ID"];
         } else {
             $UserID = $this->Manager->read("ID");
         }
         $this->set("OrderType", "User");
         $this->set("Orders", $this->Manager->enum_orders($UserID, true));
    }

    public function logout(){
        $this->layout = "none";
        $this->request->session()->destroy();
        $this->redirect('/');
    }
    
    public function ajax_register() {
        $this->layout = 'blank';
        $EmailAddress =  $_POST['email'];
        $Password = $_POST['password'];
        $Phone = $_POST['contact'];
        $Name = $_POST['ordered_by'];
        $oid = $_POST['order_id'];

        $arr['email'] = $_POST['email'];
        $arr['address2'] = $_POST['address2'];
        $arr['city'] = $_POST['city'];
        $arr['ordered_by'] = $_POST['ordered_by'];
        $arr['postal_code'] = $_POST['postal_code'];
        $arr['remarks'] = $_POST['remarks'];
        $arr['order_till'] = $_POST['order_till'];
        $arr['province'] = $_POST['province'];
        $arr['contact'] = $Phone;
        
        if(!$_POST['password']) {
            if ($this->Manager->get_entry("profiles", $EmailAddress, "Email")) {
                $this->response->body('1');
            } else {
                $this->Manager->new_profile(0, $Name, $Password, 2, $EmailAddress, $Phone, 0, '0');
            }
        }

        //convert to a Manager API call
        $resevations = TableRegistry::get('Reservations');
        $query2 = $resevations->query();
            $query2->update()
            ->set($arr)
            ->where(['id' => $oid])
            ->execute();
        $this->response->body('0');
        return $this->response;
    }

    function postalcodes(){

    }
}
