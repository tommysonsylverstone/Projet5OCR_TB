<?php

require_once('BaseManager.php');

class PostManager extends BaseManager {
	public function getPost($postId):Post {
		$db = self::dbConnect();
		$q = $db->prepare('SELECT * FROM posts WHERE id = ?');
		$q->execute(array($postId));

		$postData = $q->fetch();

		$post = new Post($postData['titleP'], $postData['chapo'], $postData['content'], $postData['authorName']);
		$post->setId($postId);
		$post->setPostDate($postData['postDate']);
		$post->setLastUpdated($postData['lastUpdated']);
		
		return $post;
	}

	public function getPosts():array {
		$db = self::dbConnect();
		$q = $db->query('SELECT * FROM posts ORDER BY id DESC');

		$posts = $q->fetchAll();
		$postsList = [];

		foreach ($posts as $value) {
			$postsList[] = Post::fromArray($value);
		}
		
		return $postsList;
	}

	public function addPost(Post $post) {
		if (!empty($post)) {
			$db = self::dbConnect();
			$q = $db->prepare('INSERT INTO posts(titleP, chapo, content, authorName, postDate) VALUES(:titleP, :chapo, :content, :authorName, NOW())');

			$q->bindValue(':titleP', $post->getTitle(), PDO::PARAM_STR);
			$q->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
			$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
			$q->bindValue(':authorName', $post->getAuthorName(), PDO::PARAM_STR);
			
			$q->execute();
		}
	}

	public function updatePost(Post $post) {
		$db = self::dbConnect();
		$q = $db->prepare('UPDATE posts SET titleP=:titleP, chapo=:chapo, authorName=:authorName, content=:content, lastUpdated=NOW() WHERE id=:id');

		$q->bindValue(':id', $post->getId(), PDO::PARAM_INT);
		$q->bindValue(':titleP', $post->getTitle(), PDO::PARAM_STR);
		$q->bindValue(':chapo', $post->getChapo(), PDO::PARAM_STR);
		$q->bindValue(':authorName', $post->getAuthorName(), PDO::PARAM_STR);
		$q->bindValue(':content', $post->getContent(), PDO::PARAM_STR);

		$q->execute();
	}

	public function deletePost($postId) {
		$db = self::dbConnect();
		$q = $db->prepare('DELETE FROM posts WHERE id=:id');
		$q->bindValue('id', $postId, PDO::PARAM_INT);

		$q->execute();
	}

	public function count():bool {
		$db = self::dbConnect();
		return $db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
	}
}
