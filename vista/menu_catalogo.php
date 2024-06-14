



<p class="w3-padding w3-right-align w3-black">
	
	<a href="Catalogo.php" title="Haga click para ver el catalogo"><img src="../iconos/lista.png" class="w3-image"></a>

	&nbsp;&nbsp;

<?php
if(isset($_SESSION["nb_cliente"])){
?>

	<a href="BolsaConsultar.php" title="Haga click para ver la bolsa"><img src="../iconos/carrito.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<a href="CompraConsultar.php" title="Haga click para ver su compra"><img src="../iconos/bag.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<a href="HistoricoConsultar.php" title="Haga click para ver las compras anteriores"><img src="../iconos/pagar.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<a href="Logout.php"><img src="../iconos/logout.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<span class="w3-text-yellow w3-btn w3-black">
		<?php
		if(isset($_SESSION["nb_cliente"])){
			echo $_SESSION["nb_cliente"];
		}
		?>
	</span>

<?php
}else{
?>

	<a href="Registrese.php" title="Haga click para registrase"><img src="../iconos/registrarse.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<a href="Login_cliente.php" title="Haga click para conectarse a la aplicacion"><img src="../iconos/login.png" class="w3-image"></a>

	&nbsp;&nbsp;

	<a href="Login.php" title="administrador"><img src="../iconos/administrador.png" class="w3-image"></a>

	&nbsp;&nbsp;

<?php
}
?>

</p>