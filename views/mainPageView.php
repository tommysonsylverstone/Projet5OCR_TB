<?php $title = 'Accueil';

include_once('includes/autoloader.php');

session_start();

ob_start();

include('includes/header.php') ?>

<article>
	<h1>Bienvenue sur mon blog !</h1>
	<p>Ici vous trouverez toutes les informations me concernant vis à vis de mon parcours professionnel, mes formations et mes passions.</p>
</article>

<?php include('includes/footer.php');

$content = ob_get_clean();

require('includes/template.php'); ?>
