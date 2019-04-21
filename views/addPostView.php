<?php $title = 'Ajout de billet';

include_once('views/includes/autoloader.php');

ob_start(); ?>

<form method="post" action="?action=addPost">
	<input type="text" name="titleP" placeholder="Titre" /> <br/>
	<input type="text" name="chapo" placeholder="Chapo" /> <br/>
	<textarea name="content" placeholder="Ecrivez votre billet"></textarea> <br/>
	<button type="submit" name="confirm-button">Confirmer</button>
</form>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
