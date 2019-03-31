<?php

session_start();

$title = 'Accueil';
?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<article>
	<h1>Bienvenue sur mon blog !</h1>
	<p>Ici vous trouverez toutes les informations me concernant vis à vis de mon parcours professionnel, mes formations et mes passions.</p>
</article>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>
