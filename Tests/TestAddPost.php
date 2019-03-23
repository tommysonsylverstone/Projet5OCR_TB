<?php

require_once('post.php');

$post = new Post();

$post->setAuthorId(1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test post</title>
</head>
<body>
	<form action="Projet5OCR_TB/PostManager.php" method="post">
		<label for="title">Titre du billet :</label>	<input type="text" name="title" id="title" />
		<label for="chapo">Chapo du billet :</label>	<input type="text" name="chapo" id="chapo" />
		<label for="content">Votre billet :</label>		<textarea name="content" id="content"></textarea>
	</form>
	<input type="submit" name="submit" value="Valider" />

	<?php
		function post() {
			$postManager = new PostManager();
			$post = $postManager->getAuthorId(1);
		}
?>
		<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <?= htmlspecialchars($post['chapo']) ?>
        <em>le <?= $post['postDate_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>
	?>
</body>
</html>