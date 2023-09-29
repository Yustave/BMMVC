<?php

class Controllers{
    
   public function view($views, $data = []){
    if(file_exists("../app/views/".$views.".php")){
        require_once ("../app/views/".$views.".php");
        return $data;
    }
   }

   public function model($model){
    if(file_exists("../app/model/".$model.".php")){
        require_once ("../app/model/".$model.".php");
        return new $model;
    }
   }
}



?>