<!DOCTYPE html>
<html>
<head>
	<title>Test post</title>
</head>
<body>
	<form action="Projet5OCR_TB/PostManager.php" method="post">
		<label for="title">Titre du billet :</label>	<input type="text" name="title" id="title" />
		<label for="chapo">Chapo du billet :</label>	<input type="text" name="chapo" id="chapo" />
		<label for="content">Votre billet :</label>		<textarea name="content" id="content"></textarea>
	</form>
	<input type="submit" name="submit" value="Valider" />
	<?php
	?>
</body>
</html>