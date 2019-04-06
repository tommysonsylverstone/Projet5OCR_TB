<?php $title = 'Suppression de billet'; 

function chargeClass($class) {
	require '../models/'.$class.'.php';
}

spl_autoload_register('chargeClass');

ob_start();

$post = new Post();
$post->setId($_GET['id']);
$pManager = new PostManager();
$deleteP = $pManager->deletePost($post);

header("location: listPostsView.php");

$content = ob_get_clean();

require('includes/template.php'); ?>
