<?php

require_once('BaseManager.php');

class PostManager extends BaseManager {
	public function __construct() {
		$this->db = $this->dbConnect();
	}

	public function getPost($postId) {
		$q = $this->db->prepare('SELECT id, authorName, titleP, chapo, content, date_format(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS postDate_fr FROM posts WHERE id = ?');
		$q->execute(array($postId));
		$post = $q->fetch();

		return $post;
		
	}

	public function getPosts() {
		$q = $this->db->query('SELECT id, authorName, titleP, chapo, content, date_format(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS postDate_fr FROM posts ORDER BY id DESC');

		return $q;
	}

	public function addPost(Post $post) {
		if (!empty($post)) {
		$q = $this->db->prepare('INSERT INTO posts(titleP, chapo, content, authorName, postDate) VALUES(:titleP, :chapo, :content, :authorName, NOW())');

		$q->bindValue(':titleP', $post->getTitleP());
		$q->bindValue(':chapo', $post->getChapo());
		$q->bindValue(':content', $post->getContent());
		$q->bindValue(':authorName', $post->getAuthorName());
		
		$q->execute();
		}
	}

	public function updatePost(Post $post) {
		$db = $this->dbConnect();

		$q = $db->prepare('UPDATE posts SET content = :content, lastUpdated = :lastUpdated WHERE id = :id');

		$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$q->bindValue(':lastUpdated', $post->getLastUpdated());
		$q->bindValue(':id', $post->getId(), PDO::PARAM_INT);

		$q->execute();
	}

	public function deletePost(Post $post) {
		$db = $this->dbConnect();

		$q = $db->exec('DELETE FROM posts WHERE id = :id');

		$q->bindValue(':id', $post->getId(), PDO::PARAM_INT);
	}
}