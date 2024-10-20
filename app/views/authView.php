<?php

class AuthView {
    private $user = null;

    public function ShowLogin($error = '') {
        require './app/templates/formLogin.phtml';
    }
}