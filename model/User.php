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

	public function getId():int {
		return $this->id;
	}

	public function setId(int $id):void {
		$this->id = $id;
	}

	public function getName():string {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}

	public function getType() {
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