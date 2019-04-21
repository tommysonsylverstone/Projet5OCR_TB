<?php 

$postC = $_POST['comment-content'] ?? '';

$pDate = date_create($post['postDate']);
$pDateFr = date_format($pDate, 'd/m/Y à H:i:s');

$pLastUp = date_create($post['lastUpdated']);
$pLastUpFr = date_format($pLastUp, 'd/m/Y à H:i:s');

ob_start(); ?>

<article class="single-post">
	<div class="post-header">
		<h1><?= $post['titleP'] ?> écrit par <?= $post['authorName'] ?> le <?= $pDateFr ?></h1>
	</div>
	<?php
	if (!empty($post['lastUpdated'])) {
		?>
		<div class="last-updated">
			<p>édité le <?= $pLastUpFr ?></p>
		</div>
	<?php } ?>
	<div class="post-chapo">
		<p><?= htmlspecialchars($post['chapo']) ?></p>
	</div>
	<div class="post-content">
		<p><?= nl2br(htmlspecialchars($post['content'])) ?>
	</div>
	<a href="?action=postsList">Retour à la liste des billets</a>
	<?php new UserManager();
	$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
	if ($user['type'] == 'admin' && !empty($_SESSION['username'])) { ?>
		<a href="?action=editPost&amp;id=<?= $_GET['id'] ?>">éditer ce post</a>
	<?php } ?>
</article>

<section class="comments-list">
	<h2>Commentaires : </h2>
	<?php
	if ($comNumbers == 0) {
		echo "Pas de commentaires pour le moment";
	} else {
		while($comment = $comments->fetch()) {
			if ($comment['isValidated'] == true) {
				$cDate = date_create($comment['commentDate']);
				$cDateFr = date_format($cDate, 'd/m/Y à H:i:s');
				?>
				<div class="comment-body">
					<h3>Par <?= $comment['authorName'] ?> le <?= $cDateFr ?></h3>
					<p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
				</div>
			<?php }
		}
	} ?>
</section>

<?php if (!empty($_SESSION['username'])) { ?>
	<section class="comment-form">
		<form method="post" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>">
			<label for="comment-content">Votre commentaire :</label><br/>
			<textarea name="comment-content" class="comment-textarea" placeholder="Ecrire votre commentaire ici" value="<?= $postC ?>"></textarea><br/>
			<button name="confirm-comment">Envoyer</button>
		</form>
	</section>
<?php } else { ?>
	<p>Pour commenter, vous devez vous connecter. <a href="?action=register">Vous inscrire</a> ou <a href="?action=login">Vous connecter</a></p>
<?php }

$content = ob_get_clean();

require('views/includes/template.php'); ?>
