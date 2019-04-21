<?php

include_once('views/includes/autoloader.php');

session_start();

function addComment() {
	$postC = $_POST['comment-content'] ?? '';

	if (isset($_POST['confirm-comment'])) {
		$comment = new Comment($_GET['id'], $_SESSION['username'], $postC);
		$cManager = new CommentManager();
		$cManager->addComment($comment);

		header("location: " . $_SERVER['REQUEST_URI']);
		exit();
	}
	require('views/postView.php');
}

function addPost() {
	require('views/addPostView.php');
}

function administration() {
	require('views/adminView.php');
}

function unapprovedList() {
	require('views/commentApprovalView.php');
}

function commentValidated() {
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
	require('views/registerView.php');
}
