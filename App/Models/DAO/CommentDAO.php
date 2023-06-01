<?php

namespace App\Models\DAO;

use App\Models\Entidades\Comment;
use Exception;

class CommentDAO extends BaseDAO 
{


    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM comment");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }


    public function salvar(Comment $comment)
    {
        try {
            $text = $comment->getText();
            $idUser = $comment->getUser()->getIdUser();
            $idArticle = $comment->getArticle()->getIdArticle();
         
            return $this->insert(
                'comment', // Altera o nome da tabela para "comment"
                ":text, :User_idUser, :Article_idArticle", 
                [
                    ':text' => $text,
                    ':User_idUser' => $idUser,
                    ':Article_idArticle' => $idArticle
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }


    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT c.text, c.createdAt, u.name, u.avatar as user
            FROM comment as c
            INNER JOIN user as u ON c.idUser = u.idUser
            WHERE c.idComment = $id"
        );
    
        $dataSetComment = $resultado->fetch();
    
        if($dataSetComment) {
            $comment = new Comment();
            $comment->setText($dataSetComment['text']);
            $comment->setCreatedAt($dataSetComment['createdAt']);
            $comment->getUser()->setName($dataSetComment['user']);
            $comment->getUser()->setAvatar($dataSetComment['avatar']);
    
            return $comment;
        }
    
        return false;
    }
    
    public function getByArticleId($idArticle)
    {
        $resultado = $this->select(
            "SELECT c.text, c.createdAt, u.name, u.avatar as user
            FROM comment as c
            INNER JOIN user as u ON c.User_idUser = u.idUser
            WHERE c.Article_idArticle = $idArticle"
        );
    
        $comments = [];
    
        while ($dataSetComment = $resultado->fetch()) {
            $comment = new Comment();
            $comment->setText($dataSetComment['text']);
            $comment->setCreatedAt($dataSetComment['createdAt']);
            $comment->getUser()->setName($dataSetComment['name']);
            $comment->getUser()->setAvatar($dataSetComment['user']);
        
            $comments[] = $comment;
        }
        
   
        return $comments;
    }
    

    public function atualizar(Comment $comment)
    {

    }
    

    public function excluir(int $idComment){
 
    
    }
}
    
    
    
