<?php

namespace App\Conn;
use PDO;

class ConnectDb{

    private string $user;
    private string $password;
    public $conn;

    function __construct()
    {
        $this->user = 'root';
        $this->password = '';
        $this->conn = new PDO('mysql:host=localhost;dbname=apae',$this->user,$this->password);


    }




}


