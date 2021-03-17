<?php

namespace vendor\core\base;

class HyperChange {
    public static function hyperInsert($text,$termins) {
        foreach ($text as $post){
            $data[$post['id']]=$post;
        }
        foreach ($termins as $termin){
            foreach ($data as $post){
                if($termin['zamena']!==''){
                   $data[$post['id']]=str_replace($termin['word'],$termin['zamena'],$data[$post['id']] );
                }
            }
        }
        return $data;
    }
    
    public static function hyperInsertMenu($strs,$termins) {    
        foreach ($termins as $termin){  
            if($termin['zamena']!==''){
               $strs=str_replace($termin['word'],$termin['zamena'],$strs ); 
            }
        }
        return $strs;
    }
    
}
