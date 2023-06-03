<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\ArticleDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\User;
use App\Models\Validacao\UserValidador;

class UserController extends Controller
{

    public function index()
    {
        $this->render('/user/login');
    }

    public function perfil()
    {
        $this->auth();

        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        $this->render('/user/perfil');
    }


    public function author()
    {
        $this->auth();
        $userDAO = new UserDAO();
        $idUser = func_get_args()[0];
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        
        if (is_array($idUser)) {
            $idUser = $idUser[0]; 
        }
        
        $user = $userDAO->getById($idUser);
        $article = new ArticleDAO; 
        self::setViewParam('articleExibitionUser', $article->listarArtigosAprovados($idUser));
        self::setViewParam('userList', $user);
        $this->render('/user/author');
    }

    public function listUser() {

        $this->auth();
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        $users = new UserDAO; 
        self::setViewParam('users', $users->listar());

        $this->render('/user/list-user');


        
    }

    public function logout() 
    {
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $_SESSION["loggedin"] = false;
        unset($_SESSION['idUser']);

        $this->redirect('/');
    }

    public function validar()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        Sessao::gravaFormulario($_POST);

        if(empty(trim($email)) && empty(trim($password))){
            $erro[] = "Faltou digitar usuário e/ou senha!";
            Sessao::gravaErro($erro);
            $this->redirect('/');
        }

        $userDAO = new UserDAO();
        
        $idUser = $userDAO->verificar($email, $password);
        
        if ($idUser == 0) {
            $erro[] = "Usuário ou senha incorretos. Tente novamente!";
            Sessao::gravaErro($erro);
            $this->redirect('/');
        }
       
        Sessao::gravaLogin($idUser);

        Sessao::limpaFormulario();
        Sessao::limpaErro();

        $this->redirect('/home');

        Sessao::limpaMensagem();
    }


    public function resetPassword() {

        $this->auth();

        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->render('/user/resetPassword');

    }

    public function cadastro()
    {
        $this->render('/user/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $description = " ";
        $image = "profileFixed.jpg";
        $type = "user";
        
        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setDescription($description);
        $user->setAvatar($image);
        $user->setType($type);

        Sessao::gravaFormulario($_POST);

        $userValidador = new UserValidador();
        $resultadoValidacao = $userValidador->validar($user);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/user/cadastro');
        }

        try {
            $userDao = new UserDAO();
            $existingUser = $userDao->verificaEmail($user->getEmail());

            if ($existingUser) {
                Sessao::gravaErro("O email informado já está em uso.");
                $this->redirect('/user/erro');
            }

            $userDao->salvar($user);
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/home/index');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();


        $this->redirect('/home');
    }



    public function edicao($params)
    {
        $this->auth();
        $idUser = $params[0];

        $userDAO = new UserDAO();

        $user = $userDAO->getById($idUser);

        if (!$user) {
            Sessao::gravaErro("Usuário (idUser:{$idUser}) inexistente.");
            $this->redirect('/user');
        }

        self::setViewParam('user', $user);

        $this->render('/user/perfil');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $this->auth();
        $user = new UserDAO; 
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
        $user = new User();
        $user->setIdUser($_SESSION['idUser']);
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setAvatar("");
        $user->setDescription($_POST['description']);
        
        Sessao::gravaFormulario($_POST);

        $userValidador = new UserValidador();
        $resultadoValidacao = $userValidador->validar($user);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/user/edicao/' . $_SESSION['idUser']);
        }

        try {
            $dir = 'public/images/users';
            $file = $dir .'/'.$_POST['avatar'];

            if (empty($_POST['avatar'])) {
                if (file_exists($file)) unlink($file);
            }

            if (!empty($_FILES['avatar']['name'])) {      
                $objUpload = new Upload($_FILES['avatar']);
                $objUpload->setName('img-id'.$user->getIdUser());
                $user->setAvatar($objUpload->getBasename());

                if (file_exists($file)) unlink($file);
                
                $sucesso = $objUpload->upload($dir); 
    
                if (!$sucesso) {
                    $resultadoValidacao->addErro('imagem',"Imagem: Problemas ao enviar a imagem do user. Código de erro: ".$objUpload->getError());
                    Sessao::gravaErro($resultadoValidacao->getErros());
                    $this->redirect('/user'.$_POST['id'].'?busca='.$_GET['busca'].'&paginaSelecionada='.$_GET['paginaSelecionada']);
                }               
            }

            $userDAO = new UserDAO();
            $userDAO->atualizar($user);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/user/perfil');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/user/perfil');
    }

    public function exclusao($params)
    {
        $this->auth();
        $idUser = $params[0];

        $userDAO = new UserDAO();
        $user = $userDAO->getById($idUser);

        if (!$user) {
            Sessao::gravaMensagem("Usuário (idUser: {$idUser}) inexistente.");
            $this->redirect('/user');
        }

        self::setViewParam('user', $user);

        $this->render('/user/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        $this->auth();
        $idUser = $_POST['idUser'];

        $userDAO = new UserDAO();
        $user = $userDAO->getById($idUser);

        if (!$user) {
            Sessao::gravaMensagem("Usuário (idUser: {$idUser}) inexistente.");
            $this->redirect('/user');
        }

        $userName = $user->getName();

        try {
            if (!$userDAO->excluir($idUser)) {
                Sessao::gravaMensagem("Erro ao excluir o usuário (idUser: {$idUser}).");
            }
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/user');
        }

        Sessao::gravaMensagem("Usuário '{$userName}' excluído com sucesso!");

        $this->redirect('/user');
    }
}