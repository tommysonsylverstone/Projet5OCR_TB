<?php $title = 'Suppression de billet';

include_once('views/includes/autoloader.php');

ob_start(); ?>

<p>Vous n'avez pas accès à cette page<br/>
<a href="index.php">Retour à l'accueil</a></p>

<?php $content = ob_get_clean();

require('views/includes/template.php');
