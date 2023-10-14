<?php declare(strict_types=1); //Forçar strict

require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class Atualizar extends Update {
    private $model;
    private $dados;
    private $path;

    function __construct(array $inputs) {
        //Crud
        $this->model = new Crud();

        $this->path = $inputs['path'];
        unset($inputs['path']);

        // unset($inputs['complemento']); //Temporariamente removido

        //Filtra os dados
        $this->dados = $this->filterInput($inputs,"admin");

        if(isset($this->dados['Senha']) && $this->dados['Senha']=="") {
            unset($this->dados['Senha']);
        }

        $sucesso = $this->enviarParaModel($this->dados,$this->model);

        if ($sucesso) {
            header('Location: /Novo_APAE/public/afterLogin/'.$this->path.'?email='.$this->dados['email'].'&f=0');
            exit();
        } else {
            //Redireciona para a mesma página com a mensagem de falha
            header('Location: /Novo_APAE/public/afterLogin/'.$this->path.'?email='.$this->dados['email'].'&f=1');
            exit();
        }
    }
}

?>