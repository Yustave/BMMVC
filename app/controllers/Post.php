<?php

class Post extends Controllers{
    public function __construct()
    {
        echo __CLASS__."constructor";
    }
    public function index()
    {
        echo __CLASS__."'s Method ".__METHOD__;
    }
    public function show($data = []){
        echo "<pre>".print_r($data,true)."</pre>";
    }
}

?> 