<?php $title = 'Page d\'administration';

include_once('includes/autoloader.php');

session_start();

ob_start();
?>

<header>
	<a href="mainPageView.php">Retour à l'accueil</a>
	<ul>
		<li><a href="" class="Addpost">Ajouter un billet</a></li>
		<li><a href="index.php?action=ViewMembersList" class="Viewmembers">Voir la liste des membres</a></li>
		<li><a href="logout.php" class="Deconnection">Vous déconnecter</a></li>
	</ul>
</header>

<section>Bienvenue <?= $_SESSION['username'] ?>!</section>

<?php include('includes/footer.php');

$content = ob_get_clean();

require('includes/template.php'); ?>
