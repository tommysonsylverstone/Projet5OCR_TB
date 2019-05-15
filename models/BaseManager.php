<?php

class BaseManager {
	private static $PDOInstance;

	public function __construct($dsn=false, $username=false, $password=false) {
		if(!self::$PDOInstance) {
			$dsn = 'mysql:host=localhost;dbname=test_ocrp5;charset=utf8';
			$username = 'root';
			$password = '';
			try {
				self::$PDOInstance = new PDO($dsn, $username, $password);
			} catch (PDOException $e) { 
				die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
			}
		}
		return self::$PDOInstance;
	}

	public function prepare($statement) {
		return self::$PDOInstance->prepare($statement);
	}

	public function query($statement) {
		return self::$PDOInstance->query($statement);
	}
}
