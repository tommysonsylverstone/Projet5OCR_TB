<?php $title = 'Accueil';

ob_start(); ?>

<header class="masthead" style="background-image: url('public/img/temple_jp.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Bienvenue sur mon blog !</h1>
					<span class="subheading">Mon blog de présentation</span>
				</div>
			</div>
		</div>
	</div>
</header>
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
