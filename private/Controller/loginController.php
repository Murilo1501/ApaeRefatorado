<?php

namespace App\Controller;
use App\Model\Login;

class LoginController{
    private $crud;

    function __construct()
    {
        $this->crud = new Login();
    }

    public function show()
    {
       require_once '../View/beforeLogin/login.php';
    }

    public function logar()
    {
        $data = $_POST;


        $login = $this->crud->login($data);
        echo $login;
        if($login){
            header("Location:?nivel=".$login."");
        }
    }
}