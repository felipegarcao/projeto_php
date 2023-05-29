<?php

namespace App\Controllers;

class PostsController extends Controller
{
    public function detalhes()
    {
        $this->auth();
        $this->render('/article/detalhes');
    }

    public function meusposts() {
        $this->auth();
        $this->render('/posts/meus-posts');
    }

    public function solicitacoes() {
        $this->auth();
        $this->render('/posts/solicitacoes');
    }

    
    public function cadastrar() {
        $this->auth();
        $this->render('/posts/cadastrar');
    }
}   