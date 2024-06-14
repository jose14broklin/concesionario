<!DOCTYPE html>
<html>
<head>
	<title>concesionario web</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<script>

		function calcular(formulario){
			precio = document.getElementById('va_precio'+formulario).value;
			cantidad = document.getElementById('ca_producto'+formulario).value;

			aux = parseInt(precio) * parseInt(cantidad);

			document.getElementById('subtotal'+formulario).value = aux;	
		}

	</script>
</head>
<body style=" margin: auto; background-image:url(../imagenes/carro.jpg) ;" class=" w3-padding w3-text-yellow">


<?php
include_once("../vista/menu_catalogo.php");
?>


<h1 class="w3-center">Consultar bolsa de Compras</h1>

<table class="w3-table-all" style="width: 75%; margin: auto;">
	
	<tr class="w3-black w3-text-yellow">
		<th>#</th>
		<th>Producto</th>
		<th>Precio</th>
		<th>Existencia</th>
		<th>Cantidad</th>
		<th>Subtotal</th>
		<th>Acciones</th>
	</tr>

<?php
for($x=0; $x<count($lista); $x++){
	$bolsa = $lista[$x];
	$vehiculo = $bolsa->getVehiculo();
	$cod_matricula = $vehiculo->getCod_matricula();
	$nb_vehiculo = $vehiculo->getNb_vehiculo();
	$va_precio = $vehiculo->getVa_precio();
	$ca_existencia = $vehiculo->getCa_existencia();
?>

	<form id="eliminar<?=$x?>" name="eliminar" method="post" action="BolsaConsultar.php">
		<input type="hidden" name="eliminar" value="1">
		<input type="hidden" name="cod_matricula" value="<?=$cod_matricula?>">
	</form>

	<form id="comprar<?=$x?>" method="post" action="BolsaConsultar.php">
		<input type="hidden" name="comprar" value="1">
		<input type="hidden" name="cod_matricula" value="<?=$cod_matricula?>">
		<input type="hidden" id="va_precio<?=$x?>" value="<?=$va_precio?>">
	</form>
	
	<tr>
		<td><?=($x+1)?></td>
		<td><?=$nb_vehiculo?></td>
		<td><?=$va_precio?></td>
		<td><?=$ca_existencia?></td>
		<td>
			<input type="number" name="ca_vehiculo" id="ca_vehiculo<?=$x?>" min="1" max="<?=$ca_existencia?>" value="1" form="comprar<?=$x?>" onchange="calcular(<?=$x?>)">
		</td>
		<td>
			<output id="subtotal<?=$x?>" form="comprar<?=$x?>"><?=$va_precio?></output>
		</td>
		<td>
			<input type="image" src="../iconos/bag.png" class="w3-image" form="comprar<?=$x?>">
			&nbsp;&nbsp;
			<input type="image" src="../iconos/delete.png" class="w3-image" form="eliminar<?=$x?>">
		</td>
	</tr>

<?php
}
?>

</table>

<?php
include_once("../vista/ver_mensaje.php");
?>




</body>
</html>
<?php
include_once("../includes/footer.php");
?>