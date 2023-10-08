<?php declare(strict_types=1);


require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class ReadData extends Read{
    private $model;
    public $arrayData;

    function __construct(string $user)
    {
        $this->model = new Crud();

        $sucesso = $this->enviarParaModel($user,$this->model);
        
        if($sucesso){
            $this->arrayData = $sucesso;
        } else {
            $this->arrayData = [];
        }
    }
}

