<?php

require_once('BaseManager.php');

class UserManager extends BaseManager {
	private $db;

	//Fonction qui permet de se connecter à la DB dès que l'on appelle l'objet
	public function __construct() {
		$this->db = new BaseManager();
		$this->db = $this->db->dbConnect();
	}


	public function addUser(User $user) {
		$q = $this->db->prepare('INSERT INTO users(name, password, email, type) VALUES(:name, :password, :email, :type)');

		$q->bindValue(':name', $user->getName());
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

	public function login($name, $password) {
		if (!empty($name) && !empty($password)) {
			$q = $this->db->prepare('SELECT * FROM users WHERE name=:name and password=:password');

			$q->bindValue('name', $name, PDO::PARAM_STR);
			$q->bindValue('password', $password, PDO::PARAM_STR);

			$q->execute();

			if ($q->rowCount() == 1) {
				$_SESSION['username'] = $name;
				header('location: loginSuccess.php');
			} else {
				echo "Nom d'utilisateur ou mot de passe incorrect.";
			}
		} else {
			echo "Veuillez ne pas oublier de champ.";
		}
	}
}
