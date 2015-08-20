<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
class MenusController extends AppController {
    function menu_form($id) {
        $this->layout = 'blank';
        $this->set('menu_id',$id);
        if($id!=0)
        {
            //$id = $_GET['menu_id'];
            $table = TableRegistry::get('menus');
            $menus = $table->find()->where(['ID'=>$id])->first();
            $child = $table->find()->where(['parent'=>$id])->all();
            $child_count = $table->find()->where(['parent'=>$id])->count();
            $this->set('model',$menus);
            $this->set('cmodel',$child);
            $this->set('ccount',$child_count);
            
        }
    }

    function additional() {
        $this->layout = 'blank';
    }

    function uploadimg() {
        //echo $this->request->webroot.'/img/products/k1.jpg';die();
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']) {
            $name = $_FILES['myfile']['name'];
            $arr = explode('.', $name);
            $ext = end($arr);
            $file = date('YmdHis') . '.' . $ext;
            move_uploaded_file($_FILES['myfile']['tmp_name'], APP . '../webroot/img/products/' . $file);
            $file_path = $this->request->webroot . 'img/products/' . $file;
            //$this->resize($file, array("300x300", "150x150"), true);
            echo $file_path.'___'.$file;
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
    function add()
    {
         $this->loadModel("Menus");
        $this->loadComponent('Manager');
        $arr['menu_item'] = $_POST['menu_item'];
        if(isset($_POST['price']))
        $arr['price'] = $_POST['price'];
        if(isset($_POST['description']))
        $arr['description'] = $_POST['description'];
        if(isset($_POST['image']))
        $arr['image'] = $_POST['image'];
        if(isset($_POST['parent']))
        $arr['parent'] = $_POST['parent'];
        $arr['res_id'] =  $this->Manager->read('ID');
        if(isset($_POST['has_addon']))
        $arr['has_addon'] =  $_POST['has_addon'];
        
        if(isset($_POST['sing_mul']))
        $arr['sing_mul'] =  $_POST['sing_mul'];
        
        if(isset($_POST['exact_upto']))
        $arr['exact_upto'] =  $_POST['exact_upto'];
        
        if(isset($_POST['exact_upto_qty']))
        $arr['exact_upto_qty'] =  $_POST['exact_upto_qty'];
        
        if(isset($_POST['req_opt']))
        $arr['req_opt'] =  $_POST['req_opt'];
        
        if(isset($_POST['has_addon']))
        $arr['has_addon'] =  $_POST['has_addon'];
        if(isset($_GET['id']))
        $id = $_GET['id'];
        else
        $id = 0;
        if($id==0){
        $table = TableRegistry::get('menus');
        $Data2 = $table->newEntity($arr);
        
        $table->save($Data2);
        echo $Data2->ID;die();}
        else
        {
            $table = TableRegistry::get('menus');

                //echo $s;die();
                $query = $table->query();
                $query->update()
                    ->set($arr)
                    ->where(['id' => $id])
                    ->execute();
                    
                    $child = $table->find()->where(['parent'=>$id]);
                    foreach($child as $c)
                    {
                        //echo $c->id;
                        //ssdie('here');
                        $this->Menus->deleteAll(['parent'=>$c->ID]);
                    }
                    
                    $this->Menus->deleteAll(['parent'=>$id]);
                    echo $id;die();
        }
        
    }
    public function delete($id)
    {
        $this->loadModel("Menus");
            $this->Menus->deleteAll(['ID'=>$id]);
            $table = TableRegistry::get('menus');
            $child = $table->find()->where(['parent'=>$id]);
            foreach($child as $c)
            {
                //echo $c->id;
                //ssdie('here');
                $this->Menus->deleteAll(['parent'=>$c->ID]);
            }
            
            $this->Menus->deleteAll(['parent'=>$id]);
            //die();
            $this->redirect('/restaurants/menu_manager');
    }
    public function getMore($id)
    {
       $table = TableRegistry::get('menus');
        $cchild = $table->find()->where(['parent'=>$id]); 
        $this->response->body($cchild);
        return $this->response;
        die();
    }
}