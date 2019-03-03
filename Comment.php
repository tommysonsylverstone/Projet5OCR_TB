<?php

class Comment {
	private $id;
	private $postId;
	private $content;
	private $author;
	private $date;

	public function getId() {
		return $this->id;
	}

	public function getPostId() {
		return $this->postId;
	}

	public function getContent() {
		return $this->content;
	}

	public function getAuthour() {
		return $this->author;
	}

	public function getDate() {
		return $this->date;
	}

	public function setId($id) {
		$id = (int) $id;
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setContent($content) {
		if (is_string($content)) {
			$this->content = $content;
		}
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setAuthor($author) {
		if (is_string($author) {
			$this->author = $author;
		}
	}
}


