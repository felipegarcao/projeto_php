<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Models\DAO\UserDAO;
use App\Models\DAO\CategoryDAO;
use App\Lib\Sessao;

class HomeController extends Controller
{
    public function index()
    {
            $this->auth();
            $user = new UserDAO; 
            self::setViewParam('user', $user->getById($_SESSION['idUser']));
            $categoryDAO = new CategoryDAO();
            self::setViewParam('listCategory', $categoryDAO->listar());
            $articleDAO = new ArticleDAO();
            self::setViewParam('listArticle', $articleDAO->listar());
            
            $this->render('/home/index');
    }

    public function getByCategory()
    {
            $this->auth();
            
            $user = new UserDAO; 
            self::setViewParam('user', $user->getById($_SESSION['idUser']));
            $categoryDAO = new CategoryDAO();
            self::setViewParam('listCategory', $categoryDAO->listar());
            $articleDAO = new ArticleDAO();
            
            
            $idCategory = $_POST['idCategory'];
            self::setViewParam('listArticle', $articleDAO->listarCategoria($idCategory));
            
            $this->redirect('/home/index');
    }
}