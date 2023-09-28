<?php

class User extends Controllers{
    public function __construct()
    {
        
    }

    public function login(){
        $this->view("user/login");
    }

    public function register(){
        $this->view("user/register");
    }
}

?>