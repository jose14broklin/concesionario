<?php

session_start();

if(
	!isset($_SESSION['co_login'])
){

	header("location: Acceso.php");

}
include_once("../modelo/ManejadorCategoria.php");

$man_categoria = new ManejadorCategoria();

if(
	isset($_POST["opcion"]) && $_POST["opcion"] == 1
){

	$nb_categoria = $_POST["nb_categoria"];

	$categoria = new Categoria();

	$categoria->setNb_categoria($nb_categoria);

	$man = new ManejadorCategoria();
	$res = $man->insertarCategoria($categoria);

	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}

include_once("../vista/ingresar_categoria.php");

?>