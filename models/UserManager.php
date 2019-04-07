<?php

require_once('BaseManager.php');

class UserManager extends BaseManager {
	public function __construct() {
		$this->db = $this->dbConnect();
	}

	public function register(User $user) {
		$q = $this->db->prepare('INSERT INTO users(username, password, email, type) VALUES(:username, :password, :email, :type)');

		$q->bindValue(':username', $user->getUsername());
		$q->bindValue(':password', md5($user->getPassword()));
		$q->bindValue(':email', $user->getEmail());
		$q->bindValue(':type', $user->getType());

		$q-> execute();
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

	public function getUser($userId) {
		$q = $this->db->prepare('SELECT * FROM users WHERE username = ?');
		$q->execute(array($userId));
		$user = $q->fetch();

		return $user;
	}

	public function userExists($uName) {
		$q = $this->db->prepare('SELECT COUNT(*) FROM users WHERE username = :username');
		$q->execute([':username' => $uName]);

		return (bool) $q->fetchColumn();
	}

	public function emailExists($email) {
		$q = $this->db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
		$q->execute([':email' => $email]);

		return (bool) $q->fetchColumn();
	}
}
