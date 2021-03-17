<?php

namespace app\controllers;
use app\models\Classes;
use vendor\core\base\HyperChange;

class ClassesController extends AppController {
    //put your code here
    public function createAction() {
//        $model=new Classes;
//        $types=$model->findBySql("SELECT * FROM attributes_types ORDER BY id");
//        $i=0;
//        $data;
//        while( isset($types[$i])){
//            $tmp=$types[$i];
//            $data[$i]=$tmp['type_name'];
//            $i++;
//        }
//        $types=$data;
//        $this->set(compact('types'));
    }

    
    public function checkAction() {
        $model=new Classes;   
     
        $attr=$_POST;
        
        $dat[1]=$_POST['class_comment'];
        $dat[0]=$_POST['class_name'];
        try {
            $is=$model->findBySql("INSERT INTO classes VALUES (NULL, ?, ?)",$dat);
        } catch (\PDOException $exc) {
        }
        
        debug($attr['number']);
        $number=$attr['number'];
        
        $types=$model->findBySql("SELECT * FROM attributes_types ORDER BY id");
        $i=0;
        $data;
        while( isset($types[$i])){
            $tmp=$types[$i];
            $data[$i]=$tmp['type_name'];
            $i++;
        }
        $types=$data;
        
        $id=$model->findBySql("SELECT MAX(id) FROM classes");
        $id=$id[0]['MAX(id)'];
        $href="<a href=\"http://fw.loc/classes/showClassInfo?id={$id}\">{$_POST['class_name']}</a>";            
        $dat[0]=$_POST['class_name']; 
        $dat[1]='';
        $dat[2]=$href;
        debug($attr);
        try {
            $ss=$model->findBySql("INSERT INTO termin VALUES (NULL, ?, ?, ?)",$dat);
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
        $this->set(compact('types','number','id'));
        //$this->set(compact('number'));
        //$this->attributeCreateAction($attr);
    }
    
    public function attributeCreateAction() {
        $model=new Classes;
        debug($_POST);
        $types=$model->findBySql("SELECT * FROM attributes_types ORDER BY id");
        $i=0;
        
        $data;
        while( isset($types[$i])){
            $tmp=$types[$i];
            $data[$i]=$tmp['type_name'];
            $i++;
        }
        $types=$data;
        debug($types);
        $i=0;
        while (isset($_POST['name'][$i])){ 
            $attrData;
            $attrData['0']=$_POST['class_owner'];      
            $type_id=0;
            while ($_POST['type'][$i]!=$types[$type_id]){
                $type_id++;
            }
            $attrData['1']=$type_id+1;
            $attrData['2']=$_POST['name'][$i];
        
            try {
                $model->findBySql("INSERT INTO attributes VALUES (NULL, ?, ?, ?)",$attrData);
            } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
            }
            $i++;
            
        }
        
            debug($attrData);
        
        
       
////        try {
////            $is=$model->findBySql("INSERT INTO classes VALUES (NULL, ?, ?)",$data);
////        } catch (\PDOException $exc) {
////        }
//
//        $id=$model->findBySql("SELECT MAX(id) FROM classes");
//        $id=$id[0]['MAX(id)'];
//        $href="<a href=\"http://fw.loc/classes/showClassInfo?id={$id}\">{$_POST['class_name']}</a>";            
//        $dat[0]=$_POST['class_name']; 
//        $dat[1]='';
//        $dat[2]=$href;
//        debug($attr);
////        try {
////            $ss=$model->findBySql("INSERT INTO termin VALUES (NULL, ?, ?, ?)",$dat);
////        } catch (\PDOException $ex) {
////            //echo $exc->getTraceAsString();
////        }
    }


    public function showClassesAction() {
        $model=new Classes;
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");//любой sql запрос
        $text=$model->findBySql("SELECT * FROM classes ORDER BY id");
        
        $posts= HyperChange::hyperINsert($text,$termins);
        
        $title='MAIN title';
        $this->set(compact('title','posts'));
    }
    
    public function showClassInfoAction() {
        $model=new Classes;
        $get=\vendor\core\Router::$get;
        $str=strpos($get, '=');
        $row=substr($get, 0, $str+1);
        $row_tr= str_replace($row, '', $get);
        $row=substr($get, 0, $str);
        $str=strpos($get, '&');
        $get=substr($get, 0, $str+1);
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");//любой sql запрос
        $posts=$model->findOne($row_tr,$row);
        $posts= HyperChange::hyperINsert($posts,$termins);
        $title='MAIN title';
        $this->set(compact('title','posts'));
    }
    
    
}
