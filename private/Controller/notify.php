<?php
require_once __DIR__.'/../Model/crud.php';
require_once 'Classes/controlCrud.php';

class Notify extends Notificar{
    
    private $model;
    public $notification;

    function __construct(string $email, string $typeOfUser="AUTH-USER_LV-1~R@@T")
    {
        $this->model = new Crud($typeOfUser);
        $sucesso = $this->enviarParaModel($email,$this->model);

        if($sucesso){
           //echo $sucesso;
           $this->notification = $sucesso;
           
        }else{
            $this->notification =  [];
        }


    }
}