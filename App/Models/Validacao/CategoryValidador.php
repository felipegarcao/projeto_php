<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Category;

class CategoryValidador{

    public function validar(Category $category)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($category->getName()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}