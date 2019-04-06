<?php $title = 'Liste des billets'; 

function chargeClass($class) {
	require '../models/'.$class.'.php';
}

spl_autoload_register('chargeClass');

ob_start();

include('includes/header.php');

$pManager = new PostManager();

$posts = $pManager->getPosts();

?>

<section>
	<?php 
	if (empty($posts)) {
		echo "Pas de billet inséré pour le moment, patience !";
	} else {
		while ($data = $posts->fetch()) {
		?>
			<div class="news">
				<h3>
					<?= htmlspecialchars($data['titleP']) ?>
					<em>le <?= $data['postDate_fr']?></em>

					<p>
						<?= nl2br(htmlspecialchars($data['content'])) ?>
						<br />
						<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Accéder aux commentaires</a></em>
					</p>
				</h3>
			</div>
			<?php
		}
	}
	?>
</section>

<?php include('includes/footer.php') ?>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>
