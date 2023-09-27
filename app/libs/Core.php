<?php

class Core{
    private $classname = "Home";
    Private $methodname = "Index";
    private $param =[];

    public function __construct(){
        $this->Get_url();
    }

    public function Get_url(){
        $url = isset($_GET['url']) ? rtrim($_GET['url'],"/") : "";
        $url = explode("/",$url);   

        if(!empty($url[0])){
            if(file_exists($url[0].".php"));
            $this->classname = $url[0];
            unset($url[0]);
        }
        require_once "../app/controllers/".ucfirst($this->classname).".php";
        $this->classname = new $this->classname();

        if(!empty($url[1])){
            if(method_exists($this->classname,$url[1]));
            $this->methodname = $url[1];
            unset($url[1]);
        }
        $this->param = !empty($url) ? array_values($url) : [] ;
        call_user_func([$this->classname,$this->methodname],$this->param);    
    }
}


?>