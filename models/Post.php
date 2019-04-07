<?php

class Post {
	private $id;
	private $titleP;
	private $chapo;
	private $content;
	private $postDate;
	private $authorName;
	private $lastUpdated;

	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id):void {
		$this->id = $id;
	}

	public function getTitleP():string {
		return $this->titleP;
	}
	
	public function setTitleP(string $titleP) {
		$this->titleP = $titleP;
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

	public function getAuthorName():string {
		return $this->authorName;
	}
	
	public function setAuthorName(string $authorName) {
		$this->authorName = $authorName;
	}

	public function getLastUpdated() {
		return $this->lastUpdated;
	}
	
	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}
}
