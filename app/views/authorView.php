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
}