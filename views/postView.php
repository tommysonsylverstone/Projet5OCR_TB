<?php 

include_once('includes/autoloader.php');

session_start();

$pManager = new PostManager();
$post = $pManager->getPost($_GET['id']);
$title = $post['titleP'];

if (isset($_POST['confirm-comment'])) {
	$comment = new Comment($_GET['id'], $_SESSION['username'], $_POST['content']);
	$cManager = new CommentManager();
	$commentP = $cManager->addComment($comment);
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
				<p><?= $comment['content'] ?></p>
			</div>
		<?php }
		} ?>
			
</section>

<?php if (!empty($_SESSION['username'])) {
	?>
	<section class="comment-form">
	<form method="post" action="">
		<label for="content">Votre commentaire :</label><br/>
		<textarea name="content" placeholder="Ecrire votre commentaire ici"></textarea><br/>
		<button name="confirm-comment">Envoyer</button>
	</form>
</section> 
<?php } else { ?>
	<p>Pour commenter, vous devez vous connecter. <a href="register.php">Vous inscrire</a></p>
<?php }

$content = ob_get_clean();


require('includes/template.php'); ?>
