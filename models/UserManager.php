<?php

require_once('BaseManager.php');

class UserManager extends BaseManager {
	public static function register(User $user) {
		$db = new BaseManager();
		$q = $db->prepare('INSERT INTO users(username, password, email, type) VALUES(:username, :password, :email, :type)');

		$q->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
		$q->bindValue(':password', md5($user->getPassword()), PDO::PARAM_STR);
		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':type', $user->getType(), PDO::PARAM_STR);

		$q-> execute();
	}

	public function updatePassword(User $user) {
		$db = new BaseManager();
		$q = $db->prepare('UPDATE users SET password=:password WHERE username=:username');

		$q->bindValue(':password', md5($user->getPassword()), PDO::PARAM_STR);
		$q->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);

		$q->execute();
	}

	public function updateEmail(User $user) {
		$db = new BaseManager();
		$q = $db->prepare('UPDATE users SET email=:email WHERE username=:username');

		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
		
		$q->execute();
	}

	public function login(string $username, string $password) {
		$db = new BaseManager();
		$q = $db->prepare('SELECT * FROM users WHERE username=:username and password=:password');

		$q->bindValue('username', $username, PDO::PARAM_STR);
		$q->bindValue('password', MD5($password), PDO::PARAM_STR);

		$q->execute();
		
		if ($q->rowCount() === 1) {
			return new User();
		}
	}

	public static function getCurrentUser():User {
		$username = $_SESSION['username'] ?? null;

		if (!$username) {
			return new User();
		}

		$db = new BaseManager();
		$q = $db->prepare('SELECT * FROM users WHERE username = ?');
		$q->execute(array($username));

		$data = $q->fetch();

		return User::fromArray($data);
	}

	public static function userExists(string $uName):bool {
		$db = new BaseManager();
		$q = $db->prepare('SELECT COUNT(*) FROM users WHERE username=:username');
		$q->execute([':username' => $uName]);

		return $q->fetchColumn();
	}

	public static function emailExists(string $email):bool {
		$db = new BaseManager();
		$q = $db->prepare('SELECT COUNT(*) FROM users WHERE email=:email');
		$q->execute([':email' => $email]);

		return $q->fetchColumn();
	}
}
