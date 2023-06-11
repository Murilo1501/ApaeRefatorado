<?php

session_start();
session_unset();
session_destroy();
header("Location: ../beforeLogin/login.php");
exit();

?>