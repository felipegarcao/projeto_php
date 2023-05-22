<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\User;
use App\Models\Validacao\UserValidador;

class UserController extends Controller
{

    public function index()
    {
        $this->render('/user/login');
    }

    public function perfil() {
        $this->render('/user/perfil');
    }

    public function author() {
        $this->render('/user/author');
    }


    public function realizar()
    {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION['erro'] = "Credenciais inválidas. Verifique o email e a senha informados.";
            $this->redirect('/user/login');
        }
    
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
    
        $userDAO = new UserDAO(); // Verifique se a classe UserDAO está definida corretamente.
    
        $user = $userDAO->realizar($email);
    
        if (!$user || !password_verify($password, $user->getPassword())) {
            $_SESSION['erro'] = "Credenciais inválidas. Verifique o email e a senha informados.";
            $this->redirect('/user/login');
        }
    
        // Autenticação bem-sucedida, armazene as informações do usuário na sessão ou execute ação apropriada.
    
        unset($_SESSION['erro']);
        $_SESSION['user'] = $user; // Armazene as informações do usuário na sessão, se necessário.
        $this->redirect('/home');
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
        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
    
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
    
        Sessao::gravaMensagem("Usuário adicionado com sucesso!");
    
        $this->redirect('/home');
    }

    
    
    public function edicao($params)
    {
        $idUser = $params[0];

        $userDAO = new UserDAO();

        $user = $userDAO->getById($idUser);

        if (!$user) {
            Sessao::gravaErro("Usuário (idUser:{$idUser}) inexistente.");
            $this->redirect('/user');
        }

        self::setViewParam('user', $user);

        $this->render('/user/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $user = new User();
        $user->setIdUser($_POST['idUser']);
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setAvatar($_POST['avatar']);
        $user->setDescription($_POST['description']);
        $user->setType($_POST['type']);

        Sessao::gravaFormulario($_POST);

        $userValidador = new UserValidador();
        $resultadoValidacao = $userValidador->validar($user);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/user/edicao/' . $_POST['idUser']);
        }

        try {
            $userDAO = new UserDAO();
            $userDAO->atualizar($user);
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/user');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário atualizado com sucesso!");

        $this->redirect('/user');
    }

    public function exclusao($params)
    {
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
