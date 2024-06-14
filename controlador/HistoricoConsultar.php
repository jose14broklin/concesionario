<?php

session_start();

include_once("../modelo/OperacionDB.php");


if(
	isset($_SESSION["nb_cliente"])
){

	$nu_cliente = $_SESSION["nu_cliente"];
	$condicion = "nu_cliente = $nu_cliente";

}else{

	header("location: Catalogo.php");

}

$db = new OperacionDB();


// hacer un despacho
if(
	isset($_POST["pagar"]) && $_POST["pagar"] == 2
){

	$nu_compra = $_POST["nu_compra"];

	$sql = "update compra set in_despacho = 'D', fe_despacho = now() " .
		"where nu_compra = $nu_compra";

	$res = $db->runQuery($sql);

}


// consultar las compras anteriores
$condicion = "nu_cliente = $nu_cliente and in_despacho != 'A'";
$sql = "select * from view_historico_compra where $condicion";
$lista = $db->runSelect($sql);



include_once("../vista/consultar_historico.php");

?>