<nav class="container-fluid">
	<ul>
		<li><a href="index.php" class="">Accueil</a></li>
		<li><a href="?action=postsList" class="">Billets</a></li>
		<li><a href="?action=contact" class="">Contact</a></li>
		<?php
		if (empty(isset($_SESSION['username'])) && empty($_SESSION['username'])) {
			?>
			<li><a href="?action=login">Se connecter</a></li>
			<li><a href="?action=register">S'inscrire</a></li>
		<?php } else { ?>
			<li><a href="?action=logout">Se déconnecter</a></li>
		<?php } ?>
	</ul>
</nav>
