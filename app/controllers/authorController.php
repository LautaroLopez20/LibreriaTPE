<?php
require_once './app/models/authorModel.php';
require_once './app/views/authorView.php';

class AuthorController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new authorModel();
        $this->view = new authorView();
    }

    function authorList() {
        $authors = $this->model->getAuthors();
        return $this->view->showAuthors($authors);
    }
}