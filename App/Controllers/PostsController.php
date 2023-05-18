<?php

namespace App\Controllers;

class PostsController extends Controller
{
    public function detalhes()
    {
        $this->render('/posts/detalhes');
    }
}   