<?php $title = $post->getTitle(); 

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/imperial_house.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<h1><?= $post->getTitle() ?></h1>
					<h2 class="subheading"><?= $post->getChapo() ?></h2>
					<span class="meta">écrit par <?= $post->getAuthorName() ?> le <?= $post->getFormattedDate() ?></span>
					<?php if (!empty($post->getLastUpdated())) { ?>
						<span class="meta">édité le <?= $post->getFormattedLastUpdated() ?></span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header>

<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<p><?= $post->getEscapedContent() ?></p>
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="?action=postsList">Retour à la liste des billets</a>
					</li>
					<?php if ($user->isAdmin()) { ?>
						<li class="list-inline-item"><a href="?action=editPost&amp;id=<?= $postId ?>">éditer ce post</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</article>

<hr>

<section class="container">
	<h2>Commentaires : </h2>
	
	<?php if (empty($comments)) { ?>
		<p class="text-center">Pas de commentaires pour le moment</p>
	<?php } else {
		foreach($comments as $comment) {
			if ($comment->getValidated()) { ?>
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
	<section class="comment-form container">
		<h6>/!\ Avant d'être affichés, vos commentaires seront soumis à confirmation par l'administrateur. /!\</h6>
		<form method="post" action="index.php?action=addComment&amp;id=<?= $post->getId(); ?>">
			<label for="comment-content">Votre commentaire :</label><br/>
			<textarea name="comment-content" rows="5" class="form-control" placeholder="Ecrire votre commentaire ici" required></textarea><br/>
			<button name="confirm-comment" class="btn btn-primary">Envoyer</button>
		</form>
	</section>

	<hr>
<?php } else { ?>
	<div class="container">
		<p>Pour commenter, vous devez vous connecter. <a href="?action=register">Vous inscrire</a> ou <a href="?action=login">Vous connecter</a></p>
	</div>
<?php }

$content = ob_get_clean();

require('views/includes/template.php'); ?>
