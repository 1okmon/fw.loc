<?php
namespace app\controllers;
use app\models\Posts;
use vendor\core\base\HyperChange;
class PostsController extends AppController{

    public function indexAction() {
        $model=new Posts;
        $termins=$model->findBySql("SELECT * FROM termin ORDER BY id");//любой sql запрос
        $text=$model->findBySql("SELECT * FROM text ORDER BY id");
        $posts= HyperChange::hyperINsert($text,$termins);
        $title='MAIN title';
        $this->set(compact('title','posts'));
    }
    
    public function testAction() {
        $model=new Posts;
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
