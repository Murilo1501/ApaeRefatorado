<?php
namespace App\Controller;
use App\Controller\Controller;
use App\Model\ComonModel;

require_once 'controller.php';



class ComonController implements Controller{

    private $user;

    function __construct()
    {
        $this->user = new ComonModel();
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
            header("Location:/Novo_APAE/public/");
        }

    }

    public function show()
    {
    
        header("Location:comum");
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