<?php 

session_start();
include_once('../models/UserManager.php');

if (isset($_POST['submit-button'])) {
	$username = $_POST['username'];
	$password = $_POST['pwd'];

	$uManager = new UserManager();
	$uManager->login($username, $password);
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Page de connexion</title>
</head>
<body>
	<?php
	if (empty(isset($_SESSION['username']))) {
		include('includes/header.php');
		?>
		<form action="login.php" method="post">
			<input type="text" name="username" placeholder="Pseudonyme" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];} else {echo '';} ?>" /><br/>
			<input type="password" name="pwd" placeholder="Mot de passe" /><br/>
			<button type="submit" name="submit-button">Se connecter</button>
		</form>
		<?php } else {
			include('includes/header.php');
		echo "Bonjour " . $_SESSION['username'] . " !";
		?> <br/>
		<a href="mainPageView.php">Retour à l'accueil</a> <br />
		<a href="logout.php">Se déconnecter.</a>
		<?php } ?>
</body>
</html>
