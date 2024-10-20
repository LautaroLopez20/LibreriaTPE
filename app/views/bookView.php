<?php

class bookView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showBooks($books, $authors) {
        $authors = $authors;

        require './app/templates/listingBooks.phtml';
    }

    public function showInfo($info){
        $data = $info;
        require './app/templates/detailsOfBook.phtml';
    }

    public function showError($error) {
        require './app/templates/error.phtml';
    }

    public function showForm($info, $authors){
        $data = $info;
        require './app/templates/formEditBook.phtml';
    }

}
