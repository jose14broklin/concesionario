<?php

require_once "Compra.php";
require_once "Vehiculo.php";


class Detalle_compra {

	private $nu_detalle;
	private $nu_compra;
	private $cod_matricula;
	private $ca_producto;
	private $fe_registro;

	private $compra;
	private $vehiculo;


	public function __construct() {	} 

	public function setNu_detalle($nu_detalle) {
	if ($nu_detalle != null) $this->nu_detalle = $nu_detalle;
	}

	public function setNu_compra($nu_compra) {
	if ($nu_compra != null) $this->nu_compra = $nu_compra;
	}

	public function setCod_matricula($cod_matricula) {
	if ($cod_matricula != null) $this->cod_matricula = $cod_matricula;
	}

	public function setCa_producto($ca_producto) {
	if ($ca_producto!= null) $this->ca_producto = $ca_producto;
	}

	public function setFe_registro($fe_registro) {
	if ($fe_registro != null) $this->fe_registro = $fe_registro;
	}

	public function setCompra(Compra $compra) {
	$this->compra = $compra;
	}

	public function setVehiculo(Vehiculo $vehiculo) {
	$this->vehiculo = $vehiculo;
	}

	public function getNu_detalle() { return $this->nu_detalle; }

	public function getNu_compra() { return $this->nu_compra; }

	public function getCod_matricula() { return $this->cod_matricula; }

	public function getCa_producto() { return $this->ca_producto; }

	public function getFe_registro() { return $this->fe_registro; }

	public function getCompra() { return $this->compra; }

	public function getVehiculo() { return $this->vehiculo; }


	public function __toString(){
		return "Clase: Detalle_compra" . 
		"<br>nu_detalle=" . $this->nu_detalle . 
		"<br>nu_compra=" . $this->nu_compra . 
		"<br>cod_matricula=" . $this->cod_matricula . 
		"<br>ca_producto=" . $this->ca_producto . 
		"<br>fe_registro=" . $this->fe_registro;
	}

} 

?>