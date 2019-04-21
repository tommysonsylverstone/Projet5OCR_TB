<?php

require_once('BaseManager.php');

class PostManager extends BaseManager {
	public function getPost($postId) {
		$db = self::dbConnect();
		$q = $db->prepare('SELECT * FROM posts WHERE id = ?');
		$q->execute(array($postId));
		$post = $q->fetch();

		return $post;
	}

	public function getPosts() {
		$db = self::dbConnect();
		$q = $db->query('SELECT * FROM posts ORDER BY id DESC');

		return $q;
	}

	public function addPost(Post $post) {
		if (!empty($post)) {
			$db = self::dbConnect();
			$q = $db->prepare('INSERT INTO posts(titleP, chapo, content, authorName, postDate) VALUES(:titleP, :chapo, :content, :authorName, NOW())');

			$q->bindValue(':titleP', $post->getTitleP());
			$q->bindValue(':chapo', $post->getChapo());
			$q->bindValue(':content', $post->getContent());
			$q->bindValue(':authorName', $post->getAuthorName());
			
			$q->execute();
		}
	}

	public function updatePost(Post $post) {
		$db = self::dbConnect();
		$q = $db->prepare('UPDATE posts SET titleP = :titleP, chapo = :chapo, authorName = :authorName, content = :content, lastUpdated = NOW() WHERE id =' . $post->getId());

		$q->bindValue(':titleP', $post->getTitleP(), PDO::PARAM_STR);
		$q->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
		$q->bindValue(':authorName', $post->getAuthorName(), PDO::PARAM_STR);
		$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);

		$q->execute();
	}

	public function deletePost($postId) {
		$db = self::dbConnect();
		$q = $db->exec('DELETE FROM posts WHERE id ='. $postId);
	}

	public function count() {
		$db = self::dbConnect();
		return $db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
	}
}
