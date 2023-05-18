<?php

namespace App\Models\Entidades;

class Like
{
    private int $idLike;
    private int $idUser;
    private int $idArticle;


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
}