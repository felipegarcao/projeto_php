<?php

namespace App\Models\Entidades;

class Category
{
    private int $idCategory;
    private string $name;


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
	
	/**
	 * @return 
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param  $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
}