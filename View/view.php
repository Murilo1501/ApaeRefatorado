<?php

namespace App\View;

class View{

    public static  function view(string $typeUser,string $path){
       $ViewPath = "../../View/afterLogin/".$typeUser."/".$path.".php";
       return  $ViewPath;
    }
}