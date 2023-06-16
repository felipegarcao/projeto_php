<?php

namespace App\Models\DAO;

use App\Models\Entidades\Article;
use PDO;

class ArticleDAO extends BaseDAO 
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT a.title, a.resume, a.text, a.image, a.status, a.createdAt, c.idCategory, 
            c.name as category, u.idUser, u.name as user, u.avatar
                FROM article as a INNER JOIN user as u ON a.idUser = u.idUser 
                INNER JOIN category as c ON a.idCategory = c.idCategory
                WHERE a.idArticle = $id"
        );

        $dataSetArticle = $resultado->fetch();

        if($dataSetArticle) {
            $article = new Article();
            $article->setIdArticle($id);
            $article->setTitle($dataSetArticle['title']);
            $article->setStatus($dataSetArticle['status']);
            $article->setText($dataSetArticle['text']);
            $article->setResume($dataSetArticle['resume']);
            $article->setCreatedAt($dataSetArticle['createdAt']);
            $article->getUser()->setIdUser($dataSetArticle['idUser']);
            $article->getUser()->setName($dataSetArticle['user']);
            $article->getUser()->setAvatar($dataSetArticle['avatar']);
            $article->getCategory()->setIdCategory($dataSetArticle['idCategory']);
            $article->getCategory()->setName($dataSetArticle['category']);
            $article->setImage($dataSetArticle['image']);

            return $article;
        }

        return false;
    }

    public function listar()
    {
        $resultado = $this->select("SELECT a.*, u.idUser as idusuario, u.name 
                                FROM article as a, user as u 
                                WHERE a.idUser=u.idUser AND status='Aproved'
                                ORDER BY a.createdAt DESC");
    
        $dataSet = $resultado->fetchAll();
        $listaArticle = [];
    
        if ($dataSet) {
            foreach ($dataSet as $data) {
                $article = new Article();
                $article->setIdArticle($data['idArticle']);
                $article->setResume($data['resume']);
                $article->getUser()->setName($data['name']);
                $article->setCreatedAt($data['createdAt']);
                $article->setTitle($data['title']);
    
                $listaArticle[] = $article;
            }
        }
        return $listaArticle;
    }
    
    public function listarCategoria(int $idCategory)
    {
        $resultado = $this->select("SELECT a.*, u.idUser as idusuario, u.name 
                                FROM article as a, user as u WHERE a.idUser=u.idUser AND status='Aproved' AND idCategory= $idCategory ORDER BY a.createdAt DESC");

        $dataSet = $resultado->fetchAll();
        $listaArticle = [];

        if($dataSet){
            foreach ($dataSet as $data) 
            {
                $article = new Article();
                $article->setIdArticle($data['idArticle']);
                $article->setResume($data['resume']);
                $article->getUser()->setName($data['name']);
                $article->setCreatedAt($data['createdAt']);
                $article->setTitle($data['title']);

                $listaArticle[]= $article;
            }
           
        }
        return $listaArticle;
    
        
    }

  

    public function salvar(Article $article)
    {
        try {

            $title           = $article->getTitle();
            $text          = $article->getText();
            $resume          = $article->getResume();
            $image     = $article->getImage();
            $status      = $article->getStatus();
            $idUser   = $article->getUser()->getIdUser();
            $idCategory   = $article->getCategory()->getIdCategory();
         
            return $this->insert(
                'article',
                ":title,:resume,:text,:image,:status,:idUser,:idCategory",
                [
                    ':title'         =>$title,
                    ':resume'        =>$resume,
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
    public function atualizar(Article $article)
{
    try {
        $title = $article->getTitle();
        $text = $article->getText();
        $resume = $article->getResume();
        $image = $article->getImage();
        $status = $article->getStatus();
        $idUser = $article->getUser()->getIdUser();
        $idCategory = $article->getCategory()->getIdCategory();
        $idArticle = $article->getIdArticle(); // Adicione essa linha para obter o ID do artigo

        return $this->update(
            'article',
            "title = :title, resume = :resume, text = :text, image = :image, status = :status, idUser = :idUser, idCategory = :idCategory",
            [
                ':title' => $title,
                ':resume' => $resume,
                ':text' => $text,
                ':image' => $image,
                ':status' => $status,
                ':idUser' => $idUser,
                ':idCategory' => $idCategory,
                ':idArticle' => $idArticle // Adicione essa linha para vincular o ID do artigo na condição WHERE
            ],
            "idArticle = :idArticle"
        );
    } catch (\Exception $e) {
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

    public function aproved(Article $article)
    {
        try {
            $status = "Aproved";
            $idArticle = $article->getIdArticle();
            return $this->update(
                'article',
                "status = :status",
                [
                    ':status' => $status,

                ],
                "idArticle = $idArticle"
            );
            

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function denied(Article $article)
    {
        try {
            $status = "Denied";
            $idArticle = $article->getIdArticle();
            $feedback = $article->getFeedback();
            return $this->update(
                'article',
                "status = :status, feedback =:feedback",
                [
                    ':status' => $status,
                    ':feedback' => $feedback
                ],
                "idArticle = $idArticle"
            );
            

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }


    public  function listarSolicitacoes()
    {
        $resultado = $this->select("SELECT a.*, u.idUser as idusuario, u.name 
        FROM article as a, user as u WHERE a.idUser=u.idUser AND status='Pending'");

        $dataSet = $resultado->fetchAll();
        $listaArticle = [];

        if($dataSet){
        foreach ($dataSet as $data) 
        {
            $article = new Article();
            $article->setIdArticle($data['idArticle']);
            $article->setResume($data['resume']);
            $article->getUser()->setName($data['name']);
            $article->setCreatedAt($data['createdAt']);
            $article->setTitle($data['title']);

            $listaArticle[]= $article;
        }

        }
        return $listaArticle;

    }

    public  function listarArtigos($idUserLog)
    {
            $resultado = $this->select("SELECT * FROM article WHERE idUser='$idUserLog'");
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Article::class);
    }

    public function listarArtigosAprovados($idUserLog)
{
    $resultado = $this->select("SELECT * FROM article WHERE idUser = '$idUserLog' AND status = 'Aproved'");
    return $resultado->fetchAll(\PDO::FETCH_CLASS, Article::class);
}

    public function excluir(int $idArticle)
    {
        try {
            return $this->delete('article', "idArticle = $idArticle");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a artigo. " . $e->getMessage(), 500);
        }
    }
}
