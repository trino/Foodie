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
        if($id!=0) {
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
            //$this->loadComponent("Image"); $this->Image->resize($file, array("300x300", "150x150"), true);
            echo $file_path.'___'.$file;
            die();
        }
    }

    function resize($file, $sizes, $CropToFit = false, $delimeter = "x"){
        $this->loadComponent("Image");
        return $this->Image->resize($file, $sizes, $CropToFit,$delimeter);
    }

    function add(){
        $this->loadModel("Menus");
        $this->loadComponent('Manager');
        $arr['res_id'] =  $this->Manager->read('ID');

        $Copy = array('menu_item', 'price', 'description', 'image', 'parent', 'has_addon', 'sing_mul', 'exact_upto', 'exact_upto_qty', 'req_opt', 'has_addon');
        foreach($Copy as $Key){
            if(isset($_POST[$Key])) {
                $arr[$Key] = $_POST[$Key];
            }
        }

        if(!isset($_GET['id'])){
            //$arr['display_order'=>]
            $table = TableRegistry::get('menus');
            //$table = TableRegistry::get('menus');
            $orders = $table->find()->where(['res_id'=>$this->Manager->read('ID'),'parent'=>0])->order(['display_order'=>'desc'])->first();
            $arr['display_order'] = $orders->display_order + 1;
            $Data2 = $table->newEntity($arr);

            $table->save($Data2);
            echo $Data2->ID;
            die();
        } else {
            $id = $_GET['id'];
            $table = TableRegistry::get('menus');

            //echo $s;die();
            $query = $table->query();
            $query->update()
                ->set($arr)
                ->where(['ID' => $id])
                ->execute();

                $child = $table->find()->where(['parent'=>$id]);
                foreach($child as $c) {
                    //echo $c->id;
                    //ssdie('here');
                    $this->Menus->deleteAll(['parent'=>$c->ID]);
                }

                $this->Menus->deleteAll(['parent'=>$id]);
                echo $id;die();
        }
        
    }

    public function delete($id) {
        $this->loadModel("Menus");
        $this->Menus->deleteAll(['ID'=>$id]);
        $table = TableRegistry::get('menus');
        $child = $table->find()->where(['parent'=>$id]);
        foreach($child as $c) {
            $this->Menus->deleteAll(['parent'=>$c->ID]);
        }
        $this->Menus->deleteAll(['parent'=>$id]);
        //die();
        $this->redirect('/restaurants/menu_manager');
    }

    public function getMore($id) {
       $table = TableRegistry::get('menus');
        $cchild = $table->find()->where(['parent'=>$id]); 
        $this->response->body($cchild);
        return $this->response;
        die();
    }

    public function orderCat() {
        $table = TableRegistry::get('menus');
        //$menus = $table->find()->where(['res_id'=>$this->Manager->read('ID'),'parent'=>0]);
        $_POST['ids'] = explode(',',$_POST['ids']);
        foreach($_POST['ids'] as $k=>$id) {
           $query = $table->query();
                $query->update()
                    ->set(['display_order'=>($k+1)])
                    ->where(['ID' => $id])
                    ->execute(); 
        } 
        die();
    }
}