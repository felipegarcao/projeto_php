<?php

namespace App\Models\DAO;

use App\Models\Entidades\Category;
use Exception;

class CategoryDAO extends BaseDAO 
{

    public function getById ($idCategory)
    {
        $resultado = $this->select("SELECT * FROM category WHERE idCategory = $idCategory");

        return $resultado->fetchObject(Category::class);
    }
    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM category");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Category::class);
    }


    public function salvar(Category $category)
    {
        try {
            $nome = $category->getName();
            return $this->insert('category', ":name", [':name'=>$nome]);
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Category $category)
    {
        try {
            $idCategory = $category->getIdCategory();
            $name = $category->getName();
    
            $params = [
                ':idCategory' => $idCategory,
                ':name' => $name
            ];
    
            return $this->update('category', "name = :name", $params, "idCategory = :idCategory");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }
    

    public function excluir(int $idCategory)
    {
        try {
            return $this->delete('category', "idCategory = $idCategory");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a categoria. " . $e->getMessage(), 500);
        }
    }
    
    }
    
    
    
