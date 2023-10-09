<?php

class Detail extends Controllers{ 
    private $postModel;
    private $catModel;

    public function __construct()
    {     
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CatagoryModel");
    }

    public function home($params = []){
        $data=[
            "cats"=>'',
            "posts"=>''
        ];
       $data['cats'] = $this->catModel->getAllCategory();
       $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view('user/detail/home',$data);
    }

    public function detail($params=[]){
        $post=$this->postModel->getPostById($params[0]);
        $this->view('user/detail/detail',['post' => $post]);
    }
}