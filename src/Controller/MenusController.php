<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
class MenusController extends AppController {
    function menu_form() {
        $this->layout = 'blank';
    }

    function additional() {
        $this->layout = 'blank';
    }

    function uploadimg() {
        //echo $this->request->webroot.'assets/frontend/pages/img/products/k1.jpg';die();
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']) {
            $name = $_FILES['myfile']['name'];
            $arr = explode('.', $name);
            $ext = end($arr);
            $file = date('YmdHis') . '.' . $ext;
            move_uploaded_file($_FILES['myfile']['tmp_name'], APP . '../webroot/assets/frontend/pages/img/products/' . $file);
            $file = $this->request->webroot . 'assets/frontend/pages/img/products/' . $file;
            //$this->resize($file, array("300x300", "150x150"), true);
            echo $file;
            die();
        }
    }

    function resize($file, $sizes, $CropToFit = false, $delimeter = "x"){
        $this->loadComponent("Image");
        if (is_array($sizes)){
            $images = array();
            foreach($sizes as $size) {
                $images[] = $this->resize($file, $size, $delimeter);
            }
            return $images;
        } else {
            $newsize = explode($delimeter, $sizes);
            $newfile = $this->Image->getfilename($file) . '-' . $sizes . "." . $this->getextension($file);
            return $this->Image->make_thumb($file, $newfile, $newsize[0], $newsize[1], $CropToFit);
        }
    }
}