<?php $title = "Enregistrement";

ob_start(); 

if (!isset($_GET['registration']) || $_GET['registration'] !== 'success') {
	?>
	<p>Vous n'avez pas accès à cette page.<br/>
		<a href="mainPageView.php">Retour à l'accueil</a></p>
	<?php } else { ?>
	<section class="register_success">
		<p><h2>Votre enregistrement a été effectué avec succès !</h2><br/>
		<a href="mainPageView.php">Retour à l'accueil</a><br/>
		<a href="login.php">Vous connecter</a>
		</p>
	</section>
	<?php } 

$content = ob_get_clean();

require('includes/template.php'); ?>
