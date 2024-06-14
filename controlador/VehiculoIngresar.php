<?php

session_start();

if(
	!isset($_SESSION['co_login'])
){

	header("location: Acceso.php");

}


include_once("../modelo/ManejadorCategoria.php");
include_once("../modelo/ManejadorVehiculo.php");


$man_categoria = new ManejadorCategoria();

$nu_categoria = 0;


if(
	isset($_POST["opcion"]) && $_POST["opcion"] == 1
){

	$nb_vehiculo = $_POST["nb_vehiculo"];
	$de_vehiculo = $_POST["de_vehiculo"];
	$va_precio = $_POST["va_precio"];
	$ca_existencia = $_POST["ca_existencia"];
	$nb_imagen = $_FILES["nb_imagen"]["name"];
	$nu_categoria = $_POST["nu_categoria"];

	$vehiculo = new Vehiculo();
	$vehiculo->setNb_vehiculo($nb_vehiculo);
	$vehiculo->setDe_vehiculo($de_vehiculo);
	$vehiculo->setVa_precio($va_precio);
	$vehiculo->setCa_existencia($ca_existencia);
	$vehiculo->setNb_imagen($nb_imagen);
	$vehiculo->setNu_categoria($nu_categoria);

	$man_vehiculo = new ManejadorVehiculo();
	$res = $man_vehiculo->insertarVehiculo($vehiculo);

	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}


$combo_categoria = $man_categoria->comboCategoria($nu_categoria);


include_once("../vista/ingresar_vehiculo.php");

?>

var_export($_POST)