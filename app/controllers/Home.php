<?php

class Home extends Controllers{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model("CatagoryModel");
    }
    
    
    public function index($data=[]){
        $dta=$this->userModel->getAllCategory();      
         $this->view("home/index",$dta);
    }     
}

?>