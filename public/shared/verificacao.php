<?php
    if ($_SESSION["email"]){
        header("Location: logout.php");
        exit();
    }
?>