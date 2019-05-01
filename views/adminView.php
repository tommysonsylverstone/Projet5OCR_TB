<?php $title = 'Page d\'administration';

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/TBS.jpg')">
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

<h2 class="container text-center">Bienvenue <?= $_SESSION['username'] ?>!</h2>
<br><br>
<ul class="list-inline text-center">
	<li class="list-inline-item"><a href="?action=addPostView" class="Addpost">Ajouter un billet</a></li>
	<li class="list-inline-item"><a href="?action=unapprovedList">Voir la liste des commentaires non validés</a></li>
</ul>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
