<?php $title = 'Liste des billets';

include_once('includes/autoloader.php');

session_start();

ob_start();

$pManager = new PostManager();
$posts = $pManager->getPosts();
$pNumber = $pManager->count(); ?>

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
						} new UserManager();
						$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
						if ($user['type'] == 'admin' && !empty($_SESSION['username'])) { ?>
							<a href="deletePostView.php?id=<?= $post->getId() ?>">Supprimer ce post</a>
							<a href="editPostView.php?id=<?= $post->getId() ?>">éditer</a>
						<?php } ?>
					</div>
					<hr>
				</div>
			</div>
		<?php }
	} ?>
</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
