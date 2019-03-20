<?php

class CommentManager {
	private $db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function addComment(Comment $comment) {
		$q = $this->db->prepare('INSERT INTO comment(postId, authorId, content, date) VALUES(:postId, :authorId, :content, :date');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':authorId', $comment->getAuthorId());
		$q->bindValue(':content', $comment->getContent());
		$q->bindValue(':date', $comment->getDate());

		$q->execute();

		$comment->hydrate([':id' => $this->db->lastInsertId()]);
	}

	public function confirmComment(Comment $comment) {
		
	}
}