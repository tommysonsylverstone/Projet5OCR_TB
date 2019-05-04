<?php $title = 'Ajout de billet';

$image = 'public/img/ueno_park.jpg';

ob_start(); 

include('includes/header-bg.php'); ?>

<section class="container">
	<form method="post" action="?action=addPost">
		<input type="text" class="form-control" name="titleP" placeholder="Titre" /> <br/>
		<input type="text" class="form-control" name="chapo" placeholder="Chapo" /> <br/>
		<textarea name="content" rows="5" class="form-control" placeholder="Ecrivez votre billet"></textarea> <br/>
		<button type="submit" class="btn btn-primary" name="confirm-button">Confirmer</button>
	</form>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
