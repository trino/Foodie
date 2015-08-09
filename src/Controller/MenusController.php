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
    function uploadimg()
    {
        //echo $this->request->webroot.'assets/frontend/pages/img/products/k1.jpg';die();
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $name = $_FILES['myfile']['name'];
            $arr = explode('.',$name);
            $ext = end($arr);
            $file = date('YmdHis').'.'.$ext;
            move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/assets/frontend/pages/img/products/'.$file);
            echo $this->request->webroot.'assets/frontend/pages/img/products/'.$file;die();
        }
    }
}