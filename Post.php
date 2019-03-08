<?php

class Post {
	private $id;
	private $title;
	private $chapo;
	private $content;
	private $postDate;
	private $authorId;
	private $lastUpdated;

	public function getId() {
		return $this->id;
	}
	
	public function setId(int $id) {
		$this->id = $id;
	}

	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle(string $title) {
		$this->title = $title;
	}

	public function getChapo() {
		return $this->chapo;
	}
	
	public function setChapo(string $chapo) {
		$this->chapo = $chapo;
	}

	public function getContent() {
		return $this->content;
	}
	
	public function setContent(string $content) {
		$this->content = $content;
	}

	public function getPostDate() {
		return $this->postDate;
	}
	
	public function setPostDate($postDate) {
		$this->postDate = $postDate;
	}

	public function getAuthorId() {
		return $this->authorId;
	}
	
	public function setAuthorId(int $authorId) {
		$this->authorId = $authorId;
	}

	public function getLastUpdated() {
		return $this->lastUpdated;
	}
	
	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}
}
