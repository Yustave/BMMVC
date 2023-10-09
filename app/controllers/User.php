<?php

class User extends Controllers{
    private $userModel;
    private $postModel;
    private $catModel;

    public function __construct(){
        $this->userModel = $this->model('Usermodel');
        $this->postModel = $this->model("PostModel");
        $this->catModel = $this->model("CategoryModel");

    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                "name"=> $_POST['username'],
                "email"=>$_POST['Email'],
                "pass"=>$_POST['password'],
                "comfrimPass"=>$_POST['comfrim_password'],
                "name_err"=> '',
                "email_err"=> "",
                "pass_err"=> "",
                "comfrimPass_err"=>"",
            ];

            if(empty($data['name'])){
                $data['name_err'] = "username can't be blank";
            }

            if(empty($data['email'])){
                $data['email_err'] = "email can't be blank";
            }elseif($this->userModel->getUserByEmail($data['email'])){
                $data['email_err'] = "Email is Already In Used";
            }

            if(empty($data['pass'])){
                $data['pass_err'] = "password can't be blank";
            }
            
            if(empty($data['comfrimPass'])){
                $data['comfrimPass_err'] = "comfrimPasswrd can't be blank";
            }elseif($data['pass'] != $data['comfrimPass']){
                $data['comfrimPass_err'] = "Password Do not match";
            }

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['pass_err']) && 
                empty($data['comfrimPass_err'])){
                if($this->userModel->register($data['name'],$data['email'],$data['pass'])){
                    $this->view("user/login");
                }else{
                    $this->view("user/register", $data);
                }
            }else{
                $this->view("user/register", $data);
            }
          
        }else{
            $this->view("user/register");
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                
                "email"=>$_POST['Email'],
                "pass"=>$_POST['password'],
                "email_err"=> "",
                "pass_err"=> ""
            ];
            
            if(empty($data['email'])){
                $data['email_err'] = "email can't be blank";
            }
            if(empty($data['pass'])){
                $data['pass_err'] = "password can't be blank";
            }
            
            if(empty($data['email_err']) && empty($data['pass_err'])){
                $rowuser = $this->userModel->getUserByEmail($data['email']);
                if($rowuser){
                    $hash_pass = $rowuser->password;
                    if (password_verify($data['pass'],$hash_pass)){
                        $user = $rowuser->name;
                        setUserSession($user);

                        if($data['email'] == 'yustavelavan@gmail.com'){
                            redirect(URLROOT."Admin/home");
                        }else{
                            redirect(URLROOT."detail/home/1");
                        }
                       
                    } else {
                        $this->view('user/login');
                    }
                }
            }else{
                $this->view("user/register", $data);
            }
        }else{
            $this->view("user/login");
        }
    }

    public function logout(){
        unsetUserSession();
        redirect(URLROOT.'home/index');
    }

    public function member($params=[]){
       
        $data = [
            "cats"=>'',
            "posts"=>''
        ];
        $data['cats']=$this->catModel->getAllCategory();
        $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view('user/member',$data);

    }

}

?>