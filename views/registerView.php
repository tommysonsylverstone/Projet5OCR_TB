<?php 

$title = "Inscription";

include_once('includes/autoloader.php');
include_once('../models/user.php');

if (isset($_POST['register-button'])) {
	$uManager = new UserManager();
	$user = new Member();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$passone = $_POST['pass1'];
	$passtwo = $_POST['pass2'];
	if (empty($username) || empty($email) || empty($passone) || empty($passtwo)) {
		echo "Veuillez renseigner tous les champs";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "L'adresse mail est invalide";
	} elseif ($uManager->userExists($username)) {
		echo "Ce nom d'utilisateur est déjà pris";
	} elseif ($uManager->emailExists($email)) {
		echo "Cette adresse mail est déjà utilisée";
	} elseif (!preg_match("#^[a-zA-Z0-9_-]{3,20}$#", $username)) {
		echo "Le nom d'utilisateur fait plus de 20 caractères ou ne respecte pas les normes";
	} elseif (!preg_match("#^[a-zA-Z0-9]{10,}$#", $passone)) {
		echo "Le mot de passe doit faire plus de 10 caractères";
	} elseif ($passone !== $passtwo) {
		echo "Les deux mots de passe ne correspondent pas"; 
	} else {
	$user->setUsername($username);
	$user->setPassword($passone);
	$user->setEmail($email);
	$uManager->register($user);

	header("location: registerSuccess.php?registration=success");
	}
}

ob_start(); ?>

<form method="post" action="">
	<label for="username">Nom d'utilisateur :</label><br/>
	<input type="text" name="username" id="username" placeholder="Nom d'utilisateur" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];} else {echo '';} ?>" /><br/>
	<label for="email">Adresse e-mail :</label><br/>
	<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="<?php if (isset($_POST['email'])) { echo $_POST['email'];} else {echo '';} ?>"/><br/>
	<label for="pass1">Mot de passe :</label><br/>
	<input type="password" name="pass1" id="pass1" placeholder="Mot de passe" /><br/>
	<label for="pass2">Confirmer mot de passe :</label><br/>
	<input type="password" name="pass2" id="pass2" placeholder="Confirmer le mot de passe" /><br/>
	<button name="register-button">Confirmer</button>
</form>

<? $content = ob_get_clean();

require('includes/template.php'); ?>
