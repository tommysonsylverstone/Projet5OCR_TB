<?php $title = 'Page d\'administration';

include_once('includes/autoloader.php');

session_start();

ob_start(); ?>

<ul>
	<li><a href="?action=addPostView" class="Addpost">Ajouter un billet</a></li>
	<li><a href="index.php?action=ViewMembersList" class="Viewmembers">Voir la liste des membres</a></li>
	<li><a href="?action=logout" class="Deconnection">Vous déconnecter</a></li>
	<li><a href="?action=commentApprovalView">Voir la liste des commentaires non validés</a></li>
</ul>

<section>Bienvenue <?= $_SESSION['username'] ?>!</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
