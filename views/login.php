<?php $title = "Connexion";

ob_start(); 

if (empty(isset($_SESSION['username']))) { ?>
	<div class="login-form">
		<div class ="login-input">
			<form action="" method="post">
				<label for="username">Pseudonyme :</label><br/>
				<input type="text" name="username" placeholder="Pseudonyme" value="<?php $username ?>" /><br/>
				<label for="password">Mot de passe :</label><br/>
				<input type="password" name="pwd" placeholder="Mot de passe" /><br/>
				<button type="submit" name="submit-button">Se connecter</button>
			</form>
		</div>
	</div>
<?php } else {
	echo "Bonjour " . $_SESSION['username'] . " !";
	?> <br/>
	<a href="index.php">Retour à l'accueil</a> <br />
	<a href="?action=logout">Se déconnecter.</a>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
