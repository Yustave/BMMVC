<?php

class Catagory extends Controllers{
    private $catModel;

    public function __construct(){
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
                $this->view('admin/catagory/home',$data);   
            }
                $this->view('admin/catagory/home',$data);
        }else{
            $this->view('admin/catagory/home',$data);
        }
    }

    public function edit($data=[]){
        $dta =[
            "name"=>"",
            "name_err"=>"",
            "cats"=>"",
            "currentCat"=>""
        ];

        $dta['cats']=$this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $dta['name']=$_POST['name'];
            if(!empty($dta['name'])){
                if($this->catModel->updateCategory(getCurrentId(),$dta['name'])){
                    deleteCurrentId();
                    redirect(URLROOT . 'catagory/create');
                }else{
                    $dta['currentCat']=$this->catModel->getCategoryById(getCurrentId());
                    deleteCurrentId();
                    redirect(URLROOT,"admin/catagory/edit",$dta);
                }              
            }else{
                $dta['name_err']="please insert category name";
                $dta['currentCat']=$this->catModel->getCategoryById(getCurrentId());
                deleteCurrentId();
                $this->view("admin/catagory/edit",$dta);
            }
        }else{
            setCurrentId($data[0]);
            $dta['currentCat']=$this->catModel->getCategoryById($data[0]);
            $this->view("admin/catagory/edit",$dta);
        }
    }

    public function delete($data=[]){
        if($this->catModel->deleteCats($data[0])){
            redirect( URLROOT . "catagory/create");
        }else{
            redirect( URLROOT . "catagory/create");
        }
    }
}

?>