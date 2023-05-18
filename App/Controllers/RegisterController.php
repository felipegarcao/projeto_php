<?php

namespace App\Controllers;

class RegisterController extends Controller
{
    public function index()
    {
        $this->render('/auth/register');
    }

    
}