<?php $title = 'Liste des billets';

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/montagne_rv.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<?php if (empty($posts)) { ?>
		<p class="text-center">Pas de billets pour le moment, patience !</p>
	<?php } else { 
		foreach ($posts as $post) { ?>
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="post-preview">
						<a href="?action=post&amp;id=<?= $post->getId() ?>" title="Accéder au billet">
							<h2 class="post-title">
								<?= $post->getTitle() ?>
							</h2><br/>
							<h3 class="post-subtitle"><?= $post->getChapo() ?></h3><br/>
						</a>
						écrit le <?= $post->getFormattedDate() ?> par <?= $post->getAuthorName() ?><br/>
						<?php if (empty($post->getLastUpdated())) {
							echo '';
						} else {
							echo "<em>édité le " . $post->getFormattedLastUpdated() . "</em>";
						}
						if ($user->isAdmin()) { ?>
							<ul class="list-inline">
								<li class="list-inline-item"><a href="?action=deletePost&amp;id=<?= $post->getId() ?>">Supprimer ce post</a></li>
								<li class="list-inline-item"><a href="?action=editPost&amp;id=<?= $post->getId() ?>">éditer</a></li>
							</ul>
						<?php } ?>
					</div>
					<hr>
				</div>
			</div>
		<?php }
	} ?>
</div>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
