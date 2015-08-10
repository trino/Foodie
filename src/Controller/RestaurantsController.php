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
        $Restaurant = $this->Manager->get_profile($this->request->session()->read('Profile.ID'))->RestaurantID;
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
        $Restaurant = $this->Manager->get_profile($this->request->session()->read('Profile.ID'))->RestaurantID;

        $Events = $this->Manager->enum_events($Restaurant);
        $this->set("Events", $Events);

        $Profiles = $this->Manager->enum_profiles("RestaurantID", $Restaurant);
        $this->set("Profiles", $Profiles);
    }
    
}
?>