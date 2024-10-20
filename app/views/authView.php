<?php

class AuthView {
    private $user = null;

    public function ShowLogin($error = '') {
        require 'templates/formLogin.phtml';
    }
}