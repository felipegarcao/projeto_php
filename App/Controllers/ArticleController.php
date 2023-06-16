<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\Entidades\Article;
use App\Models\DAO\CategoryDAO;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\LikeDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Comment;
use App\Models\Entidades\Like;
use App\Models\Validacao\ArticleValidador;

class ArticleController extends Controller
{

    public function cadastro(){
        $this->auth();
        $categoryDAO = new CategoryDAO();

        self::setViewParam('listCategory', $categoryDAO->listar());
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));

        $this->render('/article/cadastro');
       

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }
    
    public function salvar(){
        $this->auth();
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
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
        $userDAO = new UserDAO();
        $user = $userDAO->getById($_SESSION['idUser']);
        self::setViewParam('user', $user);
    
        $idArticle = $params[0];
        $articleDAO = new ArticleDAO();
        $article = $articleDAO->getById($idArticle);
        self::setViewParam('article', $article);
    
        $commentDAO = new CommentDAO();
        $comments = $commentDAO->getByArticleId($idArticle);
        self::setViewParam('comments', $comments);
    
        $likeDAO = new LikeDAO();
        $likeCount = $likeDAO->getLikeCountByArticleId($idArticle);
        self::setViewParam('likeCount', $likeCount);


        $likeStatus = $likeDAO->getLikeStatus($idArticle, $user->getIdUser());
        self::setViewParam('likeStatus', $likeStatus);
        

    
        Sessao::limpaErro();
    
        $this->render('/article/detalhes');
    }

    public function like($params)
    {
        $this->auth();
        $userDAO = new UserDAO();
        $user = $userDAO->getById($_SESSION['idUser']);
    
        $idArticle = $params[0];
        $likeDAO = new LikeDAO();
        $likeStatus = $likeDAO->getLikeStatus($idArticle, $user->getIdUser());
    
        if ($likeStatus) {
            $likeDAO->deleteLike($idArticle, $user->getIdUser());
        } else {
            $likeDAO->createLike($idArticle, $user->getIdUser());
        }
    
        $this->redirect('/article/detalhes/' . $idArticle);
    }
    
     

    public function excluirComentario($params)
{
        $this->auth();
        
        $idComentario = $params[0];
        $idArtigo = $params[1];
        $commentDAO = new CommentDAO();
    
        $commentDAO->excluir($idComentario);
     
        $this->redirect('/article/detalhes/' . $idArtigo);

}


    public function editarComentario($params)
    {
        $this->auth();
    
        $idComentario = $params[0];
        $idArtigo = $params[1];
        $commentDAO = new CommentDAO();
        $comment = new Comment();
        $comment->setIdComment($idComentario);
        $comment->setText($_POST['text']);
    
        $commentDAO->atualizar($comment);
    
        $this->redirect('/article/detalhes/' . $idArtigo);
    }

    
    public function edit($params) {
        $this->auth();
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        $idArticle = $params[0];
        $article = new ArticleDAO; 
        self::setViewParam('article', $article->getById($idArticle));
        $comment = new CommentDAO; 
        self::setViewParam('comments', $comment->getByArticleId($idArticle));
        $categoryDAO = new CategoryDAO();
        $listCategory = $categoryDAO->listar();
        self::setViewParam('listCategory', $listCategory);
    
        Sessao::limpaErro();
    
        $this->render('/article/edit');
    }

    public function update($params)
    {
        $this->auth();

        $idArticle = $params[0];

        $articleDAO = new ArticleDAO();
        $article = $articleDAO->getById($idArticle);

        if (!$article) {
            Sessao::gravaErro("Artigo (id: {$idArticle}) inexistente.");
            $this->redirect('/article');
        }

        $title = $_POST['title'];
        $text = nl2br($_POST['text']);
        $resume = $_POST['resume'];
        $status = $article->getStatus();
        $idUser = $article->getUser()->getIdUser();
        $idCategory = $article->getCategory()->getIdCategory();

        // Atualize os atributos do objeto $article com os novos valores
        $article->setTitle($title);
        $article->setText($text);
        $article->setResume($resume);
        $article->setStatus($status);
        // Não atualize as propriedades User e Category

        // Verifique se um novo arquivo de imagem foi enviado
        if (!empty($_FILES['image']['name'])) {
            $objUpload = new Upload($_FILES['image']);
            $objUpload->setName('img-id'.$idArticle);
            $dir = 'public/images/articles';

            $sucesso = $objUpload->upload($dir);

            if (!$sucesso) {
                Sessao::gravaErro("Imagem: Problemas ao enviar a imagem do ARTICLE. Código de erro: ".$objUpload->getError());
                $this->redirect('/article/edit/'.$idArticle);
            }

            $newImageName = $objUpload->getBasename();
            $article->setImage($newImageName);
        }

        $articleValidador = new ArticleValidador();
        $resultadoValidacao = $articleValidador->validar($article);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/article/edit/'.$idArticle);
        }

        try {
            $articleDAO->atualizar($article);
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
           
        }

        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/home');
    }




    public function comment()
    {
        $this->auth();
        $idUserLog = $_SESSION['idUser'];
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
    
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
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));

        $article = new ArticleDAO; 
        self::setViewParam('articleSolicitation', $article->listarSolicitacoes());
        $this->render('/article/solicitation');

    }

    public function myArticles()
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
    public function exclusao($params){
        $this->auth();

        $id = $params[0];

        $articleDAO = new ArticleDAO();

        $article = $articleDAO->getById($id);

        
        if(!$article){
            Sessao::gravaMensagem("Artigo (id:{$id}) inexistente.");
            $this->redirect('/article');
        }
        
        self::setViewParam('article', $article);
        
        $this->render('/article/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }
    public function excluir(){
        $this->auth();

        $article = new Article();
        $article->setIdArticle($_POST['id']);

        $articleDAO = new articleDAO();

        if(!$articleDAO->excluir($article)){
            Sessao::gravaMensagem("Usuário (id:{$article->getIdarticle()}) inexistente.");
            $this->redirect('/article/myArticles');
        }

        Sessao::gravaMensagem("article '{$article->getTitle()}' excluido com sucesso!");

        $this->redirect('/article/myArticles');
    }
    public function autorizar(){
        $this->auth();
    }

}
