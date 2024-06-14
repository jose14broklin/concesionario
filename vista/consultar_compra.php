<!DOCTYPE html>
<html>
<head>
	<title>bolsa</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
</head>
<body style=" margin: auto; background-image:url(../imagenes/carro.jpg) ;" class=" w3-padding w3-text-yellow">

<?php
include_once("../vista/menu_catalogo.php");
?>

<h1 class="w3-center">Compra</h1>

<table class="w3-table-all" style="width: 90px; margin: auto;">
	
	<tr class="w3-black w3-text-yellow">
		<th>#</th>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Precio</th>
		<th>Subtotal</th>
	</tr>

<?php

$total = 0;
$contador = 0;
for($x=0; $x < count($lista); $x++){

	$detalle = $lista[$x];
	$compra = $detalle->getCompra();
	$vehiculo = $detalle->getVehiculo();

	$nu_compra = $compra->getNu_compra();
	$nb_vehiculo = $vehiculo->getNb_vehiculo();
	$va_precio = $vehiculo->getVa_precio();
	$ca_producto = $detalle->getCa_producto();

	$subtotal = $va_precio * $ca_producto;
	$contador += $ca_producto;
	$total += $subtotal; 

?>

	<tr>
		<td><?=($x+1)?></td>
		<td><?=$nb_vehiculo?></td>
		<td><?=$ca_producto?></td>
		<td><?=$va_precio?></td>
		<td><?=$subtotal?></td>
	</tr>

<?php
}

if(count($lista) > 0){

?>


	<tr class="w3-pale-blue">
		<th colspan="2" class="w3-center">TOTAL</th>
		<th><?=$contador?></th>
		<th>...</th>
		<th><?=$total?></th>
	</tr>

</table>

<form name="pagarCompra" id="pagarCompra" method="post" action="CompraConsultar.php">
	<input type="hidden" name="pagar" value="1">
	<input type="hidden" name="nu_compra" value="<?=$nu_compra?>">
</form>
<form name="despachar" id="despachar" method="post" action="CompraConsultar.php">
	<input type="hidden" name="pagar" value="2">
	<input type="hidden" name="nu_compra" value="<?=$nu_compra?>">
</form>

<p class="w3-center w3-padding">
	
	<input type="image" src="../iconos/pagar.png" class="w3-image" form="pagarCompra" title="Haga click para pagar" style="height: 40px;">

	&nbsp;&nbsp;

	<input type="image" src="../iconos/despachar.png" class="w3-image" form="despachar" title="Haga click para despachar" style="height: 40px;">

</p>

<?php
include_once("../includes/footer.php");
?>
	<?php
}
?>

</body>
</html>