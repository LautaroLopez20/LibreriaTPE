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

        // mando las tareas a la vista
        return $this->view->showBooks($books);
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

    public function addTask() {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('Falta completar el título');
        }
    
        if (!isset($_POST['priority']) || empty($_POST['priority'])) {
            return $this->view->showError('Falta completar la prioridad');
        }
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
    
        $id = $this->model->insertTask($title, $description, $priority);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }

    
    public function deleteTask($id) {
        // obtengo la tarea por id
        $task = $this->model->getTask($id);

        if (!$task) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        // borro la tarea y redirijo
        $this->model->eraseTask($id);

        header('Location: ' . BASE_URL);
    }
}


