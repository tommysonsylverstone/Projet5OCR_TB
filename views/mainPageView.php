<?php $title = 'Accueil';

ob_start(); ?>

<section class="container">
	<article class="row">
		<h1>Benjamin Tenreiro, le développeur qu'il vous faut !</h1>
		<p>Je m'appelle Tenreiro Benjamin, j'ai 27 ans et j'étudie en ce moment le langage PHP avec la formation Développeur d'application - PHP / Symfony disponible sur <a href="https://openclassrooms.com/">Openclassrooms</a>.<br/>
		Ce blog a été entièrement réalisé par mes soins, à l'exception de quelques fichiers (notamment JS et CSS).<br/>
		Le thème utilisé est <a href="https://startbootstrap.com/themes/clean-blog/">Clean Blog</a>, disponible sur le site de <a href="https://startbootstrap.com/">Startbootstrap</a>.</p>
	</article>
	<img alt="Tenreiro Benjamin entouré de ses 1001 oiseaux" src="public/img/luimeme.jpg" height="500px" />
	<article class="row">
		<p>Pour voir mon parcours professionnel jusqu'à maintenant, cliquez <a href="public/file/CV-TENREIROBENJAMIN.pdf">ici</a>.</p>
	</article>
</section>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
