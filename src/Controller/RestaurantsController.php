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
        $Restaurant = $this->Manager->get_current_restaurant();
        if($Restaurant) {
            if (isset($_POST["Name"])){
                $this->Manager->edit_restaurant($Restaurant, $_POST["Name"], $_POST["Genre"], $_POST["Email"], $_POST["Phone"], $_POST["Address"], $_POST["City"], $_POST["Province"], $_POST["Country"], $_POST["PostalCode"], $_POST["Description"], $_POST["DeliveryFee"], $_POST["Minimum"]);
                $this->Manager->edit_hours($Restaurant, $_POST);
            }
            $Restaurant = $this->Manager->get_restaurant($Restaurant, true);
            $this->set("Restaurant", $Restaurant);
            $this->set("Genres", $this->Manager->enum_genres());
        } else {
            $this->set("Restaurant", false);
        }
    }


    public function all() {
        $this->layout='admin';
        $this->set("Restaurants", $this->Manager->enum_restaurants());
    }

    public function signup() {
        $this->layout='admin';
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
                    $conditions = array("RestaurantID" => 0);
                    if ($_GET["Name"]){
                        $conditions[] = "Name like '%" . $_GET["Name"] . "%'";
                    }
                    if ($_GET["Email"]){
                        $conditions["Email"] = trim(strtolower($_GET["Email"]));
                    }
                    $this->set("Users", $this->Manager->enum_all("profiles", $conditions));
                    break;
                case "newemployee":
                    $profile=$this->Manager->new_profile($Profile->ID, $_GET["Name"], "", $_GET["ProfileType"], $_GET["Email"], $Profile->RestaurantID, 0);
                    $this->Manager->status($profile, "Profile created", "Profile could not be created");
                    if($profile) {
                        $this->loadComponent("Mailer");
                        $this->Mailer->sendEmail($profile["Email"], "A profile was created for you", "Your user ID is " . $profile["Email"] . "<BR>Your password is: " . $profile["Password"]);
                    }
                    break;
                case "hire":
                    $this->Manager->status($this->Manager->hire_employee($_GET["ID"], $Profile->RestaurantID), "Employee was hired", "Unable to hire employee");
                    break;
                case "fire":
                    $this->Manager->status($this->Manager->hire_employee($_GET["ID"], 0), "Employee was fired", "Unable to fire employee");
                    break;
            }
        }

        $this->set("Employees", $this->Manager->enum_employees($Profile->RestaurantID,$Profile->Hierarchy));
        $this->set("ProfileTypes", $this->Manager->enum_profiletypes(0, false));

    }
}
?>