<?php 

if (isset($_SESSION['username'])) {
	$title = "Vous êtes connecté !";	
} else {
	$title = "Oups !";
}

$image = 'public/img/temple_jp.jpg';

ob_start();

include('includes/header-bg.php');

if (isset($_SESSION["username"])) { ?>
	<div class="container">
		<h3>Vous êtes connecté, bienvenue <?= $_SESSION["username"] ?> !</h3>
		<a href="index.php">Revenir à l'accueil</a>
	</div>
<?php } else { ?>
	<div class="container">
		<p>Quelque chose s'est mal passé.</p>
		<a href="?action=login">Vous reconnecter</a>
	</div>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
