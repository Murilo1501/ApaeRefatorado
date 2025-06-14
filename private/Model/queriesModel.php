<?php

use App\Conn\ConnectDb;

$pdo = new ConnectDb();


function insert(string $type, array $data)
{
    global $queries,$pdo;

    switch($type){
        case "comum":
            $stm = $queries['comum']['insert'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindParam(1,$data['Nome']);
            $resultStm->bindParam(2,$data['Email']);
            $resultStm->bindParam(3,$data['CEP']);
            $resultStm->bindParam(4,$data['CPF']);
            $resultStm->bindParam(5,$data['DataDeNascimento']);
            $resultStm->bindParam(6,$data['Senha']);
            $resultStm->bindParam(7,$data['endereco']);
            $resultStm->bindParam(8,$data['complemento']);
            $resultStm->bindParam(9,$data['Numero']);
            $resultStm->bindParam(10,$data['DataDeVencimento']);
            $resultStm->bindParam(11,$data['nivel']);
          
            return $resultStm->execute() ? true:false;
         
           
        break;

        case "admin":
            $stm = $queries['admin']['insert'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "empresas":
            $stm = $queries['empresas']['insert'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "produtos":
            $stm = $queries['produtos']['insert'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "noticias":
            $stm = $queries['noticias']['insert'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;
        
            
    }
}

function update(string $type){
    global $queries,$pdo;

    switch($type){
        case "comum":
            $stm = $queries['comum']['update'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "admin":
            $stm = $queries['admin']['update'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "empresas":
            $stm = $queries['empresas']['update'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "produtos":
            $stm = $queries['produtos']['update'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "noticias":
            $stm = $queries['noticias']['update'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;
        
            
    }
}

function read(string $type){
    global $queries,$pdo;

    switch($type){
        case "comum":
            $stm = $queries['comum']['select'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "admin":
            $stm = $queries['admin']['select'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "empresas":
            $stm = $queries['empresas']['select'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "produtos":
            $stm = $queries['produtos']['select'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "noticias":
            $stm = $queries['noticias']['select'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->execute();
            $eventsNot = $resultStm->fetchAll(PDO::FETCH_ASSOC);
            return $eventsNot;
        break;

   
        
        
            
    }
}

function delete(string $type){
    global $queries,$pdo;

    switch($type){
        case "comum":
            $stm = $queries['comum']['delete'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "admin":
            $stm = $queries['admin']['delete'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "empresas":
            $stm = $queries['empresas']['delete'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "produtos":
            $stm = $queries['produtos']['delete'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;

        case "noticias":
            $stm = $queries['noticias']['delete'];
            $resultStm = $pdo->conn->prepare($stm);
            $resultStm->bindValue(1,"produto");
            $resultStm->bindValue(2,"desc produto");
            $resultStm->bindValue(3,"200");
            $resultStm->execute();
        break;
        
            
    }
}

function logar($data):bool|string{
    global $pdo,$queries;

    $stm = $queries['login'];
    $resultStm = $pdo->conn->prepare($stm);
    $resultStm->bindParam(1,$data['EmailLogin']);
    $resultStm->execute();


    if($resultStm->rowCount() > 0){
        $user = $resultStm->fetch();
        //var_dump($user);

        if($data['SenhaLogin'] == $user['senha']){
            return $user['nivel'];
        }
        
    } 

    return false;
    

}



