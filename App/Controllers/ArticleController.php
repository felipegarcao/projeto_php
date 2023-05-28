<?php

namespace App\Controllers;
use App\Models\DAO\ArticleDAO;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\Entidades\Article;
use App\Models\Entidades\Category;
use App\Models\Entidades\User;
use App\Models\Validacao\ArticleValidador;
use App\Validacao\ResultadoValidacao;

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
        $articleDAO = new ArticleDAO();

        self::setViewParam('listArticle', $articleDAO->listar());

        $this->render('/article/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }
    public function salvar(){
        $this->auth();

            
        $category = new Category();
        $category->setIdCategory($_POST['idCategory']);

        $user = new User();
        $user->setIdUser($_POST['idUser']);
        
        $article = new Article();
        $article->setTitle($_POST['nome']);
        $article->setText($_POST['preco']);
        $article->setStatus($_POST['quantidade']);
        $article->setIdCategory($category);
        $article->setIdUser($user);
        $article->setImage("");

        Sessao::gravaFormulario($_POST);
        
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

        Sessao::gravaMensagem("Produto adicionado com sucesso!");
        
        $this->redirect('/article');
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
