<?php

class bookView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showBooks($books) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($books);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/listaBooks.phtml';
    }

    public function showListaAutores($books, $authors) {
        $authors = $authors;

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/listaBooks.phtml';
    }

    public function showInfo($info){
        $data = $info;
        require 'templates/mostrarBooks.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showForm($info, $authors){
        $data = $info;
        require 'templates/form_editar_libro.phtml';
    }

}
