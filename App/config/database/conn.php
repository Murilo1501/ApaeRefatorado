<?php

namespace App\Connect;
use PDO;
use Dotenv;
require_once __DIR__.'/../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

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


