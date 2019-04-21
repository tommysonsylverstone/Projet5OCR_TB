<?php $title = "Refus d'accès";

ob_start();

if ($user['type'] == 'admin' && !empty($_SESSION['username'])) {
	$valid = new CommentManager();
	$valid->validateComment($_GET['id'], TRUE);
	header("location: ?action=unapprovedList");
} else { ?>
	<p>Vous n'avez pas accès à cette page</p>
<?php }

$content = ob_get_clean();

include('views/includes/template.php');
