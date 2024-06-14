<?php

include_once("../modelo/ManejadorCliente.php");


if(
	isset($_POST["opcion"]) && $_POST["opcion"] == 1
){

	$nb_cliente = $_POST["nb_cliente"];
	$nu_cedula = $_POST["nu_cedula"];
	$co_correo = $_POST["co_correo"];
	$co_clave = $_POST["co_clave"];

	$cliente = new Cliente();

	$cliente->setNb_cliente($nb_cliente);
	$cliente->setCo_correo($co_correo);
	$cliente->setCo_clave($co_clave);
	$cliente->setNu_cedula($nu_cedula);

	$man = new ManejadorCliente();
	$res = $man->insertarCliente($cliente);

	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}


include_once("../vista/registrese.php");

?>