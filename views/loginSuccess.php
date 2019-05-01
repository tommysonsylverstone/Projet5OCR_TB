<?php 

if (isset($_SESSION['username'])) {
	$title = "Vous êtes connecté !";	
} else {
	$title = "Oups !";
}


ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/temple_jp.jpg')">
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

<?php if(isset($_SESSION["username"])) { ?>
	<div class="container">
		<h3>Vous êtes connecté, bienvenue <?= $_SESSION["username"] ?> !</h3>
		<a href="index.php">Revenir à l'accueil</a>
	</div>
	<?php
} else { ?>
	<div class="container">
		<p>Quelque chose s'est mal passé.</p>
		<a href="?action=login">Vous reconnecter</a>
	</div>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
