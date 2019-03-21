<?php

class BaseManager {
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=ocr_p5;charset=utf8', 'root', '');
        return $db;
    }
}