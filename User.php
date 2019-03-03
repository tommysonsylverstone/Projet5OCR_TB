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

	public function getName() {
		return $this->name;
	}

	public function getType() {
		return $this->type;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setId($id) {
		$id = (int) $id;
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setName($name) {
		if (is_string($name)) {
			$this->name = $name;
		}
	}

	public function setPassword($password) {
		if (is_string($password)) {
			$this->password = $password;
		}
	}

	public function setEmail($email) {
		if (is_string($email)) {
			$this->email = $email;
		}
	}

}

class Admin extends User {}

class Member extends User {}

