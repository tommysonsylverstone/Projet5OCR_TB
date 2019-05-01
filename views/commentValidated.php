<?php $title = "Refus d'accès";

ob_start();

if ($user->getType() !== 'admin') {
	header('location: index.php');
} else {
	$valid = new CommentManager();
	$valid->validateComment($_GET['id'], TRUE);
	header("location: ?action=unapprovedList");
}

$content = ob_get_clean();

include('views/includes/template.php');
