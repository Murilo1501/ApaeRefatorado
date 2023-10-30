<?php

namespace App\Model;
require_once 'queriesModel.php';

class Login{


    public function login($data)
    {
       $userLevel =  logar($data);

       return $userLevel ? $userLevel:false;
    }
}