<?php $title = 'Edition de post';

ob_start(); ?>

<p>Voici le billet que vous voulez modifier :</p>

<div>
	<h3><?= htmlspecialchars($postId['titleP']) ?> écrit par <em><?= $postId['authorName'] ?></em></h3><br/>
	<?= htmlspecialchars($postId['chapo']) ?><br/>
	<p><?= nl2br(htmlspecialchars($postId['content'])) ?></p>
</div>

<section>
	<form method="post" action="">
		<input type="text" name="authorName" placeholder="Auteur" value="<?= $postId['authorName'] ?>" /><br/>
		<input type="text" name="titleP" placeholder="Titre" value="<?= $postId['titleP'] ?>" /><br/>
		<input type="text" name="chapo" placeholder="Chapo" value="<?= $postId['chapo'] ?>"/><br/>
		<textarea name="content" placeholder="Contenu du billet"><?=  $postId['content'] ?></textarea><br/>
		<button name="confirm-edit">Confirmer</button>
	</form>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
