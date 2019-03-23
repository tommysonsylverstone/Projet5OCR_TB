<?php

class BaseManager {
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=test_ocrp5;charset=utf8', 'root', '');
        return $db;
    }
}