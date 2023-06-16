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
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

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

    public function resetPassword()
    {
        $this->auth();
    
        $user = new UserDAO;
        self::setViewParam('user', $user->getById($_SESSION['idUser']));
    
        if ($_POST) {
            $usuario = new User();
    
            $usuario->setIdUser($_SESSION['idUser']);
            $new_password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            Sessao::gravaFormulario($_POST);
    
            $erros = [];
            $usuarioDAO = new UserDAO();
    
            if ($new_password !== $password_confirm) {
                $erros[] = "As senhas digitadas não coincidem!";
            }
    
            if ($erros) {
                Sessao::gravaErro($erros);
                Sessao::limpaFormulario();
                Sessao::limpaMensagem();
                $this->redirect('/user/resetPassword');
            }
            
    
            try {
                $usuario->setPassword(password_hash($new_password, PASSWORD_DEFAULT));
                $usuarioDAO->atualizarPassword($usuario);
    
                Sessao::limpaFormulario();
                Sessao::limpaMensagem();
                Sessao::limpaErro();
    
                Sessao::gravaMensagem("Senha atualizada com sucesso!");
    
                $this->redirect('/home');
            } catch (\Exception $e) {
                Sessao::gravaMensagem($e->getMessage());
                $this->redirect('/user/resetPassword');
            }
        } else {
            $this->render('/user/reset-password');
        }
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
        $userDAO = new UserDAO; 
        self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));
        
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
            $file = $dir . '/' . $_POST['avatar'];

            if (empty($_FILES['avatar']['name'])) {
                $userDAO = new UserDAO();
                $previousUser = $userDAO->getById($_SESSION['idUser']);
                $user->setAvatar($previousUser->getAvatar());
            } else {
                $objUpload = new Upload($_FILES['avatar']);
                $objUpload->setName('img-id' . $user->getIdUser());
                $user->setAvatar($objUpload->getBasename());

                if (file_exists($file)) unlink($file);
                
                $sucesso = $objUpload->upload($dir); 

                if (!$sucesso) {
                    $resultadoValidacao->addErro('imagem', "Imagem: Problemas ao enviar a imagem do user. Código de erro: " . $objUpload->getError());
                    Sessao::gravaErro($resultadoValidacao->getErros());
                    $this->redirect('/user' . $_POST['id'] . '?busca=' . $_GET['busca'] . '&paginaSelecionada=' . $_GET['paginaSelecionada']);
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

    public function permissao($params)
    {
        $this->auth();
        $idUser = $params[0];
        $user = new User();
        $userDAO = new UserDAO();
        $user->setIdUser($idUser);
        $type = "adm";
        $user->setType($type);

        try {
            $userDAO->permissao($user);
            $this->redirect('/user/list-user');
        } catch (\Exception $e) {
            // Tratar o erro adequadamente
            echo "Erro na atualização dos dados: " . $e->getMessage();
        }
    }

    public function banir($params)
    {
        $this->auth();
        $idUser = $params[0];
        $user = new User();
        $userDAO = new UserDAO();
        $user->setIdUser($idUser);
        $stats = "banned";
        $user->setStats($stats);

        try {
            $userDAO->banimento($user);
            $this->redirect('/user/list-user');
        } catch (\Exception $e) {
            // Tratar o erro adequadamente
            echo "Erro na atualização dos dados: " . $e->getMessage();
        }
    }
 
}