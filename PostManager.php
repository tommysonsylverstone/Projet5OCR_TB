<?php

class PostManager {
	private $db;

	public function __construct($db) {
		$this->setDb($db);
	}

	public function addPost(Post $post) {
		$q = $this->db->prepare('INSERT INTO post(title, chapo, content, postDate, authorId) VALUES(:title, :chapo, :content, :postDate, :authorId');

		$q->bindValue(':title', $post->getTitle());
		$q->bindValue(':chapo', $post->getChapo());
		$q->bindValue(':content', $post->getContent());
		$q->bindValue(':postDate', $post->getPostDate());
		$q->bindValue(':authorId', $post->getAuthor());
		
		$q->execute();

		$this->hydrate([':id' => $this->db->lastInsertId()]);
	}

	public function updatePost(Post $post) {
		$q = $this->db->prepare('UPDATE post SET content = :content, lastUpdated = :lastUpdated WHERE id ='. $post->getId());

		$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$q->bindValue(':lastUpdated', $post->getLastUpdated());

		$q->execute();
	}

	public function deletePost(Post $post) {
		$this->db->exec('DELETE FROM post WHERE id = '. $post->getId());
	}

	public function setDb(PDO $db) {
		$this->db = $db;
	}
}
