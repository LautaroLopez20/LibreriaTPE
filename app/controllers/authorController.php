<?php
require_once './app/models/authorModel.php';
require_once './app/views/authorView.php';

class AuthorController {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new authorModel();
        $this->view = new authorView($res->user);
    }

    function authorList() {
        $authors = $this->model->getAuthors();
        return $this->view->showAuthors($authors);
    }

    function deleteAuthor($id) {
        $this->model->deleteAuthor($id);
        header('Location: ' . BASE_URL);
    }
}