<?php

require_once('BaseManager.php');

class CommentManager extends BaseManager {
	public function getCommentsForPost(int $postId, bool $isValidated=true) {
		$db = self::dbConnect();
		$q = $db->prepare('SELECT id, postId, authorName, content, commentDate FROM comments WHERE postId = ? ORDER BY id DESC');
		$q->execute(array($postId));

		return $q;
	}

	public function addComment(Comment $comment) {
		$db = self::dbConnect();
		$q = $db->prepare('INSERT INTO comments(postId, authorName, content, commentDate) VALUES(:postId, :authorName, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':authorName', $comment->getAuthorName());
		$q->bindValue(':content', $comment->getContent());

		$q->execute();
	}

	public function count() {
		$db = self::dbConnect();
		return $db->query('SELECT COUNT(*) FROM comments')->fetchColumn();
	}
}
