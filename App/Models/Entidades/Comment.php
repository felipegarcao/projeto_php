<?php

namespace App\Models\Entidades;

class Comment
{
    private int $idLike;
    private string $text;
    private int $User_idUser;
    private int $Article_idArticle;


	/**
	 * @return 
	 */
	public function getIdLike(): int {
		return $this->idLike;
	}
	
	/**
	 * @param  $idLike 
	 * @return self
	 */
	public function setIdLike(int $idLike): self {
		$this->idLike = $idLike;
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
	public function getUser_idUser(): int {
		return $this->User_idUser;
	}
	
	/**
	 * @param  $User_idUser 
	 * @return self
	 */
	public function setUser_idUser(int $User_idUser): self {
		$this->User_idUser = $User_idUser;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getArticle_idArticle(): int {
		return $this->Article_idArticle;
	}
	
	/**
	 * @param  $Article_idArticle 
	 * @return self
	 */
	public function setArticle_idArticle(int $Article_idArticle): self {
		$this->Article_idArticle = $Article_idArticle;
		return $this;
	}
}