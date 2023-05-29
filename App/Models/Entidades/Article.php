<?php

namespace App\Models\Entidades;
use DateTime;
class Article
{
    private int $idArticle;
    private User $user;
    private string $text;
    private ?string $image;
    private ?string $feedback;
    private string $status;
    private Category $category;
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


		public function getCategory()
		{
				return $this->category;
		}
	
		public function setCategory(Category $category)
		{
				$this->category = $category;
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

	public function getUser()
	{
			return $this->user;
	}

	public function setUser(User $user)
	{
			$this->user = $user;
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
