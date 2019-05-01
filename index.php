<?php

require('controller/frontend.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'addComment':
				if (isset($_POST['confirm-comment'])) {
					addComment();
				}
				break;

			case 'addPost':
				if (isset($_POST['confirm-button'])) {
					addPost();
				}
				break;

			case 'addPostView':
				addPostView();
				break;

			case 'administration':
				administration();
				break;

			case 'unapprovedList':
				unapprovedList();
				break;

			case 'commentValidated':
				commentValidated();
				break;

			case 'contact':
				contact();
				break;

			case 'deletePost':
				deletePost();
				break;
			
			case 'editPost':
				editPost();
				break;

			case 'postsList':
				postsList();
				break;

			case 'login':
				login();
				break;

			case 'loginSuccess':
				loginSuccess();
				break;

			case 'logout':
				logout();
				break;

			case 'mainPage':
				mainPage();
				break;

			case 'post':
				post();
				break;

			case 'registerSuccess':
				registerSuccess();
				break;

			case 'register':
				register();
				break;

			default:
				mainPage();
				break;
		}
	}
	else {
		mainPage();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}
