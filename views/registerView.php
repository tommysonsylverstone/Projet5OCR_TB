<?php $title = "Inscription";

$image = 'public/img/road.jpg';

ob_start();

include('includes/header-bg.php');

if (isset($_SESSION['username'])) { ?>
	<div class="text-center"> 
		<h3>Vous êtes déjà connecté.</h3><br/>
		<a href="index.php">Retour à l'accueil</a> <br />
		<a href="?action=logout">Se déconnecter.</a>
	</div>
<?php } else { ?>
	<div class="container">
		<div class="register-input">
			<form method="post" action="">
				<label for="username">Nom d'utilisateur :</label><br/>
				<input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" value="<?php $username ?>" /><br/>
				<label for="email">Adresse e-mail :</label><br/>
				<input type="text" class="form-control" name="email" id="email" placeholder="Adresse e-mail" value="<?php $email ?>"/><br/>
				<label for="pass1">Mot de passe :</label><br/>
				<input type="password" class="form-control" name="pass1" id="pass1" placeholder="Mot de passe" /><br/>
				<label for="pass2">Confirmer mot de passe :</label><br/>
				<input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirmer le mot de passe" /><br/>
				<button name="register-button" class="btn btn-primary">Confirmer</button>
			</form>
		</div>
	</div>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
