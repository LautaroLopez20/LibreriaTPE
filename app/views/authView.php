<?php

class AuthView {
    private $user = null;

    public function ShowLogin($error = '') {
        require 'templates/form_login.phtml';
    }
}