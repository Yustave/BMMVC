<?php

class UserModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    
    public function getALLuser(){
        $this->db->query("SELECT * FROM users");
        return $this->db->multipleSet();
    }

    public function register($name,$email,$pass){
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users(name, email, password) VALUES (:name,:email,:pass)");
        $this->db->bind(":name",$name);
        $this->db->bind(":email",$email);
        $this->db->bind(":pass",$pass);
        return $this->db->execute();
    }

    public function getUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email",$email);
        $row = $this->db->singleSet();
        if(empty($row)){
            return false;
        }else{
            return $row;
        }
    }
}
?>