<?php $title = "Connexion";

include_once('includes/autoloader.php');

session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['pwd'] ?? '';

if (isset($_POST['submit-button'])) {
	$uManager = new UserManager();
	$uManager->login($username, $password);
} 

ob_start(); 

	if (empty(isset($_SESSION['username']))) { ?>
		<form action="login.php" method="post">
			<input type="text" name="username" placeholder="Pseudonyme" value="<?php $username ?>" /><br/>
			<input type="password" name="pwd" placeholder="Mot de passe" /><br/>
			<button type="submit" name="submit-button">Se connecter</button>
		</form>
		<?php } else {
		echo "Bonjour " . $_SESSION['username'] . " !";
		?> <br/>
		<a href="mainPageView.php">Retour à l'accueil</a> <br />
		<a href="logout.php">Se déconnecter.</a>
		<?php } 

$content = ob_get_clean();

require('includes/template.php'); ?>
