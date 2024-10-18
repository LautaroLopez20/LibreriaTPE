<?php
require_once 'libs/response.php';
require_once 'app/middlewares/sessionAuthMiddleware.php';
require_once 'app/middlewares/verifyAuthMiddleware.php';
require_once 'app/controllers/authController.php';
require_once 'app/controllers/authorController.php';
require_once 'app/controllers/bookController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'home';
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        SessionAuthMiddleware($res);
        $controller = new bookController($res);
        $controller->showBooks();
        break;
    case 'detalle':
        SessionAuthMiddleware($res);
        $controller = new bookController($res);
        $controller->showDetails($params[1]);
        break;
    case 'listarAutores':
        SessionAuthMiddleware($res);
        $controller = new authorController($res);
        $controller->authorList();
        break;
    case 'obras':
        SessionAuthMiddleware($res);
        $controller = new bookController($res);
        $controller->showBooksById($params[1]);
        break;
    case 'eliminarAutor':
        SessionAuthMiddleware($res);
        VerifyAuthMiddleware($res);
        $controller = new authorController($res);
        $controller->deleteAuthor($params[1]);
        break;
    case 'cargarAutor':
        SessionAuthMiddleware($res);
        VerifyAuthMiddleware($res);
        $controller = new authorController($res);
        $controller->addAuthor();
        break; 
    case 'agregarAutor':
        SessionAuthMiddleware($res);
        VerifyAuthMiddleware($res);
        $controller = new authorController($res);
        $controller->newAuthor();
        break; 
    case 'showLogin':
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
    default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}