<?php

namespace App\Model;
require_once 'queriesModel.php';

class Login{


    public function login($data)
    {
       $user =  logar($data);

       return $user ? $user:false;
    }
}