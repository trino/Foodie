<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{

    public function display($page='home')
    {
         $this->set('title',ucfirst($page));
        $this->render($page);
       
        
    }
    
    public function cusine($slug)
    {
        $this->set('cusine', $slug);
    }
}
