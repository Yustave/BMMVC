<?php

class Catagory extends Controllers{
    private $catModel;
    public function __construct()
    {
        $this->catModel = $this->model('CatagoryModel');
    }

    public function create($data = []){
        $data = [
            "name" => "",
            "name_err" => "",
            "cats"=>$this->catModel->getallcategory()
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            //$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data['name'] = $_POST['name'];

            if(empty($data['name'])){
                $data['name_err'] = "Requirement not full filled";
                $this->view('admin/catagory/home',$data);
            }else if($this->catModel->getCategoryByName($data['name'])){
                $data['name_err'] = "Name is already taken";
                $this->view('admin/catagory/home',$data);
            }else if($this->catModel->insertNewCategory($data['name'])){
                $data['cats']=$this->catModel->getallcategory();
                $this->view('admin/category/home',$data);   
            }
                $this->view('admin/catagory/home',$data);
        }else{
            $this->view('admin/catagory/home',$data);
        }
    }

    public function edit($data = []){
        $data = [
            "name" => "",
            "name_err" => "",
            "cats"=>$this->catModel->getallcategory()
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            
        }else{
            $this->view('admin/catagory/edit',$data);
        }
    }
}

?>