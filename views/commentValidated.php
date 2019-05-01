<?php $title = "Refus d'accès";

ob_start();

$valid = new CommentManager();
$valid->validateComment($_GET['id'], TRUE);
header("location: ?action=unapprovedList");

$content = ob_get_clean();

include('views/includes/template.php');
