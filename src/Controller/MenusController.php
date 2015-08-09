<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
class MenusController extends AppController
{
    function menu_form()
    {
        $this->layout = 'blank';
    }
    function additional()
    {
        $this->layout = 'blank';
    }
}