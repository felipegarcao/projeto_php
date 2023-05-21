<?php

namespace App\Models\DAO;

use App\Models\Entidades\Article;
use PDO;

class ArticleDAO
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param int $idArticle
     * @return Article|null
     */
    public function findById(int $idArticle): ?Article
    {
        $query = "SELECT * FROM articles WHERE idArticle = :idArticle";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $this->createArticleFromRow($result);
        }

        return null;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public function save(Article $article): bool
    {
        $query = "INSERT INTO articles (idUser, text, image, feedback, status, idCategory) 
                  VALUES (:idUser, :text, :image, :feedback, :status, :idCategory)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':idUser', $article->getIdUser(), PDO::PARAM_INT);
        $statement->bindParam(':text', $article->getText(), PDO::PARAM_STR);
        $statement->bindParam(':image', $article->getImage(), PDO::PARAM_STR);
        $statement->bindParam(':feedback', $article->getFeedback(), PDO::PARAM_STR);
        $statement->bindParam(':status', $article->getStatus(), PDO::PARAM_STR);
        $statement->bindParam(':idCategory', $article->getIdCategory(), PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * @param array $row
     * @return Article
     */
    private function createArticleFromRow(array $row): Article
    {
        $article = new Article();
        $article->setIdArticle($row['idArticle']);
        $article->setIdUser($row['idUser']);
        $article->setText($row['text']);
        $article->setImage($row['image']);
        $article->setFeedback($row['feedback']);
        $article->setStatus($row['status']);
        $article->setIdCategory($row['idCategory']);

        return $article;
    }
}
