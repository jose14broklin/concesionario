<!DOCTYPE html>
<html>
<head>
	<title>Concesionario</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
</head>
<body style=" margin: auto; background-image:url(../imagenes/carro.jpg) ;" class=" w3-padding w3-text-yellow">


<?php
include_once("../vista/menu_catalogo.php");
?>


<h1 class="w3-center">Registrese</h1>

<div class="w3-pale-black w3-padding w3-center">
	
	<form name="registrese" method="post" action="Registrese.php">
		<input type="hidden" name="opcion" value="1">

		<p>
			<label for="nb_cliente">Nombre</label>
			<input type="text" name="nb_cliente" id="nb_cliente" maxlength="50" required placeholder="Pedro Perez">
		</p>

		<p>
			<label for="nu_cedula">C&eacute;dula</label>
			<input type="number" name="nu_cedula" id="nu_cedula" min="2000000" max="99999999" required>
		</p>

		<p>
			<label for="co_correo">Email</label>
			<input type="email" name="co_correo" id="co_correo" maxlength="35" required placeholder="perez@gmail.com">
		</p>

		<p>
			<label for="co_clave">Password</label>
			<input type="password" name="co_clave" id="co_clave" maxlength="15" required>
		</p>

		<p>
			<button class="w3-btn w3-black">REGISTRAR</button>
		</p>

	</form>

</div>

<?php
include_once("../vista/ver_mensaje.php");
?>

<?php
include_once("../vista/footer.php");
?>


</body>
</html>