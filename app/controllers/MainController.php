<?php

namespace app\controllers;
use app\models\Main;
use vendor\core\base\HyperChange;

class MainController extends AppController{
    
    public function indexAction() {
////        $this->layout=false;
        $model=new Main;
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");
        $strs[0]='Создать статью';
        $strs[1]='Создать термин';
        $strs[2]='Посмотреть статьи';
        $strs[3]='Удалить статью'; //
        $strs[4]='Удалить термин'; //
        $strs[5]='Создать класс';
        $strs[6]='Создать объект';
        $strs[7]='Посмотреть классы';
        $strs[8]='Посмотреть объекты';
        $strs[9]='Создать шаблон';
        $strs[10]='Посмотреть шаблоны';
              
        $strs= HyperChange::hyperInsertMenu($strs,$termins);
        $title='MAIN title';
        $this->set(compact('title','strs'));
    }
    
    public function createAction(){   
    }
    
    public function createTermAction(){      
    }
    
    public function checkAction(){     
        $model=new Main;   
        $data[1]=$_POST['text'];
        $data[0]=$_POST['title'];   
        try {
            $is=$model->findBySql("INSERT INTO text VALUES (NULL, ?, ?)",$data);
        } catch (\PDOException $exc) {
        }

        $id=$model->findBySql("SELECT MAX(id) FROM text");
        $id=$id[0]['MAX(id)'];
        $href="<a href=\"http://fw.loc/posts/test?id={$id}\">{$_POST['title']}</a>";            
        $dat[0]=$_POST['title']; 
        $dat[1]='';
        $dat[2]=$href;
        try {
            $ss=$model->findBySql("INSERT INTO termin VALUES (NULL, ?, ?, ?)",$dat);
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
    }
    
    public function checkTermAction(){
        $model=new Main;
        $href="<a href=\"{$_POST['zamena']}\">{$_POST['word']}</a>";
        $dat[0]=$_POST['word']; 
        $dat[1]='';
        $dat[2]=$href;       
        $id=$model->findBySql("SELECT MAX(id) FROM termin");
        $id=$id[0]['MAX(id)'];        
        try {
            $ss=$model->findBySql("INSERT INTO termin VALUES (NULL, ?, ?, ?)",$dat);
        } catch (\PDOException $ex) {
            //echo $exc->getTraceAsString();
        }
    }    
}
