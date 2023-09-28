<?php

class Home extends Controllers{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }
    public function index($data = [])
    {
        $data=$this->userModel->getALLuser();
        $this->view('home/index',$data);
    }
}

?>