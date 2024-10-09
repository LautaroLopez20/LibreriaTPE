<?php
require_once './app/models/userModel.php';
require_once './app/views/authView.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function ShowLogin() {
        return $this->view->ShowLogin();
    }

    //IMPLEMENTAR FUNCION LOGIN

    

















































    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}