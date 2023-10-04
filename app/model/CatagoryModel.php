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
}




?>