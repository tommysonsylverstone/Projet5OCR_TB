<?php $title = 'Commentaires en attente';

include_once('views/includes/autoloader.php');

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
		<?php while ($comment = $invalidComm->fetch()) { ?>
			<tr>
				<td><?= $comment['authorName'] ?></td>
				<td><?= $comment['postId'] ?></td>
				<td><?= nl2br(htmlspecialchars($comment['content'])) ?></td>
				<td><a href="?action=commentValidated&amp;id=<?= $comment['id'] ?>">Valider</a></td>
			</tr>
		<?php } 
	} else {
		echo "Vous n'avez pas accès à cette page";
	} ?>
</table>
<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
