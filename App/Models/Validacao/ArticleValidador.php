<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Article;

class ArticleValidador{

    public function validar(Article $article)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($article->getTitle()))
        {
            $resultadoValidacao->addErro('title',"Este campo não pode ser vazio");
        }

        if(empty($article->getText()))
        {
            $resultadoValidacao->addErro('text',"Este campo não pode ser vazio");
        }


        return $resultadoValidacao;
    }
}