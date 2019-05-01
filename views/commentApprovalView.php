<?php $title = 'Commentaires en attente';

ob_start(); ?>

<table border="1">
	<thead>
		<tr>
			<th>Pseudonyme</th>
			<th>id du post</th>
			<th>Commentaire</th>
			<th>Valider ?</th>
		</tr>
	</thead>
	<?php foreach ($invalidComm as $comment) { ?>
		<tr>
			<td><?= $comment->getAuthorName() ?></td>
			<td><?= $comment->getPostId() ?></td>
			<td><?= $comment->getEscapedContent() ?></td>
			<td><a href="?action=commentValidated&amp;id=<?= $comment->getId() ?>">Valider</a></td>
		</tr>
	<?php } ?>
</table>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
