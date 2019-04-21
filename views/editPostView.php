<?php $title = 'Edition de post';

include_once('views/includes/autoloader.php');

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
		$post->setId($postGetId);
		$pManager = new PostManager();
		$pManager->updatePost($post);

		header("location: ?action=post&id=$postGetId");
	}
}

ob_start(); ?>

<p>Voici le billet que vous voulez modifier :</p>

<?php
$pManager = new PostManager();
$postId = $pManager->getPost($postGetId);
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

require('views/includes/template.php'); ?>
