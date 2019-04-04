<?php 

function chargeClass($class) {
	require '../models/'.$class.'.php';
}

spl_autoload_register('chargeClass');

session_start();
$title = 'Ajout de billet';

if (isset($_POST['confirm-button'])) {	
	$post = new Post();
	$post->setAuthorName($_POST['authorName']);
	$post->setTitleP($_POST['titleP']);
	$post->setChapo($_POST['chapo']);
	$post->setContent($_POST['content']);
	$pManager = new PostManager();
	$pManager->addPost($post);
}

ob_start();

?>


<form method="post" action="">
	<input type="text" name="authorName" placeholder="Auteur"/> <br/>
	<input type="text" name="titleP" placeholder="Titre" /> <br/>
	<input type="text" name="chapo" placeholder="Chapo" /> <br/>
	<textarea name="content" placeholder="Ecrivez votre billet"></textarea> <br/>
	<button type="submit" name="confirm-button">Confirmer</button>
</form>



<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>
