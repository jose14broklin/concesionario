<?php

session_start();

include_once("../modelo/ManejadorBolsa.php");
include_once("../modelo/ManejadorCompra.php");
include_once("../modelo/ManejadorDetalle_compra.php");


$lista = [];
$condicion = "1=1";

if(
	isset($_SESSION["nb_cliente"])
){

	$nu_cliente = $_SESSION["nu_cliente"];
	$condicion = "nu_cliente = $nu_cliente";

}else{

	header("location: Catalogo.php");

}

$manejador = new ManejadorBolsa();


// pasos para eliminar un vehiculo de la  bolsa
if(
	isset($_POST["eliminar"]) && $_POST["eliminar"] == 1
){
	$cod_matricula = $_POST["cod_matricula"];

	$res = $manejador->eliminarBolsa($nu_cliente, $cod_matricula);
	if($res)
		$mensaje = "Vehiculo eliminado satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error al eliminar";

}

$manejador_compra = new ManejadorCompra();

if(
	isset($_POST["comprar"]) && $_POST["comprar"] == 1
){

	$cond = "nu_cliente = $nu_cliente and in_despacho = 'A'";
	$compras = $manejador_compra->obtenerListaCompra($cond);

	if(count($compras) == 0){

		$compra = new Compra();
		$compra->setNu_cliente($nu_cliente);
		$compra->setIn_despacho('A');

		$manejador_compra->insertarCompra($compra);

	}


	$compras = $manejador_compra->obtenerListaCompra($cond);
	$compra = $compras[0];

	$nu_compra = $compra->getNu_compra();
	$cod_matricula = $_POST["cod_matricula"];
	$ca_producto = $_POST["ca_producto"];

	$detalle_compra = new Detalle_compra();
	$detalle_compra->setNu_compra($nu_compra);
	$detalle_compra->setCod_matricula($cod_matricula);
	$detalle_compra->setCa_producto($ca_producto);

	$manejador_detalle = new ManejadorDetalle_compra();
	$res = $manejador_detalle->insertarDetalle_compra($detalle_compra);

	if($res)
		$mensaje = "Producto(s) agregado(s) a su compra";
	else
		$mensaje = "Ha ocurrido un error durante la compra";

}

$lista = $manejador->obtenerListaBolsa($condicion);


include_once("../vista/consultar_Bolsa.php");

?>