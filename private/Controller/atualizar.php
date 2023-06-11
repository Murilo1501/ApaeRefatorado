<?php declare(strict_types=1); //Forçar strict

require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class Atualizar extends Update {
    private $model;
    private $dados;
    private $path;

    function __construct(array $inputs) {
        //Crud
        $this->model = new Crud("admin");
        
        $this->path = $inputs['path'];
        unset($inputs['path']);
        

        //Filtra os dados
        $this->dados = $this->filterInput($inputs,"admin");

       

        $sucesso = $this->enviarParaModel($this->dados,$this->model);

        if ($sucesso) {
            header('Location:../afterLogin/'.$this->path.'?updateFail=0');
            exit();
        } else {
            //Redireciona para a mesma página com a mensagem de falha
           // header('Location:../afterLogin/'.$this->path.'?updateFail=1');
            exit();
        }
    }
}

?>