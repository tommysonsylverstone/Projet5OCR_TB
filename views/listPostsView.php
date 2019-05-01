<?php $title = 'Liste des billets';

ob_start(); ?>

<section>
	<?php if ($pNumber == 0) {
		echo "Pas de billets pour le moment, patience !";
	} else {
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
						if ($user->getType() == 'admin') { ?>
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
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
