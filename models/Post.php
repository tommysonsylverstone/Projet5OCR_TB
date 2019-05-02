<?php

class Post {
	private $id;
	private $title;
	private $chapo;
	private $content;
	private $postDate;
	private $authorName;
	private $lastUpdated;

	public function __construct (string $title, string $chapo, string $content, string $authorName) {
		$this->title = $title;
		$this->chapo = $chapo;
		$this->content = $content;
		$this->authorName = $authorName;
	}

	public static function fromArray(array $value):Post {
		$post = new Post($value['titleP'], $value['chapo'], $value['content'], $value['authorName']);
		$post->setId($value['id']);
		$post->setPostDate($value['postDate']);
		$post->setLastUpdated($value['lastUpdated']);

		return $post;
	}

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

	public function getEscapedContent():string {
		return nl2br(htmlspecialchars($this->content));
	}

	public function getPostDate():string {
		return $this->postDate;
	}
	
	public function setPostDate(string $postDate) {
		$this->postDate = $postDate;
	}

	public function getFormattedDate():string {
		return date_format(date_create($this->postDate), 'd/m/Y à H:i');
	}

	public function getAuthorName():string {
		return $this->authorName;
	}
	
	public function setAuthorName(string $authorName) {
		$this->authorName = $authorName;
	}

	public function getLastUpdated():string {
		return $this->lastUpdated;
	}
	
	public function setLastUpdated(string $lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}

	public function getFormattedLastUpdated():string {
		return date_format(date_create($this->lastUpdated), 'd/m/Y à H:i');
	}
}
