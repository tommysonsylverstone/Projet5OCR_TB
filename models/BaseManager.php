<?php

class BaseManager {
	private $db;
	
	public static function dbConnect() {
		try {
		$db = new PDO('mysql:host=localhost;dbname=test_ocrp5;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	}
}
