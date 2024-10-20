<?php
class AuthorView {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    function showAuthors($authors) {
        $count = count($authors);
        require './app/templates/authorList.phtml';
    }

    public function showError($error) {
        require './app/templates/error.phtml';
    }

    function showAuthor($author) {
        require './app/templates/formAuthorChange.phtml';
    }

    public function showBookList($books, $authors) {
        $authors = $authors;

        require './app/templates/listBookById.phtml';
    }

    function addAuthorForm() {
        require './app/templates/formNewAuthor.phtml';
    }
}