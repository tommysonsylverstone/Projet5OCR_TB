<?php $title = "Enregistrement terminé";

$image = 'public/img/road.jpg';

ob_start();

include('includes/header-bg.php');

if (!isset($_GET['registration']) || $_GET['registration'] !== 'success') { 
	header("location: index.php");
} else { ?>
	<section class="register_success container">
		<p><h2>Votre enregistrement a été effectué avec succès !</h2><br/>
			<a href="index.php">Retour à l'accueil</a><br/>
			<a href="?action=login">Vous connecter</a>
		</p>
	</section>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
