<?php
 
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class RestaurantsController extends AppController
{
     public function index($slug='')
    {
         $this->set('restaurant',$slug);
        
    }
    public function dashboard()
    {
        $this->layout='admin';
    }
    
    public function menu_manager()
    {
        $this->layout='admin';
    }
    public function report()
    {
        $this->layout='admin';
    }
    
    public function orders($type='history')
    {
        $this->layout='admin';
        $this->set('type',$type);
    }
    
}
?>