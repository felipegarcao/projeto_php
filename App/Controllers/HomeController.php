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
        
        $userDAO = new UserDAO; 
        self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));
        
        $categoryDAO = new CategoryDAO();
        $listCategory = $categoryDAO->listar();
        self::setViewParam('listCategory', $listCategory);
        
        $articleDAO = new ArticleDAO();
        $listArticle = $articleDAO->listar();
        self::setViewParam('listArticle', $listArticle);
        
        $this->render('/home/index');
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
    
    public function getByCategory()
    {
        $this->auth();
        
        $userDAO = new UserDAO; 
        self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));
        
        $categoryDAO = new CategoryDAO();
        $listCategory = $categoryDAO->listar();
        self::setViewParam('listCategory', $listCategory);
        
        $articleDAO = new ArticleDAO();
        
        $idCategory = $_POST['idCategory'];
        
        if ($idCategory == 0) {
            $this->redirect('/home/index');
        }
        
        $listArticle = $articleDAO->listarCategoria($idCategory);
        self::setViewParam('listArticle', $listArticle);
        $selectedCategory = $categoryDAO->getById($idCategory);
        self::setViewParam('selectedCategory', $selectedCategory);
        
        if (empty($listArticle)) {
            self::setViewParam('noArticlesMessage', 'Sem artigos aprovados nesta categoria.');
        }
        
        $this->render('/home/index');
    }
}
