<?php

session_start();

include_once("../modelo/ManejadorVehiculo.php");
include_once("../modelo/ManejadorCategoria.php");
include_once("../modelo/ManejadorBolsa.php");


$man_categoria = new ManejadorCategoria();
$manejador = new ManejadorVehiculo();

$condicion = "1=1";
$nu_categoria = 0;


if(
	isset($_SESSION["nu_cliente"])
){

	$nu_cliente = $_SESSION["nu_cliente"];
	$condicion = "cod_matricula not in (".
		"select cod_matricula from bolsa where nu_cliente = $nu_cliente" .
		")";

}

if(
	isset($_POST["bolsa"]) && $_POST["bolsa"] == 1
){

	$nu_cliente = $_SESSION["nu_cliente"];
	$cod_matricula = $_POST["cod_matricula"];

	$bolsa = new Bolsa();
	$bolsa->setNu_cliente($nu_cliente);
	$bolsa->setCod_matricula($cod_matricula);

	// guardar en la bolsa
	$man_bolsa = new ManejadorBolsa();
	$res = $man_bolsa->insertarBolsa($bolsa);

}


if(
	isset($_POST["nu_categoria"]) && $_POST["nu_categoria"] > 0
){

	$nu_categoria = $_POST["nu_categoria"];
	$condicion .= " and nu_categoria = $nu_categoria";

}


$lista = $manejador->obtenerListaVehiculo($condicion);
$combo = $man_categoria->comboCategoria($nu_categoria);


include_once("../vista/catalogo.php");

?>