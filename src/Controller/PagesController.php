<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController {

    public function display($page='home') {
         $this->set('title',ucfirst($page));
         $this->render($page);

        //TESTING CODE
        //debug($this->Manager->get_restaurant(1, true));
        //$this->Manager->add_genre(array("American", "Asian", "Chinese", "German", "Indian", "Italian", "Korean", "Latin", "North American"));
        //debug($this->Manager->enum_genres());

        //debug($this->Manager->enum_subscribers());
        //die();

    }
    
    public function cuisine($slug = "home") {
        $this->set('cuisine', $slug);
    }
}
