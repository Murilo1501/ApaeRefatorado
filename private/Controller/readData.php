<?php declare(strict_types = 1);


require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class ReadData extends Read{
    
    private string $type;
    private $model;
    public $arrayData;
    
    

    function __construct(? string $userType, $type)
    {
        $this->model = new Crud($userType);
        
        $sucesso = $this->enviarParaModel($this->model, $type);
       
        if($sucesso){
            $this->arrayData = $sucesso;
        } else {
            $this->arrayData = [];
        }
    }
}

