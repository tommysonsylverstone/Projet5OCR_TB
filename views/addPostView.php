<?php $title = 'Ajout de billet';

include_once('views/includes/autoloader.php');

session_start();

$username = $_SESSION['username'];
$titleP = $_POST['titleP'] ?? '';
$chapo = $_POST['chapo'] ?? '';
$content = $_POST['content'] ?? '';

if (isset($_POST['confirm-button'])) {
	if (empty($username)) {
		echo "Vous n'avez pas accès à cette page";
	} elseif (empty($titleP) || empty($chapo) || empty($content)) {	
		echo "Veuillez remplir tous les champs";
	} else {
		$post = new Post($titleP, $chapo, $content, $username);
		$pManager = new PostManager();
		$pManager->addPost($post);

		header("location: ?action=listPostsView");
	}
}

ob_start(); ?>

<form method="post" action="">
	<input type="text" name="titleP" placeholder="Titre" /> <br/>
	<input type="text" name="chapo" placeholder="Chapo" /> <br/>
	<textarea name="content" placeholder="Ecrivez votre billet"></textarea> <br/>
	<button type="submit" name="confirm-button">Confirmer</button>
</form>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
