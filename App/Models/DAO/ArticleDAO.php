<?php

namespace App\Models\DAO;

use App\Models\Entidades\Article;
use PDO;

class ArticleDAO extends BaseDAO 
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT a.title, a.text, a.image, a.status, a.createdAt, c.idCategory, c.name as category, u.idUser, u.name as user 
                FROM article as a INNER JOIN user as u ON a.idUser = u.idUser 
                INNER JOIN category as c ON a.idCategory = c.idCategory
                WHERE a.idArticle = $id"
        );

        $dataSetArticle = $resultado->fetch();

        if($dataSetArticle) {
            $article = new Article();
            $article->setIdArticle($dataSetArticle['idArticle']);
            $article->setTitle($dataSetArticle['title']);
            $article->setStatus($dataSetArticle['status']);
            $article->setCreatedAt($dataSetArticle['createdAt']);
            $article->getIdUser()->setIdUser($dataSetArticle['idUser']);
            $article->getIdCategory()->setIdCategory($dataSetArticle['idCategory']);
            $article->setImage($dataSetArticle['image']);

            return $article;
        }

        return false;
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM article");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Article::class);
    }

  

    public function salvar(Article $article)
    {
        try {

            $title           = $article->getTitle();
            $text          = $article->getText();
            $image     = $article->getImage();
            $status      = $article->getStatus();
            $idUser   = $article->getIdUser()->getIdUser();
            $idCategory   = $article->getIdCategory()->getIdCategory();
         
            return $this->insert(
                'article',
                ":title,:text,:image,:status,:idUser,:idCategory",
                [
                    ':title'         =>$title,
                    ':text'        =>$text,
                    ':image'   =>$image,
                    ':status'    =>$status,
                    ':idUser'       =>$idUser,
                    ':idCategory'       =>$idCategory
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Article $article)
    {
        try {

            $title           = $article->getTitle();
            $text          = $article->getText();
            $image     = $article->getImage();
            $status      = $article->getStatus();
            $idUser   = $article->getIdUser()->getIdUser();
            $idCategory   = $article->getIdCategory()->getIdCategory();

            return $this->update(
                'article',
                "title = :title, text = :text, image = :image, status = :status, createdAt= :createdAt, idUser= :idUser, idCategory= :idCategory",
                [
                    ':title'         =>$title,
                    ':text'        =>$text,
                    ':image'   =>$image,
                    ':status'    =>$status,
                    ':idUser'       =>$idUser,
                    ':idCategory'       =>$idCategory
                ],
                "idArticle = :idArticle"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizarImagem(Article $article)
    {
        try {

            $idArticle             = $article->getIdArticle();
            $image         = $article->getImage();

            return $this->update(
                'article',
                "image= :image",
                [
                    ':idArticle'           =>$idArticle,
                    ':image'       =>$image
                ],
                "idArticle = :idArticle"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function excluir(Article $article)
    {
        try {

            $idArticle = $article->getIdArticle();
            $file = 'public/images/articles/'.$article->getImage();

            if (file_exists($file)) unlink($file);

            return $this->delete('article',"idArticle = $idArticle");

        }catch (\Exception $e){
            throw new \Exception("Erro ao deletar" . $e->getMessage(), 500);
        }
    }
}
