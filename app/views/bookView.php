<?php

class bookView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showBooks($books) {
        $count = count($books);

        require 'templates/listaBooks.phtml';
    }

    public function showListaAutores($books, $authors) {
        $authors = $authors;

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
