<?php

include_once('views/includes/autoloader.php');

session_start();

class Controller {
	public static function addComment() {
		$postC = $_POST['comment-content'] ?? '';
		$postId = $_GET['id'];

		if (empty($postC)) {
			echo "Désolé, un problème s'est passé.<br/>";
			echo '<a href="?action=post&id='.$postId.'">Revenir au billet</a>';
		} else {
			$comment = new Comment($postId, $_SESSION['username'], $postC);

			$cManager = new CommentManager();
			$cManager->addComment($comment);

			header("location: ?action=post&id=$postId");
		}
	}	

	public static function addPost() {
		$user = UserManager::getCurrentUser();
		
		$username = $_SESSION['username'];
		$titleP = $_POST['titleP'] ?? '';
		$chapo = $_POST['chapo'] ?? '';
		$content = $_POST['content'] ?? '';

		if (!$user->isAdmin()) {
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

	public static function addPostView() {
		$user = UserManager::getCurrentUser();

		if (!$user->isAdmin()) {
			header("location: index.php");
		}

		require('views/addPostView.php');
	}

	public static function administration() {
		$user = UserManager::getCurrentUser();

		if (!$user->isAdmin()) {
			header("location: index.php");
		}

		require('views/adminView.php');
	}

	public static function contact() {
		require('views/contact.php');
	}

	public static function unapprovedList() {
		$comments = new CommentManager();
		$invalidComm = $comments->getCommentsForAdmin();

		$user = UserManager::getCurrentUser();

		if (!$user->isAdmin()) {
			header("location: index.php");
		}

		require('views/commentApprovalView.php');
	}

	public static function commentValidated() {
		$user = UserManager::getCurrentUser();

		if (!$user->isAdmin()) {
			header("location: index.php");
		} else {
			if (isset($_POST['confirm-comment'])) {
				$commentPostId = $_POST['comment-postid'];
				$commentName = $_POST['comment-authorname'];
				$commentContent = $_POST['comment-content'];
				$commentId = $_POST['comment-id'];

				$comment = new Comment($commentPostId, $commentName, $commentContent);
				$comment->setValidated(TRUE);
				$comment->setId($commentId);
				
				$valid = new CommentManager();
				$valid->validateComment($comment);

				header("location: ?action=unapprovedList");
			}
		}

	}

	public static function deletePost() {
		$user = UserManager::getCurrentUser();

		$postId = $_GET['id'];

		if ($user->isAdmin()) {
			$pManager = new PostManager();
			$pManager->deletePost($postId);

			header("location: ?action=postsList");
		} else {
			header("location: index.php");
		}

		require('views/deletePostView.php');
	}

	public static function editPost() {
		$authorName = $_POST['authorName'] ?? '';
		$titleP = $_POST['titleP'] ?? '';
		$chapo = $_POST['chapo'] ?? '';
		$content = $_POST['content'] ?? '';
		$postGetId = $_GET['id'];

		$user = UserManager::getCurrentUser();

		if (empty($postGetId) || !$user->isAdmin()) {
			header("location: index.php");
		}

		$pManager = new PostManager();
		$postId = $pManager->getPost($postGetId);

		if (isset($_POST['confirm-edit'])) {
			if (empty($authorName) || empty($titleP) || empty($chapo) || empty($content)) {
				echo "Veuillez remplir tous les champs";
			} else {
				$post = new Post($titleP, $chapo, $content, $authorName);
				$post->setId($postGetId);

				$pManager = new PostManager();
				$pManager->updatePost($post);

				header("location: ?action=post&id=$postGetId");
			}
		}

		require('views/editPostView.php');
	}

	public static function postsList() {
		$user = UserManager::getCurrentUser();

		$pManager = new PostManager();
		$posts = $pManager->getPosts();

		require('views/listPostsView.php');
	}

	public static function login() {
		$username = $_POST['username'] ?? '';
		$password = $_POST['pwd'] ?? '';

		if (isset($_POST['submit-button'])) {
			if (empty($username) || empty($password)) {
				$fields = "Veuillez remplir tous les champs";
			} else {
				$uManager = new UserManager();
				$userGet = $uManager->login($username, $password);
				if ($userGet === null) {
					$fields = "Nom d'utilisateur ou mot de passe incorrect";
				} else {
					$_SESSION['username'] = $username;
					header("location: ?action=loginSuccess");
				}
			}
		}

		require('views/login.php');
	}

	public static function loginSuccess() {
		require('views/loginSuccess.php');
	}

	public static function logout() {
		require('views/logout.php');
	}

	public static function mainPage() {
		require('views/mainPageView.php');
	}

	public static function memberArea() {
		$user = UserManager::getCurrentUser();

		$username = $_SESSION['username'];
		$email = $_POST['email'] ?? '';
		$nEmail = $_POST['new-email'] ?? '';
		$nEmail2 = $_POST['confirm-new-email'] ?? '';

		if (isset($_POST['submit-new-email'])) {
			if (empty($email) || empty($nEmail) || empty($nEmail2)){
				$fields = "Veuillez renseigner tous les champs";
			} elseif (!UserManager::emailExists($email)) {
				$fields = "Cette adresse est incorrecte.";
			} elseif (!filter_var($nEmail, FILTER_VALIDATE_EMAIL)) {
				$fields = "Cette adresse mail n'est pas valide.";
			} elseif ($nEmail !== $nEmail2) {
				$fields = "Les deux champs ne correspondent pas.";
			} elseif (UserManager::emailExists($nEmail)) {
				$fields = "Cette adresse mail est déjà utilisée";
			} else {
				$user = new User();
				$user->setEmail($nEmail);
				$user->setUsername($username);

				$newEmail = new UserManager;
				$newEmail->updateEmail($user);

				$fields = "L'adresse mail a bien été mise à jour";
			}
		}


		require('views/memberArea.php');
	}

	public static function post() {
		$user = UserManager::getCurrentUser();

		$postId = $_GET['id'];

		$pManager = new PostManager();
		$post = $pManager->getPost($postId);

		$cManager = new CommentManager();
		$comments = $cManager->getCommentsForPost($postId);

		require('views/postView.php');
	}

	public static function registerSuccess() {
		require('views/registerSuccess.php');
	}

	public static function register() {
		$username = $_POST['username'] ?? '';
		$email = $_POST['email'] ?? '';
		$passone = $_POST['pass1'] ?? '';
		$passtwo = $_POST['pass2'] ?? '';

		if (isset($_POST['register-button'])) {
			new UserManager();
			if (empty($username) || empty($email) || empty($passone) || empty($passtwo)) {
				$fields = "Veuillez renseigner tous les champs";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$fields = "L'adresse mail est invalide";
			} elseif (UserManager::userExists($username)) {
				$fields = "Ce nom d'utilisateur est déjà pris";
			} elseif (UserManager::emailExists($email)) {
				$fields = "Cette adresse mail est déjà utilisée";
			} elseif (!preg_match("#^[a-zA-Z0-9_-]{3,20}$#", $username)) {
				$fields = "Le nom d'utilisateur fait plus de 20 caractères ou ne respecte pas les normes";
			} elseif (!preg_match("#^[a-zA-Z0-9]{10,}$#", $passone)) {
				$fields = "Le mot de passe doit faire plus de 10 caractères";
			} elseif ($passone !== $passtwo) {
				$fields = "Les deux mots de passe ne correspondent pas";
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
}
