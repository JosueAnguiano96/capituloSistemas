<?php

session_start();
//conexion al servidor de base de datos
@mysql_connect('localhost', 'root', '') or die ('No pudo conectarse a servidor de Base de Datos MySql: '.mysql_error());
//seleccionar base de datos
mysql_select_db('csi') or die ('No se puede abrir la estructura de BD'.mysql_error());
$usr = $_POST ['txtUsuario'];
$pwd = $_POST ['txtPwd'];
$consulta = "SELECT * FROM usuario WHERE usr='".$usr."' and pwd='".$pwd."'";
$tablaBD = mysql_query($consulta);
	if(mysql_num_rows($tablaBD)>0){
	$_SESSION['usr'] = $usr;
	header ("Location:menu.php");
	}
	else{
		echo "Error en usuario o contraseña!";	
	}
?>