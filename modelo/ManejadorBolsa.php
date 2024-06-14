<?php

require_once "OperacionDB.php";
require_once "Bolsa.php";
require_once "Cliente.php";
require_once "Vehiculo.php";
require_once "Categoria.php";


class ManejadorBolsa {

public function insertarBolsa (Bolsa $m) {
	$db = new OperacionDB();
	$query="INSERT INTO bolsa (nu_cliente,cod_matricula,fe_registro) VALUES (" . 
	"'" . $m->getNu_cliente() . "'" . ", " . 
	"'" . $m->getCod_matricula() . "'" . ", " . 
	"now()" .
	")";

	$result = $db->runQuery($query);

	return $result;

}


public function modificarBolsa (Bolsa $m) {
	$db = new OperacionDB();
	$query="UPDATE bolsa SET nu_cliente='" . $m->getNu_cliente() . "'" . 
	", " . "cod_matricula='" . $m->getCod_matricula() . "'" . 
	", " . "fe_registro=now()" . 
	" WHERE 1=1 AND nu_cliente='" . $m->getNu_cliente() . "'" . 
	" AND cod_matricula='" . $m->getCod_matricula() . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function eliminarBolsa ($nu_cliente, $cod_matricula) {
	$db = new OperacionDB();
	$query="DELETE FROM bolsa WHERE nu_cliente='" . $nu_cliente . "'" . 
	" AND cod_matricula='" . $cod_matricula . "'";
	$result = $db->runQuery($query);

	return $result;

}


public function buscarBolsa ( $nu_cliente, $cod_matricula ) {
	$bolsa = new Bolsa();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula, " .
	"cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, nb_imagen, " .
	"nu_categoria, nb_categoria, fe_registro FROM view_bolsa " .
	"WHERE nu_cliente='" . $nu_cliente . "'" . " AND cod_matricula='" . $cod_matricula . "'";
	$result = $db->runSelect($query);

	if (count($result)) {

		$x=0;

		$cliente = new Cliente();

		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

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


		$x=0;
		$bolsa->setNu_cliente($result[$x]["nu_cliente"]);
		$bolsa->setCod_matricula($result[$x]["cod_matricula"]);
		$bolsa->setFe_registro($result[$x]["fe_registro"]);

		$bolsa->setCliente($cliente);
		$bolsa->setVehiculo($vehiculo);


	}

	return $bolsa;

}


public function obtenerListaBolsa($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT nu_cliente, nb_cliente, co_correo, co_clave, nu_cedula, " .
	"cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, nb_imagen, " .
	"nu_categoria, nb_categoria, fe_registro FROM view_bolsa " .
	"WHERE $condicion";
	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		$cliente = new Cliente();

		$cliente->setNu_cliente($result[$x]["nu_cliente"]);
		$cliente->setNb_cliente($result[$x]["nb_cliente"]);
		$cliente->setCo_correo($result[$x]["co_correo"]);
		$cliente->setCo_clave($result[$x]["co_clave"]);
		$cliente->setNu_cedula($result[$x]["nu_cedula"]);

		$categoria = new Categoria();

		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		$vehiculo = new Vehiculo();

		$vehiculo->setCod_matricula($result[$x]["cod_matricula"]);
		$vehiculo->setNb_vehiculo($result[$x]["nb_vehiculo"]);
		$vehiculo->setCa_existencia($result[$x]["ca_existencia"]);
		$vehiculo->setVa_precio($result[$x]["va_precio"]);
		$vehiculo->setNu_categoria($result[$x]["nu_categoria"]);
		$vehiculo->setDe_vehiculo($result[$x]["de_vehiculo"]);
		$vehiculo->setNb_imagen($result[$x]["nb_imagen"]);

		$vehiculo->setCategoria($categoria);


		$bolsa = new Bolsa();

		$bolsa->setNu_cliente($result[$x]["nu_cliente"]);
		$bolsa->setCod_matricula($result[$x]["cod_matricula"]);
		$bolsa->setFe_registro($result[$x]["fe_registro"]);

		$bolsa->setCliente($cliente);
		$bolsa->setVehiculo($vehiculo);

		array_push($arreglo,$bolsa);

	}

	return $arreglo;
}
}
?>
