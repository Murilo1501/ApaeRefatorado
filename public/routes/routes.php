<?php declare(strict_types=1);

require_once '../../private/Controller/cadastro.php';
require_once '../../private/Controller/login.php';
require_once '../../private/Controller/readData.php';
require_once '../../private/Controller/atualizar.php';

//Type of user


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
    $userType = $_REQUEST['user'];
    new Cadastro($_POST,$userType);
    exit();
}


//Update do CRUD
if (isset($_REQUEST['isUpdate']) && $_REQUEST['isUpdate']==1) {
    new Atualizar($_POST);
    exit();
}


   
  
    
   // var_dump($_POST);
    //$login = new Login($_POST);

  
// }

//Caso não seja nenhum redirecionar para logout
// header('Location: logout.php');

?>