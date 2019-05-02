<?php 

class Comment {
	private $id;
	private $postId;
	private $authorName;
	private $content;
	private $commentDate;
	private $isValidated;

	public function __construct(int $postId, string $authorName, string $content) {
		$this->postId = $postId;
		$this->authorName = $authorName;
		$this->content = $content;
	}

	public static function fromArray(array $value):Comment {
		$comment = new Comment($value['postId'], $value['authorName'], $value['content']);
		$comment->setId($value['id']);
		$comment->setCommentDate($value['commentDate']);
		$comment->setIsValidated($value['isValidated']);

		return $comment;
	}

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

	public function getEscapedContent():string {
		return nl2br(htmlspecialchars($this->content));
	}

	public function getCommentDate():string {
		return $this->commentDate;
	}

	public function setCommentDate(string $commentDate) {
		$this->commentDate = $commentDate;
	}

	public function getFormattedCommentDate():string {
		return date_format(date_create($this->commentDate), 'd/m/Y à H:i');
	}

	public function getIsValidated():bool {
		return $this->isValidated;
	}

	public function setIsValidated(bool $isValidated) {
		$this->isValidated = $isValidated;
	}
}
