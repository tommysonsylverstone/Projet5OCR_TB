<?php 

$title = "Inscription";

include_once('includes/autoloader.php');
include_once('../models/user.php');

if (isset($_POST['register-button'])) {
	$uManager = new UserManager();
	$user = new Member();
	if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass1']) || empty($_POST['pass2'])) {
		echo "Veuillez renseigner tous les champs";
	} elseif (isset($_POST['pass1']) != isset($_POST['pass2'])) {
		echo "Les deux mots de passe ne correspondent pas"; 
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo "L'adresse mail est invalide";
	} elseif ($uManager->userExists($_POST['username'])) {
		echo "Ce nom d'utilisateur est déjà pris";
	} elseif ($uManager->emailExists($_POST['email'])) {
		echo "Cette adresse mail est déjà utilisée";
	} else {
	$user->setUsername($_POST['username']);
	$user->setPassword($_POST['pass1']);
	$user->setEmail($_POST['email']);
	$uManager->register($user);
	}
	
}

ob_start(); ?>

<form method="post" action="">
	<input type="text" name="username" placeholder="Nom d'utilisateur" /><br/>
	<input type="text" name="email" placeholder="Adresse e-mail" /><br/>
	<input type="password" name="pass1" placeholder="Mot de passe" /><br/>
	<input type="password" name="pass2" placeholder="Confirmer le mot de passe" /><br/>
	<button name="register-button">Confirmer</button>
</form>

<? $content = ob_get_clean();

require('includes/template.php'); ?>
