<?php

namespace app\controllers;
use app\models\Delete;
use vendor\core\base\HyperChange;

class DeleteController extends AppController{
    
    public function delAction() {
        $model=new Delete;
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");//любой sql запрос
        $text=$model->findBySql("SELECT * FROM text ORDER BY id");
        $posts= HyperChange::hyperINsert($text,$termins);
        $title='MAIN title';        
        $this->set(compact('title','posts'));
    }
    public function checkAction() {
        $model=new Delete;
        $mytext = $_POST['idk']; 
        echo $mytext;
        $post=$model->findBySql("SELECT * FROM text WHERE id = '$mytext'");
        $post=$post['0'];
        $post=$post['title'];
        //debug ($post); 
        $termin=$model->findBySql("SELECT * FROM termin WHERE word = '$post'");
        $termin=$termin['0'];
        $termin=$termin['id'];
        //debug($termin); 
        try {
            $ss=$model->findBySql("DELETE FROM text WHERE id = '$mytext'");           
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
        try {          
            $ss=$model->findBySql("DELETE FROM termin WHERE id = '$termin'");
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
        
        
    }
    
    public function delTermAction() {
        $model=new Delete;
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");//любой sql запрос
        //debug($termins);
        $title='MAIN title';        
        $this->set(compact('title','termins'));
    }
    
    public function checkTermAction(){
        $model=new Delete;
        $mytext = $_POST['idk']; 
        echo $mytext;
        try {          
            $ss=$model->findBySql("DELETE FROM termin WHERE id = '$mytext'");
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
    }
}
