<?php
class AuthorView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    function showAuthors($authors) {
        $count = count($authors);
        require 'templates/authorList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    function showAuthor($author) {
        require 'templates/formAuthorChange.phtml';
    }

    public function showBookList($books, $authors) {
        $authors = $authors;

        require 'templates/listBookById.phtml';
    }

    function addAuthorForm() {
        require 'templates/formNewAuthor.phtml';
    }
}