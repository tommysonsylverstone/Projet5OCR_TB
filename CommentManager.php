<?php

require_once('BaseManager.php');

class CommentManager extends BaseManager {
	public function __construct() {
		$this->db = $this->dbConnect();
	}

	public function addComment(Comment $comment) {
		$q = $this->db->prepare('INSERT INTO comments(postId, author, content, commentDate) VALUES(:postId, :author, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':author', $comment->getAuthor());
		$q->bindValue(':content', $comment->getContent());

		$q->execute();

		$comment->hydrate([':id' => $db->lastInsertId()]);
	}

	public function getComments(Comment $postId) {
		$q = $this->db->prepare('SELECT id, postId, author, content, date_format(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr FROM comments ORDER BY id DESC');

		$q->execute(array($postId));

		$comments = $q->fetch();

		return $comments;
	}

	public function confirmComment() {
		
	}
}