<header>
	<a href="mainPageView.php">Retour à l'accueil</a>
	<ul>
		<li><a href="index.php" class="">Accueil</a></li>
		<li><a href="index.php?action=listPosts" class="">Billets</a></li>
		<li><a href="index.php?action=contact" class="">Contact</a></li>
		<li>
			<?php
			if (empty(isset($_SESSION['username'])) && empty($_SESSION['username'])) {
				?>
				<a href="login.php">Se connecter</a>
				<?php
			} else {
				?>
				<a href="logout.php">Se déconnecter</a>
			<?php } ?>
		</li>
	</ul>
</header>