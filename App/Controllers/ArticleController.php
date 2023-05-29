<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\Entidades\Article;
use App\Models\DAO\CategoryDAO;
use App\Models\DAO\UserDAO;
use App\Models\Validacao\ArticleValidador;

class ArticleController extends Controller
{
    public function index(){
        $this->auth();

        $articleDAO = new ArticleDAO();
        self::setViewParam('listArticle', $articleDAO->listar());
        $this->render('/article/index');
    } 

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
        $article->setText($_POST['text']);
        $article->setStatus($status);
        $article->setIdCategory($category);
        $article->setIdUser($user);
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

            if (!empty($_FILES['imagem']['name'])) {      

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
            $this->redirect('/article');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Artigo enviado com sucesso!");
        
        $this->redirect('/home'); // corrigir o redirecionamento para meus posts
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
