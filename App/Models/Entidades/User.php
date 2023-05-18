<?php

namespace App\Models\Entidades;

class User
{
    private int $idUser;
    private string $name;
    private string $email;
    private string $password;
    private string $avatar;
    private string $description;
    private string $type;
    

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
	
	/**
	 * @return 
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param  $email 
	 * @return self
	 */
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getPassword(): string {
		return $this->password;
	}
	
	/**
	 * @param  $password 
	 * @return self
	 */
	public function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getAvatar(): string {
		return $this->avatar;
	}
	
	/**
	 * @param  $avatar 
	 * @return self
	 */
	public function setAvatar(string $avatar): self {
		$this->avatar = $avatar;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param  $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getType(): string {
		return $this->type;
	}
	
	/**
	 * @param  $type 
	 * @return self
	 */
	public function setType(string $type): self {
		$this->type = $type;
		return $this;
	}
}