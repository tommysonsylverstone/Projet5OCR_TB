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
				<form method="post" action="?action=commentValidated">
					<input type="text" class="text-center form-control" name="comment-id" value="<?= $comment->getId()?>" readonly hidden>
					<td><input type="text" class="text-center form-control" name="comment-authorname" value="<?= $comment->getAuthorName() ?>" readonly></td>
					<td><input type="text" class="text-center form-control" name="comment-postid" value="<?= $comment->getPostId() ?>" readonly></td>
					<td width="65%" class="text-center"><input type="text" class="text-center form-control" name="comment-content" value="<?= $comment->getEscapedContent() ?>" readonly></input></td>
					<td><button type="submit" class="btn btn-primary" name="confirm-comment">Valider</button></td>
				</form>
			</tr>
		<?php } ?> 
	</table>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
