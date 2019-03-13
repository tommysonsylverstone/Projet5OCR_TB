<?php

class UserManager {
	private $db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function addUser(User $user) {
		$q = $this->db->prepare('INSERT INTO user(name, password, email, type) VALUES(:name, :password, :email, :type)');

		$q->bindValue(':name', $user->getName());
		$q->bindValue(':password', $user->getPassword());
		$q->bindValue(':email', $user->getEmail());
		$q->bindValue(':type', $user->getType());

		$q-> execute();

		$this->hydrate([':id' => $this->db->lastInsertId()]);
	}

	public function updatePassword(User $user) {
		$q = $this->db->prepare('UPDATE user SET password = :password');

		$q->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);

		$q->execute();
	}

	public function updateEmail(User $user) {
		$q = $this->db->prepare('UPDATE user SET email = :email');

		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);

		$q->execute();
	}

	public function setDb(PDO $db) {
		$this->db = $db;
	}
}


