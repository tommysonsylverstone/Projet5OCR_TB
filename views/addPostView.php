<?php $title = 'Ajout de billet';

include_once('includes/autoloader.php');

session_start();

if (isset($_POST['confirm-button'])) {
	if (empty($_SESSION['username'])) {
		echo "Vous n'avez pas accès à cette page";
	} elseif (empty($_POST['titleP']) || empty($_POST['chapo']) || empty($_POST['content'])) {	
		echo "Veuillez remplir tous les champs";
	} else {
		$post = new Post();
		$post->setAuthorName($_SESSION['username']);
		$post->setTitleP($_POST['titleP']);
		$post->setChapo($_POST['chapo']);
		$post->setContent($_POST['content']);
		$pManager = new PostManager();
		$pManager->addPost($post);
	}
}

ob_start();

include('includes/header.php');
?>

<form method="post" action="">
	<input type="text" name="titleP" placeholder="Titre" /> <br/>
	<input type="text" name="chapo" placeholder="Chapo" /> <br/>
	<textarea name="content" placeholder="Ecrivez votre billet"></textarea> <br/>
	<button type="submit" name="confirm-button">Confirmer</button>
</form>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
