<?php $title = 'Suppression de billet';

include_once('views/includes/autoloader.php');

session_start();

ob_start();

new UserManager();
$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
if ($user['type'] == 'admin' && !empty($_SESSION['username'])) {
	$pManager = new PostManager();
	$pManager->deletePost($_GET['id']);

	header("location: ?action=postsList");
} else { ?>
	<p>Vous n'avez pas accès à cette page<br/>
	<a href="index.php">Retour à l'accueil</a></p>
<?php }

$content = ob_get_clean();

require('views/includes/template.php');
