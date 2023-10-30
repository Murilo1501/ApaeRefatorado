<?php
/*$d = "24/06/2023";
$d = str_replace("/","-",$d);


$d2 = "15/01/2007";
$d2 = str_replace("/","-",$d2);

$dayAtual = date("d-m-Y");

if($d == $dayAtual ){
    echo $d;
} else {
    echo $d2;
}

date_default_timezone_set('America/Sao_Paulo');
echo date('d-m-Y');

*/



$hash = password_hash('teste',PASSWORD_ARGON2ID);
echo $hash;

$teste = password_verify('Mateus123','$argon2id$v=19$m=65536,t=4,p=1$dkozOEVjQnFNVjRobzF3cg$T');
if($teste){
    echo 'senhas compatíveis';
} else{
    echo 'Senhas não bate com o hash';
}


$cor = 'azul';
$outra = 'cor';
$cor;    