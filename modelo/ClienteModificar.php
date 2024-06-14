<?php

session_start();

include_once("../modelo/cliente                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      .php");
include_once("../modelo/categoria.php");

$nu_categoria = "";

if(
	isset($_POST["opcion"]) && $_POST["opcion"] == 3
){

	$nu_producto = $_POST["cod_matricula"];
	$cond = "cod_matricula = $cod_matricula";
	$filas = listar_vehiculo($cond);

	$vehiculo = $filas[0];
	$nb_vehiculo = $vehiculo["nb_vehiculo"];
	$nu_categoria = $vehiculo["nu_categoria"];
	$nb_categoria = $vehiculo["nb_categoria"];

}

if(
	isset($_POST["opcion"]) && $_POST["opcion"] == 4
){

	$cod_matricula = $_POST["cod_matricula"];
	$nb_vehiculo = $_POST["nb_vehiculo"];
	$nu_categoria = $_POST["nu_categoria"];

	$res = modificar_vehiculo();
	if($res)
		$mensaje = "Datos modificados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}


$combo = combo_categoria($nu_categoria);


include_once("../vista/cliente_modificar.php");

?>