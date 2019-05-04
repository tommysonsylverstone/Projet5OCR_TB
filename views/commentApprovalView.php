<?php $title = 'Commentaires en attente';

$image = 'public/img/tengu.jpg';

ob_start();

include('includes/header-bg.php'); ?>

<section class="container">
	<table border="1">
		<thead>
			<tr>
				<th class="text-center">Pseudonyme</th>
				<th class="text-center">id du post</th>
				<th class="text-center">Commentaire</th>
				<th class="text-center">Valider ?</th>
			</tr>
		</thead>
		<?php foreach ($invalidComm as $comment) { ?>
			<tr>
				<td><?= $comment->getAuthorName() ?></td>
				<td><?= $comment->getPostId() ?></td>
				<td><?= $comment->getEscapedContent() ?></td>
				<td><a class="btn btn-primary" href="?action=commentValidated&amp;id=<?= $comment->getId() ?>">Valider</a></td>
			</tr>
		<?php } ?> 
	</table>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
