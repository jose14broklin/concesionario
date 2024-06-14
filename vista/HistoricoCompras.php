<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<link rel="stylesheet" type="text/css" href="../estilos/styles.css">
	
</head>
<body style=" margin: auto; background-image:url(../imagenes/cyber.jpg) ;" class=" w3-padding w3-text-yellow">


<?php
include("menu_administrador.php");

?>

<h1 class="w3-center">Compras Anteriores</h1>

<table class="w3-table-all" style="width: 90%; margin: auto;">
	
	<tr class="w3-black w3-text-yellow">
		<th>Compra</th>
		<th>Fecha</th>
		<th>Despacho</th>
		<th>Fecha de Despacho</th>
		<th>Productos</th>
		<th>Total</th>
		<th>Acciones</th>
	</tr>

<?php

$estatus = [
	"C" => "Pagada",
	"D" => "Despachada"
];

$total = 0;
$contador = 0;
for($x=0; $x < count($lista); $x++){

	$item = $lista[$x];

	$nu_compra = $item["nu_compra"];
	$fe_compra = $item["fe_compra"];

	$aux = date_create($fe_compra);
	$fe_compra = date_format($aux,"d/m/Y");

	$in_despacho = $item["in_despacho"];
	$despacho = $estatus[$in_despacho];

	if($in_despacho == "D"){
		$fe_despacho = $item["fe_despacho"];
		$aux = date_create($fe_despacho);
		$fe_despacho = date_format($aux,"d/m/Y");
	}
	else
		$fe_despacho = "..";
	$ca_productos = $item["ca_productos"];
	$mo_total = $item["mo_total"];

?>

	<tr>
		<td><?=$nu_compra?></td>
		<td><?=$fe_compra?></td>
		<td><?=$despacho?></td>
		<td><?=$fe_despacho?></td>
		<td><?=$ca_productos?></td>
		<td><?=$mo_total?></td>

		<form name="despachar" id="despachar<?=$x?>" method="post" action="HistoricoConsultar.php">
			<input type="hidden" name="pagar" value="2">
			<input type="hidden" name="nu_compra" value="<?=$nu_compra?>">
		<td>
			<?php
			if($in_despacho == "C"){
			?>
				<input type="image" src="../iconos/despachar.png" class="w3-image" form="despachar<?=$x?>" title="Haga click para despachar" style="height: 40px;">
			<?php
			}
			?>
		</td>
		</form>

	</tr>

<?php
}

?>

</table>

<?php
 include_once("ver_mensaje.php");
?>
<?php
include_once("../includes/footer.php");
?>


</body>
</html>