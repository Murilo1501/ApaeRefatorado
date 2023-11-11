<?php

session_start();
session_unset();
session_destroy();
header("Location:/Novo_APAE/public");
exit();

?>