<?php

namespace App\Controllers;

class PostController extends Controller
{
    public function Detalhes()
    {
        $this->render('posts/detalhes');
    }
}