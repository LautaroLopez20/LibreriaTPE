<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=libreriaentrega1;charset=utf8', 'root', '');
    }

    //IMPLEMENTAR EL GET USER BY.. (DESDE LA DB)
}