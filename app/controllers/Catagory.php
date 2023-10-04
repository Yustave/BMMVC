<?php

class Catagory extends Controllers{
    private $catModel;
    public function __construct()
    {
        $this->catModel = $this->model('CatagoryModel');
    }

    public function home(){
        $data = $this->catModel->getallcategory();
        $this->view('admin/catagory/home',$data);
    }
}

?>