<?php

namespace App\Models\Entidades;

class Like
{
    private int $idLike;
    private User $user;
    private Article $article;

    public function getIdLike(): int
    {
        return $this->idLike;
    }

    public function setIdLike(int $idLike): self
    {
        $this->idLike = $idLike;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }
}
