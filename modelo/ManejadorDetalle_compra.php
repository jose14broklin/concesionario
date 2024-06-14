<?php

require_once "OperacionDB.php";
require_once "Detalle_compra.php";
require_once "Compra.php";
require_once "Cliente.php";
require_once "Vehiculo.php";
require_once "Categoria.php";

class ManejadorDetalle_compra {

public function insertarDetalle_compra (Detalle_compra $m) {
	$db = new OperacionDB();
	$query="INSERT INTO detalle_compra (nu_compra,cod_matricula,ca_producto,fe_registro) VALUES (" . 
	"'" . $m->getNu_compra() . "'" . 
	", " . "'" . $m->getCod_matricula() . "'" . 
	", " . "'" . $m->getCa_producto() . "'" . 
	", now()" . 
	")";
	$result = $db->runQuery($query);

	if($result){

		$ca_producto = $m->getCa_producto();
		$cod_matricula = $m->getCod_matricula();
		$sql = "update vehiculo set ca_existencia = ca_existencia - $ca_producto " .
			"where cod_matricula = $cod_matricula";
		$db->runQuery($sql);

		$nu_cliente = $_SESSION['nu_cliente'];
		$sql = "delete from bolsa where nu_cliente = $nu_cliente " .
			"and cod_matricula = $cod_matricula";
		$db->runQuery($sql);

	}
	
	return $result;

}


public function modificarDetalle_compra (Detalle_compra $m) {
	$db = new OperacionDB();
	$query="UPDATE detalle_compra SET nu_compra='" . $m->getNu_compra() . "'" . 
	", " . "cod_matricula='" . $m->getCod_matricula() . "'" . 
	", " . "ca_producto='" . $m->getCa_producto() . "'" . 
	" WHERE 1=1 AND nu_detalle='" . $m->getNu_detalle() . "'";
	$result = $db->runQuery($query);

	return $result;

}


public function eliminarDetalle_compra ($nu_detalle) {
	$db = new OperacionDB();
	$query="DELETE FROM detalle_compra WHERE 1=1 AND nu_detalle='" . $nu_detalle . "'";
	$result = $db->runQuery($query);
	
	return $result;

}


public function buscarDetalle_compra ( $nu_detalle ) {
	$detalle_compra = new Detalle_compra();
	$db = new OperacionDB();
	$query="SELECT nu_detalle, ca_producto, fe_registro, " .
	"nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
	"nb_cliente, co_correo, co_clave, nu_cedula, " .
	"cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, nu_categoria, nb_categoria " .
	"FROM view_detalle_compra WHERE 1=1 AND nu_detalle='" . $nu_detalle . "'";
	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;

		$cliente = new Cliente();
		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);


		$compra = new Compra();
		$compra->setNu_compra($result[$x]["nu_compra"]);
		$compra->setNu_cliente($result[$x]["nu_cliente"]);
		$compra->setFe_compra($result[$x]["fe_compra"]);
		$compra->setIn_despacho($result[$x]["in_despacho"]);
		$compra->setFe_despacho($result[$x]["fe_despacho"]);

		$compra->setCliente($cliente);

		
		$categoria = new Categoria();
		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);


		$vehiculo = new Vehiculo();
		$vehiculo->setCod_matricula($result[$x]["cod_matricula"]);
		$vehiculo->setNb_vehiculo($result[$x]["nb_vehiculo"]);
		$vehiculo->setDe_vehiculo($result[$x]["de_vehiculo"]);
		$vehiculo->setCa_existencia($result[$x]["ca_existencia"]);
		$vehiculo->setVa_precio($result[$x]["va_precio"]);
		$vehiculo->setNu_categoria($result[$x]["nu_categoria"]);
		$vehiculo->setNb_imagen($result[$x]["nb_imagen"]);

		$vehiculo->setCategoria($categoria);

		
		$detalle_compra->setNu_detalle($result[$x]["nu_detalle"]);
		$detalle_compra->setNu_compra($result[$x]["nu_compra"]);
		$detalle_compra->setNu_producto($result[$x]["nu_producto"]);
		$detalle_compra->setCa_producto($result[$x]["ca_producto"]);
		$detalle_compra->setFe_registro($result[$x]["fe_registro"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setVehiculo($vehiculo);

	}

	return $detalle_compra;

}


public function obtenerListaDetalle_compra($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT nu_detalle, ca_producto, fe_registro, " .
	"nu_compra, nu_cliente, fe_compra, in_despacho, fe_despacho, " .
	"nb_cliente, co_correo, co_clave, nu_cedula, " .
	"cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, nu_categoria, nb_categoria, nb_imagen " .
	"FROM view_detalle_compra WHERE $condicion";

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		$cliente = new Cliente();
		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);


		$compra = new Compra();
		$compra->setNu_compra($result[$x]["nu_compra"]);
		$compra->setNu_cliente($result[$x]["nu_cliente"]);
		$compra->setFe_compra($result[$x]["fe_compra"]);
		$compra->setIn_despacho($result[$x]["in_despacho"]);
		$compra->setFe_despacho($result[$x]["fe_despacho"]);

		$compra->setCliente($cliente);

		
		$categoria = new Categoria();
		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);


		$vehiculo = new Vehiculo();
		$vehiculo->setCod_matricula($result[$x]["cod_matricula"]);
		$vehiculo->setNb_vehiculo($result[$x]["nb_vehiculo"]);
		$vehiculo->setDe_vehiculo($result[$x]["de_vehiculo"]);
		$vehiculo->setCa_existencia($result[$x]["ca_existencia"]);
		$vehiculo->setVa_precio($result[$x]["va_precio"]);
		$vehiculo->setNu_categoria($result[$x]["nu_categoria"]);
		$vehiculo->setNb_imagen($result[$x]["nb_imagen"]);

		$vehiculo->setCategoria($categoria);

	
		$detalle_compra = new Detalle_compra();

		$detalle_compra->setNu_detalle($result[$x]["nu_detalle"]);
		$detalle_compra->setNu_compra($result[$x]["nu_compra"]);
		$detalle_compra->setCod_matricula($result[$x]["cod_matricula"]);
		$detalle_compra->setCa_producto($result[$x]["ca_producto"]);
		$detalle_compra->setFe_registro($result[$x]["fe_registro"]);

		$detalle_compra->setCompra($compra);
		$detalle_compra->setVehiculo($vehiculo);


		array_push($arreglo,$detalle_compra);

	}

	return $arreglo;

}
}
?>