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
    
    public function createLike($idArticle, $idUser)
    {
        try {
            return $this->insert(
                'likes',
                ":idArticle, :idUser",
                [
                    ':idArticle' => $idArticle,
                    ':idUser' => $idUser
                ]
            );
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }
    
    public function deleteLike($idArticle, $idUser)
    {
        try {
            return $this->delete('likes', "idArticle = $idArticle AND idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o like. " . $e->getMessage(), 500);
        }
    }
    
    public function getLikeStatus($idArticle, $idUser)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as likeCount FROM likes WHERE idArticle = $idArticle AND idUser = $idUser"
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet && $dataSet['likeCount'] > 0) {
            return true; // O like existe
        }
    
        return false; // O like não existe
    }
    
        
    
}
