<?php

class CommentManager extends BaseManager {

	}

	public function addComment(Comment $comment) {
		$db = $this->dbConnect();

		$q = $db->prepare('INSERT INTO comments(postId, authorId, content, commentDate) VALUES(:postId, :authorId, :content, NOW())');

		$q->bindValue(':postId', $comment->getPostId());
		$q->bindValue(':authorId', $comment->getAuthorId());
		$q->bindValue(':content', $comment->getContent());

		$q->execute();

		$comment->hydrate([':id' => $db->lastInsertId()]);
	}

	public function getComment(Comment $comment) {
		$db = $this->dbConnect();

		$q = $db->prepare('SELECT * FROM comments')
	}

	public function confirmComment(Comment $comment) {
		
	}
}