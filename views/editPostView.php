<?php $title = 'Edition de post';

include_once('includes/autoloader.php');

session_start();

if (isset($_POST['confirm-edit'])) {
	if (empty($_POST['authorName']) || empty($_POST['titleP']) || empty($_POST['chapo']) || empty($_POST['content'])) {
		echo "Veuillez remplir tous les champs";
	} else {
		$post = new Post();
		$post->setId($_GET['id']);
		$post->setAuthorName($_POST['authorName']);
		$post->setTitleP($_POST['titleP']);
		$post->setChapo($_POST['chapo']);
		$post->setContent($_POST['content']);
		$pManager = new PostManager();
		$pManager->updatePost($post);

		header("location: listPostsview.php");
	}
}

ob_start(); 

include('includes/header.php'); ?>

<p>Voici le billet que vous voulez modifier :</p>

<?php
$pManager = new PostManager();
$postId = $pManager->getPost($_GET['id']);
?>

<div>
	<h3><?= htmlspecialchars($postId['titleP']) ?> écrit par <em><?= $postId['authorName'] ?></em></h3><br/>
	<?= htmlspecialchars($postId['chapo']) ?><br/>
	<p><?= nl2br(htmlspecialchars($postId['content'])) ?></p>
</div>

<section>
	<form method="post" action="">
		<input type="text" name="authorName" placeholder="Auteur" /><br/>
		<input type="text" name="titleP" placeholder="Titre" /><br/>
		<input type="text" name="chapo" placeholder="Chapo" /><br/>
		<textarea name="content" placeholder="Contenu du billet"></textarea><br/>
		<button name="confirm-edit">Confirmer</button>
	</form>
</section>

<?php include('includes/footer.php');

$content = ob_get_clean();

require('includes/template.php'); ?>
