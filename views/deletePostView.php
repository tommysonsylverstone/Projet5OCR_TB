<?php $title = 'Suppression de billet';

ob_start(); ?>

<p>Vous n'avez pas accès à cette page<br/>
<a href="index.php">Retour à l'accueil</a></p>

<?php $content = ob_get_clean();

require('views/includes/template.php');
