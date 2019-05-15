<?php

class Autoloader {
    static public function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static public function autoload($class) {
            require 'models/' . $class . '.php';
    }
}
