<?php 

session_start();
$title = 'Page d\'administration';
ob_start();

?>

<header>
	<a href="mainPageView.php">Retour à l'accueil</a>
	<ul>
		<li><a href="index.php?action=AddPost" class="Addpost">Ajouter un billet</a></li>
		<li><a href="index.php?action=ViewMembersList" class="Viewmembers">Voir la liste des membres</a></li>
		<li><a href="index.php?action=logout" class="Deconnection">Vous déconnecter</a></li>
	</ul>
</header>

<section>Bienvenue <?= $_SESSION['username'] ?>!</section>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>
