<?php

namespace App\Model;
use App\Model\CrudQueries;
require_once 'queriesModel.php';

class Login{


    public function login($data)
    {
       $user =  CrudQueries::logar($data);

       return $user ? $user:false;
    }
}