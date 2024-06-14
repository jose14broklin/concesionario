<?php
require_once "Categoria.php";

class Vehiculo {

	private $cod_matricula;
	private $nb_vehiculo;
	private $ca_existencia;
	private $va_precio;
	private $nu_categoria;
	private $de_vehiculo;
	private $nb_imagen;
	private $categoria;

	public function __construct() {	} 

	public function setCod_matricula($cod_matricula) {
	if ($cod_matricula != null) $this->cod_matricula = $cod_matricula;
	}

	public function setNb_vehiculo($nb_vehiculo) {
	if ($nb_vehiculo != null) $this->nb_vehiculo = $nb_vehiculo;
	}

	public function setCa_existencia($ca_existencia) {
	if ($ca_existencia != null) $this->ca_existencia = $ca_existencia;
	}

	public function setVa_precio($va_precio) {
	if ($va_precio != null) $this->va_precio = $va_precio;
	}

	public function setNu_categoria($nu_categoria) {
	if ($nu_categoria != null) $this->nu_categoria = $nu_categoria;
	}

	public function setDe_vehiculo($de_vehiculo) {
	if ($de_vehiculo != null) $this->de_vehiculo = $de_vehiculo;
	}

	public function setNb_imagen($nb_imagen) {
	if ($nb_imagen != null) $this->nb_imagen = $nb_imagen;
	}

	public function setCategoria(Categoria $categoria) {
	$this->categoria = $categoria;
	}

	public function getCod_matricula() { return $this->cod_matricula; }

	public function getNb_vehiculo() { return $this->nb_vehiculo; }

	public function getCa_existencia() { return $this->ca_existencia; }

	public function getVa_precio() { return $this->va_precio; }

	public function getNu_categoria() { return $this->nu_categoria; }

	public function getDe_vehiculo() { return $this->de_vehiculo; }

	public function getNb_imagen() { return $this->nb_imagen; }

	public function getCategoria() { return $this->categoria; }

	
	public function __toString(){
		return "Clase: Vehiculo" . 
		"<br>cod_matricula=" . $this->cod_matricula . 
		"<br>nb_vehiculo=" . $this->nb_vehiculo . 
		"<br>ca_existencia=" . $this->ca_existencia . 
		"<br>va_precio=" . $this->va_precio . 
		"<br>nu_categoria=" . $this->nu_categoria . 
		"<br>de_vehiculo=" . $this->de_vehiculo;
	}

}
?>