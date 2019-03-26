<?php

require_once('BaseManager.php');

class PostManager extends BaseManager {
	public function __construct() {
		$this->db = $this->dbConnect();
	}

	public function getPost(post $id) {
		$q = $this->db->prepare('SELECT id, author, title, chapo, content, date_format(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS postDate_fr FROM posts WHERE id = ?');

		$q->execute(array($id));

		$post = $q->fetch();

		return $post;
		
	}

	public function getPosts() {
		$q = $this->db->query('SELECT id, author, title, chapo, content, date_format(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS postDate_fr FROM posts ORDER BY id DESC');

		return $q;
	}

	public function addPost(Post $post) {
		$q = $this->db->prepare('INSERT INTO post(title, chapo, content, postDate, author) VALUES(:title, :chapo, :content, NOW(), :author');

		$q->bindValue(':title', $post->getTitle());
		$q->bindValue(':chapo', $post->getChapo());
		$q->bindValue(':content', $post->getContent());
		$q->bindValue(':author', $post->getAuthor());
		
		$q->execute();

		$this->hydrate([':id' => $db->lastInsertId()]);
	}

	public function updatePost(Post $post) {
		$q = $this->db->prepare('UPDATE post SET content = :content, lastUpdated = :lastUpdated WHERE id = :id');

		$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$q->bindValue(':lastUpdated', $post->getLastUpdated());
		$q->bindValue(':id', $post->getId(), PDO::PARAM_INT);

		$q->execute();
	}

	public function deletePost(Post $post) {
		$q = $this->db->exec('DELETE FROM post WHERE id = :id');

		$q->bindValue(':id', $post->getId(), PDO::PARAM_INT);
	}
}
