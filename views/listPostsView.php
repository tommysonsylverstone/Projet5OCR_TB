<?php $title = 'Liste des billets';

include_once('views/includes/autoloader.php');

session_start();

ob_start();

$pManager = new PostManager();
$posts = $pManager->getPosts();
$pNumber = $pManager->count(); ?>

<section>
	<?php
	if ($pNumber == 0) {
		echo "Pas de billets pour le moment, patience !";
	} else {
		while ($data = $posts->fetch()) { 
			$date = date_create($data['postDate']); 
			$pDate = date_format($date, 'd/m/Y à H:i:s'); ?>
			<div class="news">
				<h3>
					<?= htmlspecialchars($data['titleP']) ?>
					<em>le <?= $pDate ?></em> par <?= $data['authorName']?>
					<?php if (empty($data['lastUpdated'])) {
						echo '';
					} else {
						$lastUp = date_create($data['lastUpdated']);
						$upDate = date_format($lastUp, 'd/m/Y à H:i:s');
						echo "<em>édité le " . $upDate . "</em>";
					} ?><br/>
					<h4><em><?= $data['chapo'] ?></em></h4>
					<p>
						<em><a href="?action=post&amp;id=<?= $data['id'] ?>">Accéder au billet</a></em>
						<?php new UserManager();
						$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
						if ($user['type'] == 'admin' && !empty($_SESSION['username'])) { ?>
							<a href="?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer ce post</a>
							<a href="?action=editPost&amp;id=<?= $data['id'] ?>">éditer</a>
						<?php } ?>
					</p>
				</h3>
			</div>
		<?php }
	} ?>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
