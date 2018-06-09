<?php

namespace Models;

class Home {
    private $db;

    public function __construct(){
        $this->db = new \Database();
    }

    public function count(){
        return $this->db->rowCount();
    }
}