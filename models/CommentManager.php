<?php

require_once('BaseManager.php');

class CommentManager extends BaseManager {
	public function getCommentsForPost(int $postId, bool $isValidated=true) {
		$db = self::dbConnect();
		$q = $db->prepare('SELECT * FROM comments WHERE postId = ? ORDER BY id DESC');
		$q->execute(array($postId));

		$commentData = $q->fetchAll(PDO::FETCH_ASSOC);
		$commentsList = [];

		foreach ($commentData as $key => $value) {
			$id = $value['id'] ?? '';
			$postId = $value['postId'] ?? '';
			$authorName = $value['authorName'] ?? '';
			$content =  $value['content'] ?? '';
			$commentDate = $value['commentDate'] ?? '';
			$isValidated = $value['isValidated'] ?? '';
			$comment = new Comment($postId, $authorName, $content);
			$comment->setId($id);
			$comment->setCommentDate($commentDate);
			$comment->setIsValidated($isValidated);
			$commentsList[] = $comment;
		}
		return $commentsList;
	}

	public function getCommentsForAdmin() {
		$db = self::dbConnect();
		$q = $db->query('SELECT * FROM comments WHERE isValidated = FALSE ORDER BY id DESC');

		$comments = $q->fetchAll();
		$commentsList = [];

		foreach ($comments as $key => $value) {
			$id = $value['id'] ?? '';
			$postId = $value['postId'] ?? '';
			$authorName = $value['authorName'] ?? '';
			$content =  $value['content'] ?? '';
			$commentDate = $value['commentDate'] ?? '';
			$isValidated = $value['isValidated'] ?? '';
			$comment = new Comment($postId, $authorName, $content);
			$comment->setId($id);
			$comment->setCommentDate($commentDate);
			$comment->setIsValidated($isValidated);
			$commentsList[] = $comment;
		}
		return $commentsList;
	}

	public function addComment(Comment $comment) {
		$db = self::dbConnect();
		$q = $db->prepare('INSERT INTO comments(postId, authorName, content, commentDate) VALUES(:postId, :authorName, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':authorName', $comment->getAuthorName());
		$q->bindValue(':content', $comment->getContent());

		$q->execute();
	}

	public function validateComment(int $commentId, bool $isValidated) {
		$db = self::dbConnect();
		$q = $db->prepare('UPDATE comments SET isValidated=:isValidated WHERE id=:id');

		$q->bindValue('id', $commentId);
		$q->bindValue(':isValidated', $isValidated, PDO::PARAM_BOOL);

		$q->execute();
	}

	public function count() {
		$db = self::dbConnect();
		return $db->query('SELECT COUNT(*) FROM comments')->fetchColumn();
	}
}
