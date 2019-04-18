<?php $title = "Vous êtes connecté !";

session_start();

if(isset($_SESSION["username"])) {
	echo '<h3>Vous êtes connecté, bienvenue ' . $_SESSION["username"] . ' !</h3>';
	?>
	<a href="login.php">Revenir à la page de connexion</a>
	<?php
} else {
	echo "Quelque chose s'est mal passé.";
	?>
	<a href="login.php">Vous reconnecter</a>
<?php } 

require('includes/template.php'); ?>
