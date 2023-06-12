<?php declare(strict_types=1); //Forçar strict

// var_dump( file_exists('../Model/crud.php'));
// die();
require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';


final class Cadastro extends Insert {
    private $dados;
    private $model;
    private $path;

    function __construct(array $inputs, string $typeOfUser="AUTH-USER_LV-1~R@@T") {
        //Define o objeto do CRUD
        $this->model = new Crud($typeOfUser); //Abre o CRUD com o nível de acesso do usuário $typeOfUser

        //Define o caminho do arquivo que requisitou
        $this->path = $inputs['path'];
        unset($inputs['path']);

        //Array com os dados filtrados
        $this->dados = $this->filterInput($inputs,$typeOfUser); //Filtra os inputs
        
        //Se houve sucesso no Model
        $sucesso = $this->enviarParaModel($this->dados,$this->model);

        if ($sucesso) {

            $explodedPath = explode("/",$this->path); //Divide em uma array de string, sendo o delimitador a /
            $mainDirectory = $explodedPath[0]; //beforeLogin ou afterLogin

            //Diferenciar para onde ir
            if ($mainDirectory == "beforeLogin") {
                header('Location: /Novo_APAE/public/beforeLogin/login.php');
                exit();
            }
            header('Location: /Novo_APAE/public/'.$this->path.'?f=0');
            exit();
            
        } else {

            //Redireciona para o cadastro com parâmetro f (falha)
            // header('Location: /Novo_APAE/public/'.$this->path.'?f=1');
            exit();

        }
    }

}

