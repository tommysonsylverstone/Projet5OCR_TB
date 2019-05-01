<?php $title = 'Ajout de billet';

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/ueno_park.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="container">
	<form method="post" action="?action=addPost">
		<input type="text" class="form-control" name="titleP" placeholder="Titre" /> <br/>
		<input type="text" class="form-control" name="chapo" placeholder="Chapo" /> <br/>
		<textarea name="content" rows="5" class="form-control" placeholder="Ecrivez votre billet"></textarea> <br/>
		<button type="submit" class="btn btn-primary" name="confirm-button">Confirmer</button>
	</form>
</section>

<?php $content = ob_get_clean();

require('views/includes/template.php'); ?>
