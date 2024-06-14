<?php

require_once "Cliente.php";
require_once "Vehiculo.php";

class Bolsa {

	private $nu_cliente;
	private $cod_matricula;
	private $fe_registro;

	private $cliente;
	private $vehiculo;


	public function __construct() {	} 

	public function setNu_cliente($nu_cliente) {
	if ($nu_cliente != null) $this->nu_cliente = $nu_cliente;
	}

	public function setCod_matricula($cod_matricula) {
	if ($cod_matricula != null) $this->cod_matricula = $cod_matricula;
	}

	public function setFe_registro($fe_registro) {
	if ($fe_registro != null) $this->fe_registro = $fe_registro;
	}


	public function setCliente(Cliente $cliente) {
	$this->cliente = $cliente;
	}

	public function setVehiculo(Vehiculo $vehiculo) {
	$this->vehiculo = $vehiculo;
	}

	public function getNu_cliente() { return $this->nu_cliente; }

	public function getCod_matricula() { return $this->cod_matricula; }

	public function getFe_registro() { return $this->fe_registro; }

	public function getCliente() { return $this->cliente; }

	public function getVehiculo() { return $this->vehiculo; }


	public function __toString(){
		return "Clase: Bolsa" . 
		"<br>nu_cliente=" . $this->nu_cliente . 
		"<br>cod_matricula=" . $this->cod_matricula . 
		"<br>fe_registro=" . $this->fe_registro;
	}

}

?>