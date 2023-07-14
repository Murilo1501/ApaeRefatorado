<?php declare(strict_types=1);


require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class ReadData extends Read{
    private $model;
    public $arrayData;

    function __construct(string $user, string $page, string $filter, ?string $userType = "AUTH-USER_LV-1~R@@T")
    {
        $this->model = new Crud($userType);

        $sucesso = $this->enviarParaModel($user,$page,$filter, $this->model);
        
        if($sucesso){
            $this->arrayData = $sucesso;
        } else {
            $this->arrayData = [];
        }
    }
}

