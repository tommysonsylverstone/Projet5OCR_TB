<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="index.php">Ben's Blog</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?action=postsList">Billets</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?action=contact">Contact</a>
				</li>
				<?php if (empty(isset($_SESSION['username'])) && empty($_SESSION['username'])) { ?>
					<li class="nav-item"><a href="?action=login">Se connecter</a></li>
					<li class="nav-item"><a href="?action=register">S'inscrire</a></li>
				<?php } else { ?>
					<li class="nav-item"><a class="nav-link" href="?action=userParameter">Mon espace</a></li>
					<li class="nav-item"><a href="?action=logout">Se déconnecter</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
