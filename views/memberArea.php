<?php $title = "Paramètres utilisateur";

$image = 'public/img/ueno_park.jpg';

ob_start();

include('includes/header-bg.php');

if (!empty($fields)) { ?>
	<p class="text-center"><?= $fields ?></p>
<?php } ?>

<p class="text-center">Ici vous pouvez modifier vos données personnelles.<br/>
Cliquez sur les onglets ci-dessous pour accéder aux formulaires.</p>

<div class="container">
	<ul class="nav nav-tabs list-inline">
		<li class="active list-inline-item"><a data-toggle="tab" href="#email">Adresse mail</a></li>
		<li class="list-inline-item"><a data-toggle="tab" href="#password">Mot de passe</a></li>
	</ul>
	<br/>

	<div class="tab-content">
		<section class="container tab-pane fade in active" id="email">
			<h4>Modifier votre adresse mail</h4>
			<form action="" method="post">
				<label>Adresse mail actuelle</label><br/>
				<input type="text" name="email" class="form-control" value="<?= $stockedEmail ?>" required/><br/>
				<label>Nouvelle adresse mail</label><br/>
				<input type="text" name="new-email" class="form-control" required/><br/>
				<label>Confirmer nouvelle adresse mail</label><br/>
				<input type="text" name="confirm-new-email" class="form-control" required/><br/>
				<button type="submit" name="submit-new-email" class="btn btn-primary">Valider</button>
			</form>
		</section>

		<section class="container tab-pane fade" id="password">
			<h4>Modifier votre mot de passe</h4>
			<form action="" method="post">
				<label>Mot de passe actuel</label><br/>
				<input type="password" name="password" class="form-control" required/><br/>
				<label>Nouveaux mot de passe</label><br/>
				<input type="password" name="new-password" class="form-control" required/><br/>
				<label>Confirmer nouveau mot de passe</label><br/>
				<input type="password" name="confirm-new-password" class="form-control" required/><br/>
				<button type="submit" name="submit-new-password" class="btn btn-primary">Valider</button>
			</form>
		</section>
	</div>
</div>

<?php $content = ob_get_clean();

require('includes/template.php');
