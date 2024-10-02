<?php
class AuthorView {

    function showAuthors($authors) {
        $count = count($authors);
        require 'templates/authorList.phtml';
    }
}