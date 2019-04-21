<?php

include_once('views/includes/autoloader.php');
include_once('models/User.php');
session_start();

function addComment() {
	$postC = $_POST['comment-content'] ?? '';
	$postId = $_GET['id'];
	if (empty($postC)) {
		echo "Désolé, un problème s'est passé.<br/>";
		echo '<a href="?action=post&id='.$postId.'">Revenir au billet</a>';
	} else {
		$comment = new Comment($postId, $_SESSION['username'], $postC);
		$cManager = new CommentManager();
		$cManager->addComment($comment);

		header("location: ?action=post&id=".$postId);
		exit();
	}
}	

function addPost() {
	$username = $_SESSION['username'];
	$titleP = $_POST['titleP'] ?? '';
	$chapo = $_POST['chapo'] ?? '';
	$content = $_POST['content'] ?? '';
	if (empty($username)) {
		echo "Vous n'avez pas accès à cette page";
	} elseif (empty($titleP) || empty($chapo) || empty($content)) {	
		echo "Veuillez remplir tous les champs";
	} else {
		$post = new Post($titleP, $chapo, $content, $username);
		$pManager = new PostManager();
		$pManager->addPost($post);

		header("location: ?action=postsList");
	}
	require('views/addPostView.php');
}

function addPostView() {
	require('views/addPostView.php');
}

function administration() {
	require('views/adminView.php');
}

function unapprovedList() {
	$comments = new CommentManager();
	$invalidComm = $comments->getCommentsForAdmin(); 

	new UserManager();
	$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
	require('views/commentApprovalView.php');
}

function commentValidated() {
	new UserManager();
	$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
	require('views/commentValidated.php');
}

function deletePost() {
	new UserManager();
	$user = UserManager::getUser($_SESSION['username'] ?? empty($_SESSION['username']));
	if ($user['type'] == 'admin' && !empty($_SESSION['username'])) {
		$pManager = new PostManager();
		$pManager->deletePost($_GET['id']);

		header("location: ?action=postsList");
	}
	require('views/deletePostView.php');
}

function editPost() {
	require('views/editPostView.php');
}

function postsList() {
	$pManager = new PostManager();
	$posts = $pManager->getPosts();
	$pNumber = $pManager->count();

	require('views/listPostsView.php');
}

function login() {
	$username = $_POST['username'] ?? '';
	$password = $_POST['pwd'] ?? '';
	if (isset($_POST['submit-button'])) {
		$uManager = new UserManager();
		$uManager->login($username, $password);	
	} 
	require('views/login.php');
}

function loginSuccess() {
	require('views/loginSuccess.php');
}

function logout() {
	require('views/logout.php');
}

function mainPage() {
	require('views/mainPageView.php');
}

function post() {
	$pManager = new PostManager();
	$post = $pManager->getPost($_GET['id']);
	$title = $post['titleP'];
	$cManager = new CommentManager();
	$comments = $cManager->getCommentsForPost($_GET['id']);
	$comNumbers = $cManager->count();
	require('views/postView.php');
}

function registerSuccess() {
	require('views/registerSuccess.php');
}

function register() {
	$username = $_POST['username'] ?? '';
	$email = $_POST['email'] ?? '';
	$passone = $_POST['pass1'] ?? '';
	$passtwo = $_POST['pass2'] ?? '';

	if (isset($_POST['register-button'])) {
		new UserManager();	
		if (empty($username) || empty($email) || empty($passone) || empty($passtwo)) {
			echo "Veuillez renseigner tous les champs";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "L'adresse mail est invalide";
		} elseif (UserManager::userExists($username)) {
			echo "Ce nom d'utilisateur est déjà pris";
		} elseif (UserManager::emailExists($email)) {
			echo "Cette adresse mail est déjà utilisée";
		} elseif (!preg_match("#^[a-zA-Z0-9_-]{3,20}$#", $username)) {
			echo "Le nom d'utilisateur fait plus de 20 caractères ou ne respecte pas les normes";
		} elseif (!preg_match("#^[a-zA-Z0-9]{10,}$#", $passone)) {
			echo "Le mot de passe doit faire plus de 10 caractères";
		} elseif ($passone !== $passtwo) {
			echo "Les deux mots de passe ne correspondent pas"; 
		} else {
			$user = new Member();
			$user->setUsername($username);
			$user->setPassword($passone);
			$user->setEmail($email);
			UserManager::register($user);

			header("location: ?action=registerSuccess&registration=success");
		}
	}
	require('views/registerView.php');
}
