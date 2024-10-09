<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=libreriaentrega1;charset=utf8', 'root', '');
    }

    public function getUserByName($name) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$name]);
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}