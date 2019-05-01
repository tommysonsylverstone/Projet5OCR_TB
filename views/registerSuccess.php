<?php $title = "Enregistrement terminé";

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/road.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>
</header>

<?php if (!isset($_GET['registration']) || $_GET['registration'] !== 'success') { 
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
