<?php

class CatagoryModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getallcategory()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->multipleSet();
    }
    public function getCategoryByName($name){
        $this->db->query('SELECT * FROM category WHERE name=:name');
        $this->db->bind(":name", $name);
        if($this->db->singleSet()){
            return true;
        }else{
            return false;
        }
    }
    public function InsertNewCategory($name){
        $this->db->query("INSERT INTO category (name) VALUES (:name) ");
        $this->db->bind(":name",$name);
        return $this->db->execute();
    }
}




?>