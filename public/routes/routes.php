<?php declare(strict_types=1);

require_once '../../private/Controller/cadastro.php';
require_once '../../private/Controller/login.php';
require_once '../../private/Controller/readData.php';
require_once '../../private/Controller/atualizar.php';
require_once '../../private/Controller/Forgetpass.php';
require_once '../../private/Controller/AlterarSenha.php';
//Type of user
$userType = $_REQUEST['user'];

//Login do CRUD
if (isset($_REQUEST['isLogin']) && $_REQUEST['isLogin']==1) {
    session_start();
    session_unset();
    session_destroy();
    new Login($_POST);
    exit();
}

//Insert do CRUD
if (isset($_REQUEST['isCadastro']) && $_REQUEST['isCadastro']==1) {
    new Cadastro($_POST,$userType);
    exit();
}


//Update do CRUD
if (isset($_REQUEST['isUpdate']) && $_REQUEST['isUpdate']==1) {
    new Atualizar($_POST);
    exit();
}

if(isset($_REQUEST['sendEmail'])&& $_REQUEST['sendEmail']==1){
    new SendEmail($_POST);
    exit();
}

if(isset($_REQUEST['changeSenha'])&& $_REQUEST['changeSenha']==1){
    new AlterarSenha($_POST);
    exit();
}




   
  
    
   // var_dump($_POST);
    //$login = new Login($_POST);

  
// }

//Caso não seja nenhum redirecionar para logout
// header('Location: logout.php');

?>