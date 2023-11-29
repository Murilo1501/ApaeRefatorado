<?php

namespace App\Controller;
use App\Model\LoginModel;
use App\View\View;

class LoginController{
    private $crud;
    private $view;

    function __construct()
    {
        $this->crud = new LoginModel;
        $this->view = new View();
    }

    public function show()
    {
        require_once '../../View/beforeLogin/login.php';
        //$page = $this->view->view('admin','index');
        //require_once $page;
    }

    public function logar()
    {
        $data = $_POST;


        $user = $this->crud->login($data);
        //echo $login;
        if($user){
            session_start();
            $_SESSION['email'] = $user;
            header("Location:?nivel=".$user['nivel']."");
        }
    }
}