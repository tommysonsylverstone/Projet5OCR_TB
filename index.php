<?php

require('autoloader/autoloader.php');
Autoloader::register();

require('controller/frontend.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'addComment':
				if (isset($_POST['confirm-comment'])) {
					Controller::addComment();
				}
				break;

			case 'addPost':
				if (isset($_POST['confirm-button'])) {
					Controller::addPost();
				}
				break;

			case 'addPostView':
				Controller::addPostView();
				break;

			case 'administration':
				Controller::administration();
				break;

			case 'unapprovedList':
				Controller::unapprovedList();
				break;

			case 'commentValidated':
				Controller::commentValidated();
				break;

			case 'contact':
				Controller::contact();
				break;

			case 'deletePost':
				Controller::deletePost();
				break;
			
			case 'editPost':
				Controller::editPost();
				break;

			case 'postsList':
				Controller::postsList();
				break;

			case 'login':
				Controller::login();
				break;

			case 'loginSuccess':
				Controller::loginSuccess();
				break;

			case 'logout':
				Controller::logout();
				break;

			case 'mainPage':
				Controller::mainPage();
				break;

			case 'userParameter':
				Controller::memberArea();
				break;

			case 'post':
				Controller::post();
				break;

			case 'registerSuccess':
				Controller::registerSuccess();
				break;

			case 'register':
				Controller::register();
				break;

			default:
				Controller::mainPage();
				break;
		}
	}
	else {
		Controller::mainPage();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}
