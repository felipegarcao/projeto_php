<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\CategoryDAO;
use App\Models\Entidades\Category;
use App\Models\Validacao\CategoryValidador;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryDao = new CategoryDAO();

        self::setViewParam('listCategory', $categoryDao->listar());

        $this->render('/category/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/category/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $category = new Category();
        $category->setName($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $categoryValidador = new CategoryValidador();
        $resultadoValidacao = $categoryValidador->validar($category);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/category/cadastro');
        }

        try {

            $categoryDao = new CategoryDAO();
            $categoryDao->salvar($category);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/category');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Category adicionado com sucesso!");

        $this->redirect('/category');
    }
    public function edicao($params)
    {
        $idCategory = $params[0];

        $categoryDAO = new CategoryDAO();

        $category = $categoryDAO->getById($idCategory);

        if(!$category){
            Sessao::gravaErro("Categoria (idCategory:{$idCategory}) inexistente.");
            $this->redirect('/category');
        }

        self::setViewParam('category',$category);

        $this->render('/category/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $category = new Category();
        $category->setIdCategory($_POST['idCategory']);
        $category->setName($_POST['name']);

        Sessao::gravaFormulario($_POST);

        $categoryValidador = new CategoryValidador();
        $resultadoValidacao = $categoryValidador->validar($category);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/category/edicao/'.$_POST['idCategory']);
        }

        try {

            $categoryDAO = new CategoryDAO();
            $categoryDAO->atualizar($category);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/category');            
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Category atualizado com sucesso!");

        $this->redirect('/category');
    }


    
    public function exclusao($params)
    {
        $idCategory = $params[0];
    
        $categoryDAO = new CategoryDAO();
        $category = $categoryDAO->getById($idCategory);
    
        if (!$category) {
            Sessao::gravaMensagem("Categoria (idCategory: {$idCategory}) inexistente.");
            $this->redirect('/category');
        }
    
        self::setViewParam('category', $category);
    
        $this->render('/category/exclusao');
    
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
    
    
    public function excluir()
    {
        $idCategory = $_POST['idCategory'];
    
        $categoryDAO = new CategoryDAO();
        $category = $categoryDAO->getById($idCategory);
    
        if (!$category) {
            Sessao::gravaMensagem("Categoria (idCategory: {$idCategory}) inexistente.");
            $this->redirect('/category');
        }
    
        $categoryName = $category->getName();
        
        try {
            if (!$categoryDAO->excluir($idCategory)) {
                Sessao::gravaMensagem("Erro ao excluir a categoria (idCategory: {$idCategory}).");
            }
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/category');
        }
    
        Sessao::gravaMensagem("Categoria '{$categoryName}' excluída com sucesso!");
    
        $this->redirect('/category');
    }
    
    
    
}