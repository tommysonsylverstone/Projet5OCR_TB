<?php

class Post {
	private $id;
	private $title;
	private $chapo;
	private $content;
	private $date;
	private $author;
	private $lastUpdated;

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getChapo() {
		return $this->chapo;
	}

	public function getContent() {
		return $this->content;
	}

	public function getDate() {
		return $this->date;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getLastUpdated() {
		return $this->lastUpdated;
	}

	public function setId($id) {
		$id = (int) $id;
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setTitle($title) {
		if (is_string($title)) {
			$this->title = $title;
		}
	}

	public function setChapo($chapo) {
		if (is_string($chapo)) {
			$this->chapo = $chapo;
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
		if (is_string($this)) {
			$this->author = $author;
		}
	}

	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
	}
}



