<?php
	include "conexion.php";

	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$semestre = $_POST['semestre'];
	$hrslb = $_POST['hrslb'];
	$fecha_nac = $_POST['fecha_nac'];
	$especialidad = $_POST['especialidad'];

	//se crea un query para checar si el alumno ya esta registrado en la bd
	$registro = "SELECT * FROM alumno_capitulo WHERE matricula = $matricula";
	$registroBD = mysqli_query($link, $registro);

	//se crea un script para checar el estatus: pagado, no pagado
	/*$pago = "SELECT * FROM alumno_capitulo WHERE pagado = 'NO'";
	$pagoBD = mysqli_query($link, $pago);*/

	if(mysqli_num_rows($registroBD) == 1) //si el alumno esta registrado
	{
		echo "<script type='text/javascript'>alert('YA ESTÁS REGISTRADO CON ESTA MATRICULA, ESPERA PRÓXIMAS INDICACIONES');</script>";
		/*if (mysql_num_rows($pagoBD) == 1) //si el alumno no ha pagado
		{
			echo "<script type='text/javascript'>alert('YA ESTÁS REGISTRADO CON ESTA MATRICULA, Y TU ESTATUS ES NO PAGADO, ACUDE AL CAPÍTULO A REALIZAR TU PAGO');</script>";	
		}else
		{
			//si el alumno esta registrado y ya pagó
			echo "<script type='text/javascript'>alert('YA ESTÁS REGISTRADO CON ESTA MATRICULA, Y TU ESTATUS ES PAGADO');</script>";
		}*/
	}else //si el alumno no está registrado, se procede a insertar
	{
		$qry = "INSERT INTO alumno_capitulo(matricula, nombre, apellidos, correo, telefono, semestre, hrslb, fecha_nac, especialidad, pagado) VALUES ('$matricula', '$nombre', '$apellido', '$correo', '$telefono', '$semestre', '$hrslb', '$fecha_nac', '$especialidad', 'NO')";
		echo $qry;
			//ejecutar el query
			$resultado = mysqli_query($link, $qry) or die ("ERROR AL INSERTAR EL REGISTRO: " .mysqli_error($link));
			//redirigir el programa al script html de captura de datos
			//echo "<script type='text/javascript'> window.location='

	}

?>