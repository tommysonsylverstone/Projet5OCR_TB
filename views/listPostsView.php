<?php $title = 'Liste des billets';

include_once('includes/autoloader.php');

session_start();

ob_start();

include('includes/header.php');

$pManager = new PostManager();
$posts = $pManager->getPosts();
$pNumber = $pManager->count();
?>

<section>
	<?php 
	if ($pNumber == 0) {
		echo "Pas de billets pour le moment, patience !";
		} else {
		while ($data = $posts->fetch()) {
		?>
			<div class="news">
				<h3>
					<?= htmlspecialchars($data['titleP']) ?>
					<em>le <?= $data['postDate_fr']?></em> par <?= $data['authorName']?> <?php if (isset($data['lastUpdated_fr'])) { echo "<em>édité le " . $data['lastUpdated_fr'] . "</em>"; }?><br/>
						<h4><em><?= $data['chapo'] ?></em></h4>
					<p>
						<?= nl2br(htmlspecialchars($data['content'])) ?>
						<br />
						<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Accéder aux commentaires</a></em>
						<a href="deletePostView.php?id=<?= $data['id'] ?>">Supprimer ce post</a>
						<a href="editPostView.php?id=<?= $data['id'] ?>">éditer</a>
					</p>
				</h3>
			</div>
			<?php
		}
	}
	?>
</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
