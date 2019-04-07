<header>
	<a href="mainPageView.php">Retour à l'accueil</a>
	<ul>
		<li><a href="index.php" class="">Accueil</a></li>
		<li><a href="../views/listPostsView.php" class="">Billets</a></li>
		<li><a href="index.php?action=contact" class="">Contact</a></li>
			<?php
			if (empty(isset($_SESSION['username'])) && empty($_SESSION['username'])) {
				?>
				<li><a href="login.php">Se connecter</a></li>
				<li><a href="registerView.php">S'inscrire</a></li>
				<?php
			} else {
				?>
				<li><a href="logout.php">Se déconnecter</a></li>
			<?php } ?>
	</ul>
</header>