<?php
namespace App\Controller;
use App\Model\User;



class UserController implements Controller{

    private $user;

    function __construct()
    {
        $this->user = new user();
    }
  
    public function index()
    {
        
    }

    public function create()
    {
        require_once '../View/beforeLogin/cadastro.php';
    }

    public function store()
    {
        $data = $_POST;
        $insert = $this->user->modelInsert($data);
        if($insert){
            header("Location:/Novo_APAE/public/formulario");
        }

    }

    public function show()
    {
        $levelUser = $_GET['nivel'];
        echo $levelUser;

        header("Location:".$levelUser."");
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

 
}