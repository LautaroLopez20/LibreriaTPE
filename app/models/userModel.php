<?php
require_once 'model.php';

class UserModel{
    private $db;

    public function __construct() {
        $model = new Model();
        $this->db = $model->db;
    }

    public function getUserByName($name) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$name]);
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}