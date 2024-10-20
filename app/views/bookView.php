<?php

class bookView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showBooks($books) {
        $count = count($books);

        require 'templates/listingBooks.phtml';
    }

    public function showBookList($books, $authors) {
        $authors = $authors;

        require 'templates/listingBooks.phtml';
    }

    public function showInfo($info){
        $data = $info;
        require 'templates/detailsOfBook.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showForm($info, $authors){
        $data = $info;
        require 'templates/formEditBook.phtml';
    }

}
