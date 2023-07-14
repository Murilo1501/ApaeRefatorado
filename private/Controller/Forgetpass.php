<?php

require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

class SendEmail extends EmailSent{

    private $model;

     function __construct($email)
    {
        $this->model =  new Crud('comum');


        $modelReturn = $this->enviarParaModel($email,$this->model);

        if($modelReturn){

            header('Location: /Novo_APAE/public/beforeLogin/esqueciSenha.php?success=1');
            exit();
        } else{ 
            header('Location: /Novo_APAE/public/beforeLogin/esqueciSenha.php?success=0');
            exit();
        }


    }
}