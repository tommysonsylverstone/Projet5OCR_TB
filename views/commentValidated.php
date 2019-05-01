<?php $title = "Refus d'accès";

ob_start();

if ($user->getType() == 'admin') {
	$valid = new CommentManager();
	$valid->validateComment($_GET['id'], TRUE);
	header("location: ?action=unapprovedList");
} else {
	header('location: index.php');
}

$content = ob_get_clean();

include('views/includes/template.php');
