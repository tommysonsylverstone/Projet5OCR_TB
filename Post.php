<?php

class Post {
	private $id;
	private $title;
	private $chapo;
	private $content;
	private $date;
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

	public function getDate() {
		return $this->date;
	}
	
	public function setDate($date) {
		$this->date = $date;
	}

	public function getAuthor() {
		return $this->author;
	}
	
	public function setAuthor(int $author) {
		$this->author = $author;
	}

	public function getLastUpdated() {
		return $this->lastUpdated;
	}
	
	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}
}
