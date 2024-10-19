<?php
require_once 'model.php';

class bookModel {
    private $db;

    public function __construct() {
        $model = new Model();
        $this->db = $model->db;
    }
 
    public function getBooks() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT libros.*, autores.Nombre AS AutorNombre FROM libros JOIN autores ON libros.Autor = autores.id');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $books = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $books;
    }

    public function getInfo($id) {    
        $query = $this->db->prepare('SELECT libros.*, autores.Nombre FROM libros JOIN autores ON libros.Autor = autores.id WHERE libros.id = ?');
        $query->execute([$id]);   
    
        $data = $query->fetch(PDO::FETCH_OBJ);
    
        return $data;
    }

    public function getBooksById($id) {    
        $query = $this->db->prepare('SELECT * FROM libros WHERE Autor = ?');
        $query->execute([$id]);   
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    public function getBook($id) {    
        $query = $this->db->prepare('SELECT * FROM libros WHERE id = ?');
        $query->execute([$id]);   
    
        $book = $query->fetch(PDO::FETCH_OBJ);
    
        return $book;
    }

 
    public function insertBook($title, $gender, $pages, $publisher, $author) { 
        $query = $this->db->prepare('INSERT INTO libros(Titulo, Genero, CantidadPaginas, Editorial, Autor) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$title, $gender, $pages, $publisher, $author]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseBook($id) {
        $query = $this->db->prepare('DELETE FROM libros WHERE id = ?');
        $query->execute([$id]);
    }

    
    public function updateBooks($title, $gender, $pages, $publisher, $author, $id) { 
        $query = $this->db->prepare('UPDATE libros SET Titulo = ?, Genero = ?, CantidadPaginas = ?, Editorial = ?, Autor = ? WHERE id = ?');
        $query->execute([$title, $gender, $pages, $publisher, $author, $id]);
    
        return $id;
    }


}