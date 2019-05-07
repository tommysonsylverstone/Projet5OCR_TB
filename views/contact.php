<?php $title = 'Contact';

ob_start(); ?> 

<header class="masthead" style="background-image: url('public/img/temple2.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>Contactez Moi</h1>
					<span class="subheading">Des questions ? N'hésitez pas !</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<form name="sentMessage" id="contactForm">
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Please enter your name.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Email Address</label>
						<input type="email" class="form-control" placeholder="Adresse mail" id="email" required data-validation-required-message="Please enter your email address.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Message</label>
						<textarea rows="5" class="form-control" placeholder="Corps du message" id="message" required data-validation-required-message="Please enter a message."></textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br>
				<div id="success"></div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<?php $content = ob_get_clean();

require('includes/template.php'); ?>
