<?php

if (isset($_SESSION['username'])) {
	$uManager = new UserManager();
	$userData = $uManager->getUser($_SESSION['username']);
} ?>

<footer>
	<ul>
		<li><a href="index.php?action=contact">Me contacter</a></li>
		<li><a href="https://www.github.com/tommysonsylverstone/">Github</a></li>
		<li><a href="https://www.linkedin.com/in/benjamin-tenreiro-1563a2173/">LinkedIn</a></li>
		<?php
		if (isset($_SESSION['username'])) {
			if ($userData['type'] == 'admin') {
				?>
				<li><a href="adminView.php">Page d'administration</a></li>
				<?php
			} 
		} ?>
	</ul>
</footer>
