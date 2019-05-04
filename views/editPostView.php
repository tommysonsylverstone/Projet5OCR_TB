<?php $title = 'Edition de post';

$image = 'public/img/turtles.jpg';

ob_start();

include('includes/header-bg.php'); ?>

<div class="container">
	<p>Voici le billet que vous voulez modifier :</p>
	<h3><?= $postId->getTitle() ?> écrit par <em><?= $postId->getAuthorName() ?></em></h3><br/>
	<?= $postId->getChapo() ?><br/>
	<p><?= $postId->getEscapedContent() ?></p>
</div>

<section class="container">
	<form method="post" action="">
		<label for="authorName">Nom : </label><br/>
		<input type="text" class="form-control" name="authorName" placeholder="Auteur" value="<?= $postId->getAuthorName() ?>" /><br/>
		<label for="titleP">Titre : </label><br/>
		<input type="text" class="form-control" name="titleP" placeholder="Titre" value="<?= $postId->getTitle() ?>" /><br/>
		<label for="chapo">Chapo : </label>
		<input type="text" class="form-control" name="chapo" placeholder="Chapo" value="<?= $postId->getChapo() ?>"/><br/>
		<label for="content">Contenu du billet : </label>
		<textarea name="content" placeholder="Contenu du billet" rows="5" class="form-control"><?=  $postId->getContent() ?></textarea><br/>
		<button type="submit" class="btn btn-primary" name="confirm-edit">Confirmer</button>
	</form>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
