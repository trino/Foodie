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
        $Me = $this->request->session()->read('Profile.ID');
        $Address = $this->Manager->get_profile_address($ID);
        if($Address->UserID != $Me){
            die("You are attempting to edit an address that does not belong to you.");
        }
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

    public function addresses(){
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
                    $this->Manager->edit_profile_address($_POST["ID"], $Me, $_POST["Name"], $_POST["Number"], $_POST["Street"], $_POST["Apt"], $_POST["Buzz"], $_POST["City"], $_POST["Province"], $_POST["PostalCode"], $_POST["Country"], $_POST["Notes"]);
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
        $this->layout = "admin";
    }

    public function logout(){
        $this->layout = "none";
        $this->request->session()->destroy();
        $this->redirect('/');
    }
}
