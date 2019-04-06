<?php

function chargeClass($class) {
	require '../models/'.$class.'.php';
}

spl_autoload_register('chargeClass');

session_start();

$title = "Edition de " . $_POST['titleP'];

ob_start();

$content = ob_get_clean();

require('includes/template.php'); ?>
