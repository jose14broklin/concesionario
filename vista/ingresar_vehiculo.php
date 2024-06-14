<!DOCTYPE html>
<html>
<head>
	<title>bolsa</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
</head>
<body style="width: 50%; margin: auto; background-image:url(../imagenes/cyber.jpg) ;" class=" w3-padding w3-text-black">


<?php
include("menu_administrador.php");
?>


<h1 class="w3-center">Ingresar Vehiculo</h1>

<div class="w3-black w3-padding" style="width: 80%; margin: auto;">
	
	<form name="ingresar" method="post" action="VehiculoIngresar.php" enctype="multipart/form-data">

		<input type="hidden" name="opcion" value="1">

		<p class="w3-center w3-padding w3-text-yellow">
			<label for="nb_vehiculo">Nombre del Vehiculo</label>
			<input type="text" name="nb_vehiculo" id="nb_vehiculo" maxlength="50" placeholder="Vehiculo" required>
		</p>

		<p class="w3-center w3-padding w3-text-yellow">
			<label for="de_vehiculo">Descripci&oacute;n del Vehiculo</label><br>
			<textarea name="de_vehiculo" id="de_vehiculo" rows="4" cols="30" style="resize: none;" placeholder="Caracteristicas del vehiculo" required></textarea>
		</p>

		<p class="w3-center w3-padding w3-text-yellow">
			<label for="va_precio">Precio</label>
			<input type="numeric" name="va_precio" id="va_precio" min="1" value="1" required>
		</p>

		<p class="w3-center w3-padding w3-text-yellow">
			<label for="ca_existencia">Existencia</label>
			<input type="numeric" name="ca_existencia" id="ca_existencia" min="0" value="0" required>
		</p>

		<p class="w3-center w3-padding w3-text-yellow">
			<label for="nb_imagen">Imagen</label>
			<input type="file" name="nb_imagen" id="nb_imagen" required>
		</p>

			<p class="w3-center w3-padding">
			<label for="nu__categoria">Categoria</label>
			<?=$combo_categoria?>
		</p>

		<p class="w3-center w3-padding">
			<button class="w3-btn w3-khaki w3-text-black">ACEPTAR</button>
		</p>

	</form>

</div>

<?php
include_once("ver_mensaje.php");
?>

</body>
</html>