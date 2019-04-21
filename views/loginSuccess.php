<?php $title = "Vous êtes connecté !";

ob_start();

if(isset($_SESSION["username"])) {
	echo '<h3>Vous êtes connecté, bienvenue ' . $_SESSION["username"] . ' !</h3>';
	?>
	<a href="index.php">Revenir à l'accueil</a>
	<?php
} else {
	echo "Quelque chose s'est mal passé.";
	?>
	<a href="?action=login">Vous reconnecter</a>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
