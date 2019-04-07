<?php 

class Comment {
	private $id;
	private $postId;
	private $authorName;
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

	public function setPostId(int $postId) {
		$this->postId = $postId;
	}

	public function getAuthorName():string {
		return $this->authorName;
	}

	public function setAuthorName(string $authorName) {
		$this->authorName = $authorName;
	}

	public function getContent():string {
		return $this->content;
	}

	public function setContent(string $content) {
		$this->content = $content;
	}

	public function getCommentDate():string {
		return $this->commentDate;
	}

	public function setCommentDate(string $commentDate) {
		$this->commentDate = $commentDate;
	}
}
