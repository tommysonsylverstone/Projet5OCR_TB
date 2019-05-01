<?php $title = 'Commentaires en attente';

include_once('includes/autoloader.php');

session_start();

ob_start(); 

$comments = new CommentManager();
$invalidComm = $comments->getCommentsForAdmin(); 

new UserManager();
$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));

if ($user['type'] == 'admin' && !empty($_SESSION['username'])) { ?>
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
				<td><a href="commentValidated.php?id=<?= $comment->getId() ?>">Valider</a></td>
			</tr>
		<?php } 
	} else {
		header('location: index.php');
	} ?>
</table>
<?php $content = ob_get_clean();

require('includes/template.php'); ?>
