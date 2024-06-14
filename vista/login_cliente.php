<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
	<link rel="stylesheet" type="text/css" href="../estilos/styles.css">
	
</head>
<body>


<div id="mi-div" style="background-image: url('../imagenes/carro.jpg');height: 650px;" class="w3-center  w3-text-yellow">

	<h1 class="w3-center">Acceso</h1>
	
	<form name="login_cliente" method="post" action="Login.php">

		<input type="hidden" name="control" value="999">

		<p>
			<label for="co_correo">Email</label>
			<br>
			<input type="email" name="co_correo" id="co_correo" maxlength="35" required placeholder="perez@gmail.com">
		</p>

		<p>
			<label for="co_clave">Password</label>
			<br>
			<input type="password" name="co_clave" id="co_clave" maxlength="15" required>
		</p>

		<button class="w3-btn w3-black w3-text-yellow">ACEPTAR</button>
		
<p class="w3-center w3-text-red w3-padding">
	<?php
	if(isset($mensaje)) echo $mensaje;
	?>	
</p>


	</form>

</div>



<?php
include_once("../vista/footer.php");
?>

</body>
</html>