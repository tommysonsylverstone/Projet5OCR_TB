<?php 

include_once('includes/autoloader.php');

$valid = new CommentManager();
$valid->validateComment($_GET['id'], TRUE);

header("location: commentApprovalView.php");
