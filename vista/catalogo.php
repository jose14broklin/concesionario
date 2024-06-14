<!DOCTYPE html>
<html>
<head>
	<title>concesionario</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css"> 
	<link rel="stylesheet" type="text/css" href="../estilos/styles.css">
	
</head>
<body  style=" margin: auto; background-image:url(../imagenes/carro.jpg) ;" class=" w3-padding w3-text-yellow">

<?php
include_once("../includes/header.php");
?>

<h1 class="w3-center">Cat&aacute;logo</h1>
<div style="width: 50%; margin: auto;" class="w3-black w3-padding w3-text-yellow">
	<form name="filtro" method="post" action="Catalogo.php">
		<label>Categor&iacute;a:</label>
		<?=$combo?>
		<p class="w3-center">
			<button class="w3-black w3-text-yellow">Filtrar</button>
		</p>
	</form>
</div>


<div style="width: 75%; margin: auto;" class="w3-padding w3-black w3-center">
	
	<table class="" style="width: 99%;">

<?php

$item = 0;
for($a=0; $a<count($lista); $a++){

	$vehiculo = $lista[$a];
	$cod_matricula = $vehiculo->getCod_matricula(); 
	$nb_imagen = $vehiculo->getNb_imagen(); 
	$nb_vehiculo = $vehiculo->getNb_vehiculo(); 
	$va_precio = $vehiculo->getVa_precio(); 
	$ca_existencia = $vehiculo->getCa_existencia(); 

	if($item == 0) echo "<tr>";
	$item++;
?>		

	<td class="w3-padding w3-black">
		<p class="w3-padding">
			<img src="../imagenes/<?=$nb_imagen?>" class="w3-image w3-padding" style="height: 100%;">
		</p>
		<p>
			Vehiculo: <?=$nb_vehiculo?>
			<br>
			Existencia: <?=$ca_existencia?>
			<br>
			<span class="w3-xlarge">$ <b><?=$va_precio?></b></span>
		</p>
		<?php
		if(isset($_SESSION["nb_cliente"])){
		?>
			<form class="w3-black" action="Catalogo.php" method="post" name="bolsa<?=$cod_matricula?>">
				<input type="hidden" name="cod_matricula" value="<?=$cod_matricula?>">
				<input type="hidden" name="bolsa" value="1">
				<p class="w3-center">
					<input type="image" src="../iconos/carrito.png" class="w3-image">
				</p>
			</form>
		<?php
		}
		?>
	</td>	

<?php
	if($item == 4){
		echo "</tr>";
		$item = 0;
	}

}

?>		

	</table>

</div>


<?php
include_once("../includes/footer.php");
?>


</body>
</html>