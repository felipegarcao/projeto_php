<?php

namespace App\Models\Entidades;
use DateTime;
class Article
{
    private int $idArticle;
    private User $idUser;
    private string $text;
    private ?string $image;
    private ?string $feedback;
    private string $status;
    private Category $idCategory;
    private string $createdAt;
    private string $title;

    public function getIdArticle(): int {
        return $this->idArticle;
    }

    public function setIdArticle(int $idArticle): self {
        $this->idArticle = $idArticle;
        return $this;
    }


    public function getText(): string {
        return $this->text;
    }

    public function setText(string $text): self {
        $this->text = $text;
        return $this;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    public function getFeedback(): string {
        return $this->feedback;
    }

    public function setFeedback(string $feedback): self {
        $this->feedback = $feedback;
        return $this;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }


	/**
	 * @return Category
	 */
	public function getIdCategory(): Category {
		return $this->idCategory;
	}
	
	/**
	 * @param Category $idCategory 
	 * @return self
	 */
	public function setIdCategory(Category $idCategory): self {
		$this->idCategory = $idCategory;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCreatedAt() {
		return new DateTime($this->createdAt);
	}
	
	/**
	 * @param mixed $createdAt 
	 * @return self
	 */
	public function setCreatedAt($createdAt): self {
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getIdUser(): User {
		return $this->idUser;
	}
	
	/**
	 * @param User $idUser 
	 * @return self
	 */
	public function setIdUser($idUser): self {
		$this->idUser = $idUser;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param  $title 
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
}
