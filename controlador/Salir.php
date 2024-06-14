<?php

session_start();

unset($_SESSION['co_login']);

session_destroy();

header("location: Acceso.php");

?>