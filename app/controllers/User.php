<?php

class User extends Controllers{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
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
                        $this->view('home/index');
                        redirect(URLROOT."Admin/home");
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
        $this->view('home/index');
    }
}

?>