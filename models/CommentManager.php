<?php

require_once('BaseManager.php');

class CommentManager extends BaseManager {
	public function getCommentsForPost(int $postId, bool $validated=true):array {
		$db = self::dbConnect();
		$q = $db->prepare('SELECT * FROM comments WHERE postId = ? AND isValidated = ? ORDER BY id DESC');
		$q->execute(array($postId, $validated));

		$commentData = $q->fetchAll(PDO::FETCH_ASSOC);
		$commentsList = [];

		foreach ($commentData as $value) {
			$commentsList[] = Comment::fromArray($value);
		}

		return $commentsList;
	}

	public function getCommentsForAdmin():array {
		$db = self::dbConnect();
		$q = $db->query('SELECT * FROM comments WHERE isValidated = FALSE ORDER BY id DESC');

		$comments = $q->fetchAll(PDO::FETCH_ASSOC);
		$commentsList = [];

		foreach ($comments as $value) {
			$commentsList[] = Comment::fromArray($value);
		}

		return $commentsList;
	}

	public function addComment(Comment $comment) {
		$db = self::dbConnect();
		$q = $db->prepare('INSERT INTO comments(postId, authorName, content, commentDate) VALUES(:postId, :authorName, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
		$q->bindValue(':authorName', $comment->getAuthorName(), PDO::PARAM_STR);
		$q->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);

		$q->execute();
	}

	public function validateComment(int $commentId, bool $validated) {
		$db = self::dbConnect();
		$q = $db->prepare('UPDATE comments SET isValidated=:isValidated WHERE id=:id');

		$q->bindValue('id', $commentId, PDO::PARAM_INT);
		$q->bindValue(':isValidated', $validated, PDO::PARAM_BOOL);

		$q->execute();
	}
}
