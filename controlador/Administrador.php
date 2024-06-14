<?php

session_start();

if(
	!isset($_SESSION['co_login'])
){

	header("location: Acceso.php");

}


include("../vista/administrador.php");


?>