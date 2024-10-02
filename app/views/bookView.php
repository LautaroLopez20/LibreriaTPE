<?php

class bookView {

    public function __construct() {
 
    }

    public function getBooks($books) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($books);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/listaBooks.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

}
