<?php $title = "Inscription";

include_once('views/includes/autoloader.php');
include_once('models/user.php');

ob_start(); ?>

<div class="register-form">
	<div class="register-input">
		<form method="post" action="">
			<label for="username">Nom d'utilisateur :</label><br/>
			<input type="text" name="username" id="username" placeholder="Nom d'utilisateur" value="<?php $username ?>" /><br/>
			<label for="email">Adresse e-mail :</label><br/>
			<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="<?php $email ?>"/><br/>
			<label for="pass1">Mot de passe :</label><br/>
			<input type="password" name="pass1" id="pass1" placeholder="Mot de passe" /><br/>
			<label for="pass2">Confirmer mot de passe :</label><br/>
			<input type="password" name="pass2" id="pass2" placeholder="Confirmer le mot de passe" /><br/>
			<button name="register-button">Confirmer</button>
		</form>
	</div>
</div>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
