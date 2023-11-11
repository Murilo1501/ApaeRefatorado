<?php

namespace App\Controller;
use App\Model\UserAdmin;

class AdminController implements Controller{

    private $userAdmin;

    function __construct()
    {
        $this->userAdmin = new UserAdmin();
    }
    public function index()
    {
        $dataAll = $this->userAdmin->modelRead();
        require_once '../View/afterLogin/admin/lista_usuarios.php';
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function count()
    {
        $data = $this->userAdmin->modelRead();
        require_once '../View/afterLogin/admin/index.php';
      
    }

    public function show()
    {
        header("Location:admin");
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