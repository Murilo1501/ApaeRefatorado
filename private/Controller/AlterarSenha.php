<?php

require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

class AlterarSenha extends ChangeSenha{

    private $dado;
    private $model;

    function __construct($dataAlter)
    {
        $this->model =  new Crud();

        $this->dado = $this->filterInput($dataAlter,"comum");
        $modelReturn = $this->enviarParaModel($this->dado,$this->model);
      
        if($modelReturn){
            header('Location: /Novo_APAE/public/beforeLogin/login.php?f=2');
        } else{ 
            echo "algo errado2";
        }
    }
}