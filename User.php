<?php

abstract class User {
	private $id;
	private $type;
	private $name;
	private $password;
	private $email;

	public function __construct() {
		$this->type = strtolower(static::class);
	}

	public function getId() {
		return $this->id;
	}

	public function setId(int $id) {
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function getName() {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}

	public function getType() {
		return $this->type;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}
}

class Admin extends User {}

class Member extends User {}
