<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Models\DAO\UserDAO;
use App\Lib\Sessao;

class HomeController extends Controller
{
    public function index()
    {
            $this->auth();

            $articleDAO = new ArticleDAO();
            self::setViewParam('listArticle', $articleDAO->listar());
            
            $this->render('/home/index');
    }
}
