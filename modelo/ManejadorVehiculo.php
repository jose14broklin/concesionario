
<?php


require_once "OperacionDB.php";
require_once "Vehiculo.php";

require_once "Categoria.php";

class ManejadorVehiculo {

public function insertarVehiculo (Vehiculo $m) {
	$db = new OperacionDB();
	$query="INSERT INTO vehiculo (nb_vehiculo,ca_existencia,va_precio,nu_categoria,de_vehiculo,nb_imagen) ".
	"VALUES (" . "'" . $m->getNb_vehiculo() . "'" . 
	", " . "'" . $m->getCa_existencia() . "'" . 
	", " . "'" . $m->getVa_precio() . "'" . 
	", " . "'" . $m->getNu_categoria() . "'" . 
	", " . "'" . $m->getDe_vehiculo() . "'" . 
	", " . "'" . $m->getNb_imagen() . "'" . 
	")";
	
	$result = $db->runQuery($query);

	if($result) $this->uploadFile();

	return $result;
}


private function uploadFile(){
	$target_dir = "../imagenes/";
	$target_file = $target_dir . basename($_FILES["nb_imagen"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["nb_imagen"]["tmp_name"]);
		if($check !== false) {
			echo "Formato del archivo - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "El archivo adjunto no es una imagen.";
			$uploadOk = 0;
		}
	}

	if (file_exists($target_file)) {
		echo "El archivo ya existe.";
		$uploadOk = 0;
	}

	if ($_FILES["nb_imagen"]["size"] > 50000000) {
		echo "El archivo es muy largo (solo se admite 500Kb).";
		$uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Formatos permitidos: JPG, JPEG, PNG & GIF.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {

		echo "El archivo no fue cargado.";
		

	} else {

		if (move_uploaded_file($_FILES["nb_imagen"]["tmp_name"], $target_file)) {
			echo "El archivo ". htmlspecialchars( basename( $_FILES["nb_imagen"]["name"])). " se ha cargado satisfactoriamente.";
		} else {
			echo "Ha ocurrido un error durante la carga del archivo.";
		}

	}

	return ($uploadOk == 1);

} 

public function modificarVehiculo (Vehiculo $m) {
	$db = new OperacionDB();
	$query="UPDATE vehiculo SET nb_vehiculo='" . $m->getNb_vehiculo() . "'" . 
	", " . "ca_existencia='" . $m->getCa_existencia() . "'" . 
	", " . "va_precio='" . $m->getVa_precio() . "'" . 
	", " . "nu_categoria='" . $m->getNu_categoria() . "'" . 
	", " . "de_vehiculo='" . $m->getDe_vehiculo() . "'" . 
	", " . "nb_imagen='" . $m->getNb_imagen() . "'" . 
	" WHERE cod_matricula='" . $m->getCod_matricula() . "'";
	$result = $db->runQuery($query);
	return $result;
}


public function eliminarVehiculo ($cod_matricula) {
	$db = new OperacionDB();
	$query="DELETE FROM vehiculo WHERE cod_matricula='" . $cod_matricula . "'";
	$result = $db->runQuery($query);
	return $result;
}


public function buscarVehiculo ( $cod_matricula ) {
	$vehiculo = new Vehiculo();
	$db = new OperacionDB();
	$query="SELECT cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, ".
	"nu_categoria, nb_categoria, nb_imagen FROM view_vehiculo WHERE cod_matricula='" . $cod_matricula . "'";
	$result = $db->runSelect($query);
	
	if (count($result) > 0) {

		$x=0;

		$categoria = new Categoria();

		$categoria->setNu_categoria($result[$x]["nu_categoria"]);
		$categoria->setNb_categoria($result[$x]["nb_categoria"]);

		$vehiculo->setCod_matricula($result[$x]["cod_matricula"]);
		$vehiculo->setNb_vehiculo($result[$x]["nb_vehiculo"]);
		$vehiculo->setDe_vehiculo($result[$x]["de_vehiculo"]);
		$vehiculo->setCa_existencia($result[$x]["ca_existencia"]);
		$vehiculo->setVa_precio($result[$x]["va_precio"]);
		$vehiculo->setNu_categoria($result[$x]["nu_categoria"]);
		$vehiculo->setNb_imagen($result[$x]["nb_imagen"]);
		
		$vehiculo->setCategoria($categoria);

	}

	return $vehiculo;

}


public function obtenerListaVehiculo($condicion='1=1') {
	$arreglo=array();
	$db = new OperacionDB();
	$query="SELECT cod_matricula, nb_vehiculo, de_vehiculo, ca_existencia, va_precio, ".
	"nu_categoria, nb_categoria, nb_imagen FROM view_vehiculo WHERE $condicion";
	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

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

		array_push($arreglo,$vehiculo);

	}

	return $arreglo;

}
}
?>