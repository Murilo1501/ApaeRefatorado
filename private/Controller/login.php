<?php declare(strict_types=1);

require_once 'Classes/controlCrud.php';
require_once __DIR__.'/../Model/crud.php';

final class Login extends LoginVerify {
    private $dados;

    function __construct(array $inputs) {
        //Define o objeto do CRUD
        $this->model = new Crud("comum"); //"AUTH-USER_LV"+$userType
        
        //Array com os dados filtrados
        $this->dados = $this->filterInput($inputs,"comum"); //Filtra os inputs

        //Retorno do Model (Nível de acesso // False)
        $modelReturn = $this->enviarParaModel($this->dados,$this->model);

        if ($modelReturn) {
            //Carregar os dados necessários
            session_start();
            $_SESSION["email"] = $inputs["Email"];
            
            //Diferenciar cada usuário e redirecionar para a página certa
            header('Location: /Novo_APAE/public/afterLogin/'.$modelReturn.'/');
            exit();
        } else {
            //Redireciona para o cadastro com parâmetro loginFail
            header('Location: /Novo_APAE/public/beforeLogin/login.php?loginFail=1');
            exit();
        }
    }

}

?>
