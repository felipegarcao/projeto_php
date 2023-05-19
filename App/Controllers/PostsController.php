<?php

namespace App\Controllers;

class PostsController extends Controller
{
    public function detalhes()
    {
        $this->render('/posts/detalhes');
    }

    public function meusposts() {
        $this->render('/posts/meus-posts');
    }

    public function solicitacoes() {
        $this->render('/posts/solicitacoes');
    }
}   