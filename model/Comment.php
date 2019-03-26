<?php

class Comment {
	private $id;
	private $postId;
	private $authorId;
	private $content;
	private $commentDate;

	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id):void {
		$this->id = $id;
	}

	public function getPostId():int {
		return $this->postId;
	}

	public function getContent():string {
		return $this->content;
	}
	
	public function setContent(string $content) {
		$this->content = $content;
	}

	public function getAuthorId():int {
		return $this->author;
	}
	
	public function setAuthorId(int $author) {
		$this->author = $author;
	}

	public function getCommentDate() {
		return $this->commentDate;
	}
	
	public function setCommentDate($date) {
		$this->commentDate = $commentDate;
	}
}
