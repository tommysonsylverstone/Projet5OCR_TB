<?php

require_once('BaseManager.php');

class UserManager extends BaseManager {
	public function __construct() {
		$this->db = $this->dbConnect();
	}


	public function addUser(User $user) {
		$q = $this->db->prepare('INSERT INTO users(username, password, email, type) VALUES(:username, :password, :email, :type)');

		$q->bindValue(':username', $user->getUsername());
		$q->bindValue(':password', $user->getPassword());
		$q->bindValue(':email', $user->getEmail());
		$q->bindValue(':type', $user->getType());

		$q-> execute();

		$this->hydrate([':id' => $this->db->lastInsertId()]);
	}

	public function updatePassword(User $user) {
		$q = $this->db->prepare('UPDATE users SET password = :password');

		$q->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);

		$q->execute();
	}

	public function updateEmail(User $user) {
		$q = $this->db->prepare('UPDATE users SET email = :email');

		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);

		$q->execute();
	}

	public function login($username, $password) {
		if (!empty($username) && !empty($password)) {
			$q = $this->db->prepare('SELECT * FROM users WHERE username=:username and password=:password');

			$q->bindValue('username', $username, PDO::PARAM_STR);
			$q->bindValue('password', MD5($password), PDO::PARAM_STR);

			$q->execute();

			if ($q->rowCount() === 1) {
				$_SESSION['username'] = $username;
				header('location: loginSuccess.php');
			} else {
				echo "Nom d'utilisateur ou mot de passe incorrect.";
			}
		} else {
			echo "Veuillez ne pas oublier de champ.";
		}
	}
}
