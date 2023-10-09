<?php

class Post extends Controllers{ 
    private $postModel;
    private $catModel;

    public function __construct(){     
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CatagoryModel");
    }

    public function home($params=[]){
       
        $data=[
            "cats"=>'',
            "posts"=>''
        ];
       $data['cats'] = $this->catModel->getAllCategory();
       $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view('admin/post/home',$data);
    }

    public function create(){
        
        $data=[
            "title"=>'',
            "desc"=>'',
            "file"=>'',
            "content"=>'',
            "title_err"=>'',
            "desc_err"=>'',
            "file_err"=>'',
            "content_err"=>'',
            "cats"=>'',
        ];
       $data['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $dir = dirname(dirname(dirname(__FILE__)));
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
            $dir = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];

            $data['title']=$_POST['title'];
            $data['desc']=$_POST['desc'];
            $data['file']=$_FILES['file'];
            $data['content']=$_POST['content'];

            if(empty($data['title'])){
                $data['title_err']= "Please empty!title";
            }
            if(empty($data['desc'])){
                $data['desc_err']= "Please empty!description";
            }
            if(empty($data['content'])){
                $data['content_err']= "content empty!";
            }
                      
            if(empty($data['title_err']) && empty($data['desc_err']) &&  empty($data['content_err']) ){
                if(!empty($files)){
                    move_uploaded_file($files['tmp_name'], $dir . '/public/assets/uploads/' . $files['name']);
                    $this->postModel->insertPost($_POST['cate_id'],$_POST['title'],$_POST['desc'],$files['name'],$_POST['content']);
                    
                    redirect(URLROOT . 'post/home/1');
                }else{
                    $this->view("admin/post/create",$data);
                }

            }else{
                $this->view("admin/post/create",$data);
            }

            $this->view("admin/post/create",$data);
        }else{
            $this->view("admin/post/create",$data);
        }
       
    }
   
    public function show($params=[]){
        
        $post=$this->postModel->getPostById($params[0]);
        $this->view('admin/post/show',['post' => $post]);
    }

    public function edit($params=[]){
        // echo $params[0]; 
       

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $data=[
                "title"=>'',
                "desc"=>'',
                "file"=>'',
                "content"=>'',
                "title_err"=>'',
                "desc_err"=>'',
                "file_err"=>'',
                "content_err"=>'',
                "cats"=>''        
            ];  
            
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
            $dir = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];
            $filename =$_FILES['file']['name'];
          

            $data['title']=$_POST['title'];
            $data['desc']=$_POST['desc'];
            $data['content']=$_POST['content'];

            if(empty($data['title'])){
                $data['title_err']= "Please empty!";
            }
            if(empty($data['desc'])){
                $data['desc_err']= "Please empty!";
            }
            if(empty($data['content'])){
                $data['content_err']= "Please empty!";
            }
                      
            if(empty($data['title_err']) && empty($data['desc_err']) &&  empty($data['content_err']) ){
                if($_FILES["file"]["name"] != null){
                    move_uploaded_file($files['tmp_name'], $dir . '/public/assets/uploads/' . $files['name']);                                      
                }else{
                    $filename=$_POST['old_image'];      
                }
                $curId = getCurrentId();
                deleteCurrentId();
                if($this->postModel->updatePost($curId,$_POST['cate_id'],$data['title'],$data['desc'],$filename,$data['content'])){
                    redirect( URLROOT . 'post/show/' . $curId);
                    
                }else{   
                    redirect( URLROOT . 'post/edit/' . $curId);
                   
                }        
            }else{
                $this->view("admin/post/create",$data);
            }
          
        }else{
            setCurrentId($params[0]);
            $data['cats'] = $this->catModel->getAllCategory();
            $data['post']=$this->postModel->getPostById($params[0]);
            $this->view('admin/post/edit',$data);
        }
    }


    public function delete($data=[]){
        $dta=$this->postModel->getPostById($data[0]);
        if($this->postModel->deletePostById($data[0])){
           redirect( URLROOT . 'post/home/'. $dta->cate_id);
           
        }else{           
            redirect( URLROOT . 'post/home/' . $dta->cate_id);
        }

    }
}