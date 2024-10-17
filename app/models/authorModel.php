<?php
class AuthorModel {
    private $db;
    
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=libreriaentrega1;charset=utf8', 'root', '');
    }

    public function getAuthors() {
        $query = $this->db->prepare('SELECT * FROM autores');
        $query->execute();
        $authors = $query->fetchAll(PDO::FETCH_OBJ); 
        return $authors;
    }

    function deleteAuthor($id) {
        $query = $this->db->prepare("DELETE FROM autores WHERE id = ?");
        $query->execute([$id]);
    }
}