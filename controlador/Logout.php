<?php

session_start();

$_SESSION["nu_cliente"] = "";
$_SESSION["nb_cliente"] = "";
$_SESSION["co_correo"] = "";

session_destroy();


header("location: Catalogo.php");

?>