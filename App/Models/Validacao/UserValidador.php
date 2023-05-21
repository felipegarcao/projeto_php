<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\User;

class UserValidador{

    public function validar(User $usuario)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($usuario->getName()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}