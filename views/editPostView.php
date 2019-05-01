<?php $title = 'Edition de post';

include_once('includes/autoloader.php');

session_start();

$authorName = $_POST['authorName'] ?? '';
$titleP = $_POST['titleP'] ?? '';
$chapo = $_POST['chapo'] ?? '';
$content = $_POST['content'] ?? '';
$postGetId = $_GET['id'];

if (isset($_POST['confirm-edit'])) {
	if (empty($authorName) || empty($titleP) || empty($chapo) || empty($content)) {
		echo "Veuillez remplir tous les champs";
	} else {
		$post = new Post($titleP, $chapo, $content, $authorName);
		$post->setId($_GET['id']);
		$pManager = new PostManager();
		$pManager->updatePost($post);

		header("location: PostView.php?id=$postGetId");
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
		<input type="text" name="authorName" placeholder="Auteur" value="<?= $postId['authorName'] ?>" /><br/>
		<input type="text" name="titleP" placeholder="Titre" value="<?= $postId['titleP'] ?>" /><br/>
		<input type="text" name="chapo" placeholder="Chapo" value="<?= $postId['chapo'] ?>"/><br/>
		<textarea name="content" placeholder="Contenu du billet"><?=  $postId['content'] ?></textarea><br/>
		<button name="confirm-edit">Confirmer</button>
	</form>
</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
