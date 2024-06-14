<?php

require_once "OperacionDB.php";
require_once "Categoria.php";

class ManejadorCategoria {

	public function insertarCategoria (Categoria $m) {
		
		$db = new OperacionDB();
		$query="INSERT INTO categoria (nb_categoria) VALUES (" . 
			"'" . $m->getNb_categoria() . "'" . ")";
	//echo "query: " . $query;
		$result = $db->runQuery($query);
		
		return $result;

	}


	public function modificarCategoria (Categoria $m) {

		$db = new OperacionDB();
		$query="UPDATE categoria SET nb_categoria='" . $m->getNb_categoria() . "'" . 
		" WHERE nu_categoria='" . $m->getNu_categoria() . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}


	public function eliminarCategoria ($nu_categoria) {

		$db = new OperacionDB();
		$query="DELETE FROM categoria WHERE nu_categoria='" . $nu_categoria . "'";
	//echo "query: " . $query;
		$result = $db->runQuery($query);

		return $result;

	}


	public function buscarCategoria ( $nu_categoria ) {
		$categoria = new Categoria();

		$db = new OperacionDB();
		$query="SELECT nu_categoria, nb_categoria from categoria " .
			"WHERE nu_categoria='" . $nu_categoria . "'";
	//echo "query: " . $query;
		$result = $db->runSelect($query);
		if (count($result)>0) {

			$x=0;
			$categoria->setNu_categoria($result[$x]["nu_categoria"]);
			$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		}

		return $categoria;

	}


	public function obtenerListaCategoria($condicion='1=1') {
		$arreglo=array();

		$db = new OperacionDB();
		$query="SELECT nu_categoria, nb_categoria FROM categoria WHERE $condicion ORDER BY nb_categoria";
	//echo "query: " . $query;
		$result = $db->runSelect($query);

		for($x=0; $x < count($result); $x++) {
			$categoria = new Categoria();

			$categoria->setNu_categoria($result[$x]["nu_categoria"]);
			$categoria->setNb_categoria($result[$x]["nb_categoria"]);

			array_push($arreglo,$categoria);

		}

		return $arreglo;

	}
	

	public function comboCategoria($valor=0){
		$arreglo=$this->obtenerListaCategoria();
		$etiqueta="<select name='nu_categoria' id='nu__categoria' class='w3-select w3-border'>" . 
			"\n<option value=''>Seleccione</option>";

		for($x=0; $x < count($arreglo); $x++){
			$categoria = $arreglo[$x];
			$nu_categoria = $categoria->getNu_categoria();
			$nb_categoria = $categoria->getNb_categoria();
			if($nu_categoria == $valor)
				$sel = " selected ";
			else
				$sel = "";
			$etiqueta .= "\n<option value='" . $nu_categoria . "'" . $sel . ">";
			$etiqueta .= $nb_categoria . "</option >";
		}

		$etiqueta .= "</select>";
		
		return $etiqueta;
	}

}


?>


