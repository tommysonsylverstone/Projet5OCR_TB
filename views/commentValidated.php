<?php $title = "Refus d'accès";

include_once('views/includes/autoloader.php');

session_start();

ob_start();

new UserManager();
$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));

if ($user['type'] == 'admin' && !empty($_SESSION['username'])) {
	$valid = new CommentManager();
	$valid->validateComment($_GET['id'], TRUE);
	header("location: ?action=commentApprovalView");
} else { ?>
	<p>Vous n'avez pas accès à cette page</p>
<?php }

$content = ob_get_clean();

include('views/includes/template.php');
