<?php

namespace App\Controllers;
use App\Models\DAO\UserDAO;

class HomeController extends Controller
{
    public function index($params)
    {
            $this->auth();
            $this->render('/home/index');
            $id = $params[0];
            $usuarioDAO = new UserDAO();
    
            $usuario = $usuarioDAO->getById($id);
            var_dump($id);
    }
}
