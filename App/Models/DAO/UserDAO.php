<?php

namespace App\Models\DAO;

use App\Models\Entidades\User;
use Exception;

class UserDAO extends BaseDAO 
{

    public function getById(int $idUser)
    {
        $resultado = $this->select("SELECT * FROM user WHERE idUser = $idUser");

        return $resultado->fetchObject(User::class);
    }

    public function listar()
    {
        $resultado = $this->select("SELECT idUser, name, avatar, type, stats FROM user ORDER BY (CASE WHEN type = 'adm' THEN 0 ELSE 1 END)");


            $dataSet = $resultado->fetchAll();
            $listaUser = [];

            if($dataSet){
            foreach ($dataSet as $data) 
            {
                $user = new User();
                $user->setIdUser($data['idUser']);
                $user->setName($data['name']);
                $user->setAvatar($data['avatar']);
                $user->setType($data['type']);
                $user->setStats($data['stats']);
                $listaUser[]= $user;
            }

            }
            return $listaUser;

    }

    public function getByEmail(string $email)
    {
        $resultado = $this->select("SELECT idUser, email, password FROM user WHERE email = '$email'");

        return $resultado->fetch();
    }


    public function salvar(User $user)
    {
        try {
            $name = $user->getName();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $description = $user->getDescription();
            $type = $user->getType();
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $params = [
                ':name' => $name,
                ':email' => $email,
                ':password' => $password,
                ':avatar' => $avatar,
                ':description' => $description,
                ':type' => $type,
 
            ];

            return $this->insert('user', ":name, :email, :password, :avatar, :description, :type", $params);
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }

        
    }


    public function verificar(string $email, string $password)
    {
        try {

            $query = $this->select(
                "SELECT * FROM user WHERE email = '$email'"
            );

            $user = $query->fetchObject(User::class);

            if(!$user) { 
                return 0; 
            }

            if(!password_verify($password, $user->getPassword())) { 
                return 0; 
            }

            return $user->getIdUser();            

        }catch (\Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
        
    }
    
    public function verificaEmail($email)
    {
        try {
            $query = $this->select(
                "SELECT * FROM user WHERE email = '$email'"
            );
            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function permissao(User $user)
{
    try {
        $idUser = $user->getIdUser();
        $type = "adm"; 

        return $this->update(
            'user',
            "type = :type",
            [
                ':idUser' => $idUser,
                ':type' => $type,
            ],
            "idUser = :idUser"
        );
    } catch (\Exception $e) {
        throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
    }
}


public function banimento(User $user)
{
    try {
        $idUser = $user->getIdUser();
        $stats = "banned"; 

        return $this->update(
            'user',
            "stats = :stats",
            [
                ':idUser' => $idUser,
                ':stats' => $stats,
            ],
            "idUser = :idUser"
        );
    } catch (\Exception $e) {
        throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
    }
}

    public function atualizar(User $user)
    {
        try {
            $idUser = $user->getIdUser();
            $name = $user->getName();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $description = $user->getDescription();

            return $this->update (
                'user',
                "name = :name, email = :email, avatar = :avatar, description = :description, idUser = :idUser",
            
            [
                ':idUser' => $idUser,
                ':name' => $name,
                ':email' => $email,
                ':avatar' => $avatar,
                ':description' => $description,
            ],
            "idUser = :idUser"
        );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir(int $idUser)
    {
        try {
            return $this->delete('user', "idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuário. " . $e->getMessage(), 500);
        }
    }
    public function atualizarPassword(User $usuario)
    {
        try {

            $idUser         = $usuario->getIdUser();
            $new_password   = $usuario->getPassword();

            return $this->update(
                'user', 
                "password = :password", 
                
                [
                    ':idUser'       =>$idUser, 
                    ':password' => $new_password
                ], 
                "idUser = :idUser"
            );
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados." . $e->getMessage(), 500);
        }
    }
    public  function atualizarImagem(USER $user)
    {
        try {

            $idUser             = $user->getIdUser();
            $avatar         = $user->getAvatar();

            return $this->update(
                'user',
                "avatar= :avatar",
                [
                    ':idUser'           =>$idUser,
                    ':avatar'       =>$avatar
                ],
                "idUser = :idUser"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

}
