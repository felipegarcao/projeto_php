<?php

namespace App\Models\Entidades;

class User
{
    private int $idUser;
    private string $name;
    private string $email;
    private string $password;
    private ?string $avatar;
    private ?string $description;
    private ?string $type;
    

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
	
	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	public function getEmail(): string {
		return $this->email;
	}
	
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	
	public function getPassword(): string {
		return $this->password;
	}
	
	public function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}
	
	public function getAvatar(): ?string {
		return $this->avatar;
	}
	
	public function setAvatar(string $avatar): self {
		$this->avatar = $avatar;
		return $this;
	}
	
	public function getDescription(): string {
		return $this->description;
	}
	
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}

	public function getType(): string {
		return $this->type;
	}

	public function setType(string $type): self {
		$this->type = $type;
		return $this;
	}

	public function verifyPassword(string $password): bool
    {
        // Use a função password_verify() para verificar a correspondência da senha
        return password_verify($password, $this->password);
    }
}