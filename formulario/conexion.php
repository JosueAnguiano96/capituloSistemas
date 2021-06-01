<?php
	//variables para la conexion
	$host = "localhost";
	$user = "root";
	$pass = "";
	$bd = "csi";

	//conexion a la bd
	$link = mysqli_connect($host, $user, $pass, $bd) or die ("No se puede conectar a la BD " . mysql_error());
	//seleccionar bd
	//mysql_select_db($bd, $link) or die ("<font face=Tahoma size=2>Error: No es posible conectar a la base de datos.</font>" . mysql_error());

?>  