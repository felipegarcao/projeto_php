<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\Entidades\Article;
use App\Models\DAO\CategoryDAO;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Comment;
use App\Models\Validacao\ArticleValidador;

class ArticleController extends Controller
{

    public function cadastro(){
        $this->auth();
        $categoryDAO = new CategoryDAO();

        self::setViewParam('listCategory', $categoryDAO->listar());

        $this->render('/article/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }
    
    public function salvar(){
        $this->auth();

        Sessao::gravaFormulario($_POST);
    
        $status = "Pending";
        $idUserLog = $_SESSION['idUser'];
        $viewVar['idUserLog'] = $idUserLog;
        
        $user = new UserDAO();
        $cat = new CategoryDAO();

        $user = $user->getById($idUserLog);
        $category = $cat->getById($_POST['idCategory']);
        
        $article = new Article();
        $article->setTitle($_POST['title']);
        $article->setText(nl2br($_POST['text']));
        $article->setResume($_POST['resume']);
        $article->setStatus($status);
        $article->setCategory($category);
        $article->setUser($user);
        $article->setImage("");
        
        $articleValidador = new ArticleValidador();
        $resultadoValidacao = $articleValidador->validar($article);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/article/cadastro');
        }

        try { 
            $articleDAO = new ArticleDAO(); 

            $lastId = $articleDAO->salvar($article);
            $article->setIdArticle($lastId);

            if (!empty($_FILES['image']['name'])) {      
                $objUpload = new Upload($_FILES['image']);
                $objUpload->setName('img-id'.$lastId);
                $article->setImage($objUpload->getBasename());
                $dir = 'public/images/articles';
        
                $sucesso = $objUpload->upload($dir); 
        
                if (!$sucesso) {
                    $resultadoValidacao->addErro('imagem',"Imagem: Problemas ao enviar a imagem do ARTICLE. Código de erro: ".$objUpload->getError());
                    Sessao::gravaErro($resultadoValidacao->getErros());
                    $this->redirect('/article/cadastro');
                }
        
                $articleDAO->atualizarImagem($article);
            }  
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/home');
            
        }
        

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/home'); // corrigir o redirecionamento para meus posts
    }

    public function detalhes($params)
    {
        $this->auth();
        $idArticle = $params[0];

        $article = new ArticleDAO; 
        self::setViewParam('article', $article->getById($idArticle));


        Sessao::limpaErro();

        $this->render('/article/detalhes');
    }
    public function comment()
    {
        $this->auth();
        $idUserLog = $_SESSION['idUser'];
    
        $user = new UserDAO();
        $articleDAO = new ArticleDAO();
        $commentDAO = new CommentDAO();

        $user = $user->getById($idUserLog);
        
        $articleId = basename($_SERVER['REQUEST_URI']);
        $articleId = intval($articleId);

        $article = $articleDAO->getById($articleId);
        $comment = new Comment();
        $comment->setText(nl2br($_POST['text']));
        $comment->setUser($user);
        $comment->setArticle($article);
        $commentDAO->salvar($comment);

        $this->redirect('/article/detalhes/' . $articleId);

        }
    
    


    public function solicitation($params)
    {

        $this->auth();

        $article = new ArticleDAO; 
        self::setViewParam('articleSolicitation', $article->listarSolicitacoes());
        $this->render('/article/solicitation');

    }

    public function myArticles($params)
    {
        $this->auth();
        $idUserLog = $_SESSION['idUser'];
        $article = new ArticleDAO; 
        self::setViewParam('articleExibition', $article->listarArtigos($idUserLog));
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
    
        $this->render('/article/myArticles');
    }
    

    public function aproved ($params)
    {
        $this->auth();
        $idArticle = $params[0];
        $article = new Article();
        $articleDAO = new ArticleDAO(); 
        $article->setIdArticle($idArticle);
        $articleDAO->aproved($article);

        $this->redirect('/article/solicitation');
    }

    public function denied ($params)
    {
        $this->auth();
        $idArticle = $params[0];
        $article = new Article();
        $articleDAO = new ArticleDAO(); 
        $article->setIdArticle($idArticle);
        $feedback = isset($_POST['feedback']) ? $_POST['feedback'] : '';
        $article->setFeedback($feedback);
        
        $articleDAO->denied($article);

        $this->redirect('/article/solicitation');
    }

    public function edicao(){
        $this->auth();

    }
    public function atualizar(){
        $this->auth();
    }
    public function exclusao(){
        $this->auth();

    }
    public function excluir(){
        $this->auth();
    }
    public function autorizar(){
        $this->auth();
    }

}
