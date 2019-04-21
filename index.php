<?php
require('controller/frontend.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'addPostView':
			addPostView();
			break;

			case 'adminView':
			adminView();
			break;

			case 'commentApprovalView':
			commentApprovalView();
			break;

			case 'commentValidated':
			commentValidated();
			break;

			case 'deletePostView':
			deletePostView();
			break;
			
			case 'editPostView':
			editPostView();
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

			case 'mainPageView':
			mainPageView();
			break;

			case 'postView':
			postView();
			break;

			case 'registerSuccess':
			registerSuccess();
			break;

			case 'registerView':
			registerView();
			break;

			default:

			break;
		}
	}
	else {
		mainPageView();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}