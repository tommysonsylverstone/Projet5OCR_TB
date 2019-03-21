<?php

require_once('BaseManager.php');

class CommentManager extends BaseManager {
	public function addComment(Comment $comment) {
		$db = $this->dbConnect();

		$q = $db->prepare('INSERT INTO comments(postId, authorId, content, commentDate) VALUES(:postId, :authorId, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':authorId', $comment->getAuthorId());
		$q->bindValue(':content', $comment->getContent());

		$q->execute();

		$comment->hydrate([':id' => $db->lastInsertId()]);
	}

	public function getComments(Comment $postId) {
		$db = $this->dbConnect();
		$q = $db->prepare('SELECT id, postId, authorId, content, date_format(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr FROM comments ORDER BY id DESC');
		$q->execute(array($postId));
		$comments = $q->fetch();

		return $comments;
	}

	public function confirmComment(Comment $comment) {
		
	}
}