<!DOCTYPE html>
<head>
	<title>categoria</title>
	<link rel="stylesheet" type="text/css" href="../estilos/w3.css">
</head>
<body style="width: 50%; margin: auto; background-image:url(../imagenes/cyber.jpg) ;" class=" w3-padding w3-text-black">


<?php

 include("menu_administrador.php");

?>



<h1 class="w3-center">Ingresar Categoria</h1>

<div class="w3-black w3-padding" style="width: 50%; margin: auto;">
	
<form name="ingresar" method="post" action="../controlador/CategoriaIngresar.php">
	<p class="w3-center w3-padding">
    <label for="nb_categoria">Nombre de la categoría</label>
    <input type="text" name="nb_categoria" id="nb_categoria" maxlength="50" required placeholder="Categoria">
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