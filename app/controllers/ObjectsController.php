<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use vendor\core\base\HyperChange;
use app\models\Objects;
/**
 * Description of ObjectsController
 *
 * @author alexm
 */
class ObjectsController extends AppController {
   
    public function createAction() {
        $model=new Objects;
        $classes=$model->findBySql("SELECT * FROM classes ORDER BY id");
        debug($classes);
        
        $this->set(compact('classes'));
        
    }
    
    public function checkAction() {
        $model=new Objects;
        debug($_POST);
        $class=$_POST['class_owner'];
        $id=$model->findBySql("SELECT id FROM classes WHERE class_name LIKE '$class'");
        $id=$id[0]['id'];
        debug($id);
        
        $dat[0]=$id; 
        $dat[1]=$_POST['name'];
        debug($dat);
        try {
            $ss=$model->findBySql("INSERT INTO all_elements VALUES (NULL, ?, ?)",$dat);
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
        
        $id=$model->findBySql("SELECT MAX(id) FROM all_elements");
        $id=$id[0]['MAX(id)'];
        $href="<a href=\"http://fw.loc/objects/showObjectInfo?id={$id}\">{$_POST['name']}</a>";            
        $dat[0]=$_POST['name']; 
        $dat[1]='';
        $dat[2]=$href;
        
        try {
            $ss=$model->findBySql("INSERT INTO termin VALUES (NULL, ?, ?, ?)",$dat);
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
        
        
        
        
        debug($_POST);
    }


    public function showObjectsAction($param) {
        
    }
    
    public function showObjectInfoAction($param) {
        
    }
    
    
    
}
