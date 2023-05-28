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
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $params = [
                ':name' => $name,
                ':email' => $email,
                ':password' => $password,
 
            ];

            return $this->insert('user', ":name, :email, :password", $params);
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
    public function atualizar(User $user)
    {
        try {
            $idUser = $user->getIdUser();
            $name = $user->getName();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $description = $user->getDescription();
            $type = $user->getType();

            $params = [
                ':idUser' => $idUser,
                ':name' => $name,
                ':email' => $email,
                ':avatar' => $avatar,
                ':description' => $description,
                ':type' => $type
            ];

            return $this->update('user', "name = :name, email = :email, avatar = :avatar, description = :description, type = :type", $params, "idUser = :idUser");
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
}
