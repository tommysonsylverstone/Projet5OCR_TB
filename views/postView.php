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

ob_start(); ?>


<article class="single-post">
	<div class="post-header">
		<h1><?= $post->getTitle() ?> écrit par <?= $post->getAuthorName() ?></h1>
	</div>
	<?php
	if (!empty($post->getLastUpdated())) {
		?>
		<div class="last-updated">
			<p>édité le <?= $post->getFormattedLastUpdated() ?></p>
		</div>
	<?php } ?>
	<div class="post-chapo">
		<p><?= $post->getChapo() ?></p>
	</div>
	<div class="post-content">
		<p><?= $post->getEscapedContent() ?>
	</div>
	<a href="listPostsView.php">Retour à la liste des billets</a>
	<?php new UserManager();
	$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
	if ($user['type'] == 'admin' && !empty($_SESSION['username'])) { ?>
		<a href="editPostView.php?id=<?= $_GET['id'] ?>">éditer ce post</a>
	<?php } ?>
</article>

<section class="comments-list">
	<h2>Commentaires : </h2>
	<?php
	$cManager = new CommentManager();
	$comments = $cManager->getCommentsForPost($_GET['id']);
	$comNumbers = $cManager->count(); 
	if ($comNumbers == 0) {
		echo "Pas de commentaires pour le moment";
	} else {
		foreach($comments as $comment) {
			if ($comment->getIsValidated() === true) { ?>
				<div class="comment-body">
					<h3>Par <?= $comment->getAuthorName() ?> le <?= $comment->getFormattedCommentDate() ?></h3>
					<p><?= $comment->getEscapedContent() ?></p>
				</div>
				<hr>
			<?php }
		}
	} ?>
</section>

<?php if (!empty($_SESSION['username'])) { ?>
	<section class="comment-form">
		<h6>/!\ Avant d'être affichés, vos commentaires seront soumis à confirmation par l'administrateur. /!\</h6>
		<form method="post" action="index.php?action=addComment&amp;id=<?= $post->getId(); ?>">
			<label for="comment-content">Votre commentaire :</label><br/>
			<textarea name="comment-content" class="comment-textarea" placeholder="Ecrire votre commentaire ici" value="<?= $postC ?>"></textarea><br/>
			<button name="confirm-comment">Envoyer</button>
		</form>
	</section>
<?php } else { ?>
	<p>Pour commenter, vous devez vous connecter. <a href="registerView.php">Vous inscrire</a> ou <a href="login.php">Vous connecter</a></p>
<?php }

$content = ob_get_clean();

require('includes/template.php'); ?>
