<?php $title = "Paramètres utilisateur";

$image = 'public/img/ueno_park.jpg';

ob_start();

include('includes/header-bg.php');

$content = ob_get_clean();

require('includes/template.php');
