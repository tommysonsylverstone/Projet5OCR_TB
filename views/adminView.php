<?php $title = 'Page d\'administration';

include_once('includes/autoloader.php');

session_start();

ob_start(); ?>

<ul>
	<li><a href="addPostView.php" class="Addpost">Ajouter un billet</a></li>
	<li><a href="index.php?action=ViewMembersList" class="Viewmembers">Voir la liste des membres</a></li>
	<li><a href="logout.php" class="Deconnection">Vous déconnecter</a></li>
	<li><a href="commentApprovalView.php">Voir la liste des commentaires non validés</a></li>
</ul>

<section>Bienvenue <?= $_SESSION['username'] ?>!</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
