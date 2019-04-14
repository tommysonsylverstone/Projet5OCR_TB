<?php 

include_once('includes/autoloader.php');

session_start();

$pManager = new PostManager();
$post = $pManager->getPost($_GET['id']);
$title = $post['titleP'];

$postC = $_POST['comment-content'] ?? '';
if (isset($_POST['confirm-comment'])) {
	$comment = new Comment($_GET['id'], $_SESSION['username'], $postC);
	$cManager = new CommentManager();
	$cManager->addComment($comment);

	header("location: " . $_SERVER['REQUEST_URI']);
	exit();
}

ob_start(); 

include('includes/header.php'); ?>


<article class="single-post">
	<div class="post-header">
		<h1><?= $post['titleP'] ?> écrit par <?= $post['authorName'] ?> le <?= $post['postDate_fr'] ?></h1>
	</div>
	<?php
	if (!empty($post['lastUpdated_fr'])) {
		?>
		<div class="last-updated">
			édité le <?= $post['lastUpdated_fr'] ?>
		</div>
	<?php } ?>
	<div class="post-content">
		<p><?= $post['content'] ?>
	</div>
</article>

<h2>Commentaires : </h2>

<section class="comments-list">
	<?php 
		$cManager = new CommentManager();
		$comments = $cManager->getCommentsForPost($_GET['id']);
		$comNumbers = $cManager->count(); 
		if ($comNumbers == 0) {
			echo "Pas de commentaires pour le moment";
		} else {
			while($comment = $comments->fetch()) {
			?>
			<div class="comment-header">
				<h3>Par <?= $comment['authorName'] ?> le <?= $comment['commentDate_fr'] ?></h3>
			</div>
			<div class="comment-content">
				<p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
			</div>
		<?php }
		} ?>
			
</section>

<?php if (!empty($_SESSION['username'])) {
	?>
	<section class="comment-form">
	<form method="post" action="">
		<label for="comment-content">Votre commentaire :</label><br/>
		<textarea name="comment-content" placeholder="Ecrire votre commentaire ici" value="<?= $postC ?>"></textarea><br/>
		<button name="confirm-comment">Envoyer</button>
	</form>
</section> 
<?php } else { ?>
	<p>Pour commenter, vous devez vous connecter. <a href="registerView.php">Vous inscrire</a> ou <a href="login.php">Vous connecter</a></p>
<?php }

$content = ob_get_clean();


require('includes/template.php'); ?>
