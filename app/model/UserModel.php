<?php

class UserModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getALLuser(){
        $this->db->query("SELECT * FROM users");
        return $this->db->multipleSet();
    }
}

?>