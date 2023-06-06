<?php

namespace App\Models\DAO;

use App\Models\Entidades\Like;
use Exception;

class LikeDAO extends BaseDAO
{

    public function getLikeCountByArticleId($idArticle)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as likeCount FROM likes WHERE idArticle = " . $idArticle
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet) {
            return $dataSet['likeCount'];
        }
    
        return 0;
    }
    
    public function isLikedByUser($idArticle, $idUser)
    {
        $resultado = $this->select(
            'SELECT COUNT(*) AS count
            FROM likes
            WHERE idArticle = :idArticle AND idUser = :idUser',
            [':idArticle' => $idArticle, ':idUser' => $idUser]
        );
    
        $dataSet = $resultado->fetch();
    
        return $dataSet['count'] > 0;
    }
    
    public function addLike($idArticle, $idUser)
    {
        try {
            $this->insert(
                'likes',
                'idArticle, idUser',
                [':idArticle' => $idArticle, ':idUser' => $idUser]
            );
    
            return true;
        } catch (Exception $e) {
            throw new Exception('Erro ao adicionar o like: ' . $e->getMessage());
        }
    }
    
    public function save(Like $like)
    {
        try {
            $idUser = $like->getUser()->getIdUser();
            $idArticle = $like->getArticle()->getIdArticle();

            return $this->insert(
                'likes',
                'idUser, idArticle',
                [':idUser' => $idUser, ':idArticle' => $idArticle]
            );
        } catch (Exception $e) {
            throw new Exception('Erro ao salvar o like: ' . $e->getMessage());
        }
    }

    public function removeLike($idArticle, $idUser)
    {
        $this->delete(
            'likes',
            'idArticle = :idArticle AND idUser = :idUser',
            [':idArticle' => $idArticle, ':idUser' => $idUser]
        );
    }
    
}
