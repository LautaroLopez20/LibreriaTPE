<?php
require_once './app/models/bookModel.php';
require_once './app/views/bookView.php';

class bookController {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new bookModel();
        $this->view = new bookView($res->user);
    }

    public function showBooks() {
        // obtengo las tareas de la DB
        $books = $this->model->getBooks();

        $authorModel = new authorModel(); 
        $authors = $authorModel->getAuthors();

        // mando las tareas a la vista
        return $this->view->showListaAutores($books, $authors);
    }

    public function showDetails($id){
        $info = $this->model->getInfo($id);
        return $this->view->showInfo($info);
    }

    public function showBooksById($id) {
        // obtengo las tareas de la DB
        $books = $this->model->getBooksById($id);

        // mando las tareas a la vista
        return $this->view->showBooks($books);
    }

    public function addBook() {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('Falta completar el título');
        }
    
        if (!isset($_POST['gender']) || empty($_POST['gender'])) {
            return $this->view->showError('Falta completar el genero');
        }

        if (!isset($_POST['pages']) || empty($_POST['pages'])) {
            return $this->view->showError('Falta completar la cantidad de paginas');
        }
    
        if (!isset($_POST['publisher']) || empty($_POST['publisher'])) {
            return $this->view->showError('Falta completar la editorial');
        }

        if (!isset($_POST['author']) || empty($_POST['author'])) {
            return $this->view->showError('Falta completar el autor');
        }
    
        $title = $_POST['title'];
        $gender = $_POST['gender'];
        $pages = $_POST['pages'];
        $publisher = $_POST['publisher'];
        $author = $_POST['author'];
    
        $id = $this->model->insertBook($title, $gender, $pages, $publisher, $author);
    
        header('Location: ' . BASE_URL);
    }

    
    public function deleteBook($id) {
        $book = $this->model->getBook($id);

        if (!$book) {
            return $this->view->showError("No existe el libro que desea eliminar");
        }

        $this->model->eraseBook($id);

        header('Location: ' . BASE_URL);
    }

    public function updateInfo($id){
        $info = $this->model->getInfo($id);

        $authorModel = new authorModel(); 
        $authors = $authorModel->getAuthors();

        return $this->view->showForm($info, $authors);
    }

    public function updateBook($id){
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('Falta completar el título');
        }
    
        if (!isset($_POST['gender']) || empty($_POST['gender'])) {
            return $this->view->showError('Falta completar el genero');
        }

        if (!isset($_POST['pages']) || empty($_POST['pages'])) {
            return $this->view->showError('Falta completar la cantidad de paginas');
        }
    
        if (!isset($_POST['publisher']) || empty($_POST['publisher'])) {
            return $this->view->showError('Falta completar la editorial');
        }

        if (!isset($_POST['author']) || empty($_POST['author'])) {
            return $this->view->showError('Falta completar el autor');
        }
    
        $title = $_POST['title'];
        $gender = $_POST['gender'];
        $pages = $_POST['pages'];
        $publisher = $_POST['publisher'];
        $author = $_POST['author'];
    
        $this->model->updateBooks($title, $gender, $pages, $publisher, $author, $id);
    
        header('Location: ' . BASE_URL);
    }
}


