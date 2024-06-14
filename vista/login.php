<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
</head>
<body>


<div id="mi-div" style="background-image: url('../imagenes/cyber.jpg'); height: 650px;" class="w3-center  w3-text-black">

	<h1 class="w3-center"> Acceso</h1>
	
	<form name="controlAcceso" method="post" action="Acceso.php">

		<input type="hidden" name="control" value="666">

		<p>
			<label for="co_login">Login</label>
			<br>
			<input type="text" name="co_login" id="co_login" maxlength="15" required>
		</p>

		<p>
			<label for="co_password">Password</label>
			<br>
			<input type="password" name="co_password" id="co_password" maxlength="15" required>
		</p>

		<button class="w3-btn w3-khaki w3-text-black">ACEPTAR</button>

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