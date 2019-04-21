<?php

include_once('views/includes/autoloader.php');

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
	require('views/deletePostView.php');
}

function editPost() {
	require('views/editPostView.php');
}

function postsList() {
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
	require('views/postView.php');
}

function registerSuccess() {
	require('views/registerSuccess.php');
}

function register() {
	require('views/registerView.php');
}
