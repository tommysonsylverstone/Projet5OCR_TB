<footer class="container-fluid">
	<ul>
		<li><a href="index.php?action=contact">Me contacter</a></li>
		<li><a href="https://www.github.com/tommysonsylverstone/">Github</a></li>
		<li><a href="https://www.linkedin.com/in/benjamin-tenreiro-1563a2173/">LinkedIn</a></li>
		<?php if ($user->getType() == 'admin') { ?>
			<li><a href="?action=administration">Page d'administration</a></li>
		<?php } ?>
	</ul>
</footer>
