<?php
require_once 'app/controllers/authorController.php';
require_once 'app/controllers/bookController.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// listar  -> TaskController->showTask();
// nueva  -> TaskController->addTask();
// eliminar/:ID  -> TaskController->deleteTask($id);
// finalizar/:ID -> TaskController->finishTask($id);
// ver/:ID -> TaskController->view($id); COMPLETAR

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new bookController();
        $controller->showBooks();
        break;
    case 'detalle':
        $controller = new bookController();
        $controller->showDetails($params[1]);
        break;
    case 'listarAutores':
        $controller = new authorController();
        $controller->authorList();
        break;
    case 'obras':
        $controller = new bookController();
        $controller->showBooksById($params[1]);
        break;
    /*case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
    */default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}