<?php

namespace App\Models\DAO;

use App\Models\Entidades\Comment;
use Exception;

class CommentDAO extends BaseDAO 
{

    public function getById ($idComment)
    {
        $resultado = $this->select("SELECT * FROM comment WHERE idComment = $idComment");

        return $resultado->fetchObject(Comment::class);
    }
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
    

    public function atualizar(Comment $comment)
    {

    }
    

    public function excluir(int $idComment){
 
    
    }
}
    
    
    
