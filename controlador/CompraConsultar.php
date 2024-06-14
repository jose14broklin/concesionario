<?php

session_start();

include_once("../modelo/ManejadorDetalle_compra.php");


if(
	isset($_SESSION["nb_cliente"])
){

	$nu_cliente = $_SESSION["nu_cliente"];
	$condicion = "nu_cliente = $nu_cliente";

}else{

	header("location: Catalogo.php");

}


// efectuar el pago
if(
	isset($_POST["pagar"]) && $_POST["pagar"] == 1
){

	$nu_compra = $_POST["nu_compra"];
	$sql = "update compra set in_despacho = 'C' where nu_compra = $nu_compra";

	$bd = new OperacionDB();
	$res = $bd->runQuery($sql);

}

// efectuar el despacho



$manejador = new ManejadorDetalle_compra();

// consultar la compra activa
$condicion = "nu_cliente = $nu_cliente and in_despacho = 'A'";
$lista = $manejador->obtenerListaDetalle_compra($condicion);


include_once("../vista/consultar_compra.php");

?>