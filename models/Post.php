<?php

class Post {
	private $id;
	private $title;
	private $chapo;
	private $content;
	private $postDate;
	private $author;
	private $lastUpdated;

	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id):void {
		$this->id = $id;
	}

	public function getTitle():string {
		return $this->title;
	}
	
	public function setTitle(string $title) {
		$this->title = $title;
	}

	public function getChapo():string {
		return $this->chapo;
	}
	
	public function setChapo(string $chapo) {
		$this->chapo = $chapo;
	}

	public function getContent():string {
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

	public function getAuthor():string {
		return $this->author;
	}
	
	public function setAuthor(string $author) {
		$this->author = $author;
	}

	public function getLastUpdated() {
		return $this->lastUpdated;
	}
	
	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}
}
