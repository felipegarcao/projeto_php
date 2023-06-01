<?php

namespace App\Models\Entidades;
use DateTime;

class Comment
{
    private int $idComment;
    private string $text;
    private User $user;
    private Article $article;
	private string $createdAt;

	public function __construct()
    {
        $this->user = new User(); // Inicialização vazia do objeto User
    }
	
	/**
	 * @return 
	 */
	public function getText(): string {
		return $this->text;
	}
	
	/**
	 * @param  $text 
	 * @return self
	 */
	public function setText(string $text): self {
		$this->text = $text;
		return $this;
	}
	

	public function getCreatedAt() {
		return new DateTime($this->createdAt);
	}

	public function setCreatedAt($createdAt): self {
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}
	
	/**
	 * @param User $user 
	 * @return self
	 */
	public function setUser($user): self {
		$this->user = $user;
		return $this;
	}
	
	/**
	 * @return Article
	 */
	public function getArticle() {
		return $this->article;
	}
	
	/**
	 * @param Article $article 
	 * @return self
	 */
	public function setArticle($article): self {
		$this->article = $article;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getIdComment(): int {
		return $this->idComment;
	}
	
	/**
	 * @param  $idComment 
	 * @return self
	 */
	public function setIdComment(int $idComment): self {
		$this->idComment = $idComment;
		return $this;
	}
}