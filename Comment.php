<?php

class Comment {
	private $id;
	private $postId;
	private $content;
	private $authorId;
	private $date;

	public function getId() {
		return $this->id;
	}
	
	public function setId(int $id) {
		$this->id = $id;
	}

	public function getPostId() {
		return $this->postId;
	}

	public function getContent() {
		return $this->content;
	}
	
	public function setContent(string $content) {
		$this->content = $content;
	}

	public function getAuthorId() {
		return $this->author;
	}
	
	public function setAuthorId(int $author) {
		$this->author = $author;
	}

	public function getDate() {
		return $this->date;
	}
	
	public function setDate($date) {
		$this->date = $date;
	}
}
