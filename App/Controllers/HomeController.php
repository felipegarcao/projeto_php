<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $autenticado = true;
        if ($autenticado) {
            $this->render('/home/index');
        }else {
            header("Location: http://" . APP_HOST . "/auth");
        }
    }
}
