<?php $title = 'Liste des billets'; ?>

<?php ob_start(); ?>

<?php include('includes/header.php') ?>

<section>
	<?php 
	if (empty($posts)) {
		echo "Pas de billet inséré pour le moment, patience !";
	} else {
		while ($data = $posts->fetch()) {
		?>
			<div class="news">
				<h3>
					<?= htmlspecialchars($data['title']) ?>
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
