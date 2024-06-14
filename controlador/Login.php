<?php

session_start();

include_once("../modelo/ManejadorCliente.php");


if(
	isset($_POST["control"]) && $_POST["control"] == 999
){

	$co_correo = $_POST["co_correo"];
	$co_clave = $_POST["co_clave"];

	$man = new ManejadorCliente();
	$condicion = "co_correo = '$co_correo' and co_clave = '$co_clave'";

	$lista = $man->obtenerListaCliente($condicion);
	if(count($lista) > 0){

		$cliente = $lista[0];
		$_SESSION["nu_cliente"] = $cliente->getNu_cliente();
		$_SESSION["nb_cliente"] = $cliente->getNb_cliente();
		$_SESSION["co_correo"] = $co_correo;

		header("location: Catalogo.php");

	}else{
		$mensaje = "Usuario no registrado en la base de datos!!!";
	}

}


include_once("../vista/login.php");


?>