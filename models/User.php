<?php

abstract class User {
	private $id;
	private $type;
	private $username;
	private $password;
	private $email;

	public function __construct() {
		$this->type = strtolower(static::class);
	}

	public function getId():int {
		return $this->id;
	}

	public function setId(int $id):void {
		$this->id = $id;
	}

	public function getUserName():string {
		return $this->username;
	}

	public function setUserName(string $username) {
		$this->username = $username;
	}

	public function getType():string {
		return $this->type;
	}

	public function getPassword():string {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}

	public function getEmail():string {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}
}

class Admin extends User {}

class Member extends User {}
