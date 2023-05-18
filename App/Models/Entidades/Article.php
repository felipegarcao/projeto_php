<?php

namespace App\Models\Entidades;

class Article
{
    private int $idArticle;
    private int $idUser;
    private string $text;

    private string $image;
    private string $feedback;
    private string $status;
    private int $idCategory;



	/**
	 * @return 
	 */
	public function getIdArticle(): int {
		return $this->idArticle;
	}
	
	/**
	 * @param  $idArticle 
	 * @return self
	 */
	public function setIdArticle(int $idArticle): self {
		$this->idArticle = $idArticle;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getIdUser(): int {
		return $this->idUser;
	}
	
	/**
	 * @param  $idUser 
	 * @return self
	 */
	public function setIdUser(int $idUser): self {
		$this->idUser = $idUser;
		return $this;
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
	
	/**
	 * @return 
	 */
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param  $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getFeedback(): string {
		return $this->feedback;
	}
	
	/**
	 * @param  $feedback 
	 * @return self
	 */
	public function setFeedback(string $feedback): self {
		$this->feedback = $feedback;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getStatus(): string {
		return $this->status;
	}
	
	/**
	 * @param  $status 
	 * @return self
	 */
	public function setStatus(string $status): self {
		$this->status = $status;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getIdCategory(): int {
		return $this->idCategory;
	}
	
	/**
	 * @param  $idCategory 
	 * @return self
	 */
	public function setIdCategory(int $idCategory): self {
		$this->idCategory = $idCategory;
		return $this;
	}
}