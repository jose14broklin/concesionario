<?php

session_start();

include_once("../modelo/OperacionDB.php");

if(
	isset($_POST["control"]) && $_POST["control"] == 666
){

	$co_login = $_POST["co_login"];
	$co_password = $_POST["co_password"];

	$sql = "select * from acceso where co_login = '$co_login' " .
		"and co_password = '$co_password'";

	$op = new OperacionDB();
	$data = $op->runSelect($sql);
	
	if(count($data) > 0){
		$_SESSION["co_login"] = $co_login;

		header("location: Administrador.php");
	}else{
		$mensaje = "Datos del usuario son incorrectos";
	}

}


include_once("../vista/login.php");

?>