<?php $title = "Connexion";

$image = 'public/img/temple_jp.jpg';

ob_start(); 

include('includes/header-bg.php');

if (!empty($fields)) { ?>
	<p class="text-center"><?= $fields ?></p> 
<?php } ?>

<?php if (empty(isset($_SESSION['username']))) { ?>
	<div class="login-form container">
		<div class ="login-input">
			<form action="" method="post">
				<label for="username">Pseudonyme :</label><br/>
				<input type="text" class="form-control" name="username" placeholder="Pseudonyme" value="<?php $username ?>" autofocus/><br/>
				<label for="password">Mot de passe :</label><br/>
				<input type="password" class="form-control" name="pwd" placeholder="Mot de passe" /><br/>
				<button type="submit" name="submit-button" class="btn btn-primary">Se connecter</button>
			</form>
		</div>
	</div>
<?php } else { ?>
	<div class="text-center"> 
		<h3>Vous êtes déjà connecté.</h3><br/>
		<a href="index.php">Retour à l'accueil</a> <br />
		<a href="?action=logout">Se déconnecter.</a>
	</div>
<?php } 

$content = ob_get_clean();

require('views/includes/template.php'); ?>
