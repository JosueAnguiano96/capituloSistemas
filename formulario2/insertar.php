<?php
  	include ("conexion.php");

$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellidos'];
$semestre=$_POST['semestre'];
$correo=$_POST['correo'];
$carrera=$_POST['carrera'];
$telefono=$_POST['telefono'];

	//se crea un query para checar si el alumno ya esta registrado en la bd
	$registro = "SELECT * FROM conprog_ag17 WHERE matricula = $matricula";
	$registroBD = mysqli_query($link, $registro);

	//se crea un script para checar el estatus: pagado, no pagado
	$pago = "SELECT * FROM conprog_ag17 WHERE matricula = $matricula and pagado = 'NO'";
	$pagoBD = mysqli_query($link, $pago);

	if(mysqli_num_rows($registroBD) == 1) //si el alumno esta registrado
	{
		if (mysqli_num_rows($pagoBD) == 1) //si el alumno no ha pagado
		{
			echo "<script type='text/javascript'>alert('YA ESTÁS REGISTRADO CON ESTA MATRICULA, Y TU ESTATUS ES NO PAGADO, ACUDE AL CAPÍTULO A REALIZAR TU PAGO');</script>";	
		}else
		{
			//si el alumno esta registrado y ya pagó
			echo "<script type='text/javascript'>alert('YA ESTÁS REGISTRADO CON ESTA MATRICULA, Y TU ESTATUS ES PAGADO');</script>";
		}
	}else //si el alumno no está registrado, se procede a insertar
	{

		$csi=mysqli_query($link, "insert into conprog_ag17(matricula, nombre, apellidos, semestre, correo, carrera,  telefono, pagado) values('$matricula', '$nombre', '$apellido', '$semestre', '$correo', '$carrera', '$telefono', 'NO')");

		echo "<strong>Tus datos:</strong> <br><br><br> N° Control: $matricula <br> Nombre: $nombre <br> Apellido: $apellido <br> Correo: $correo <br> Telefono: $telefono <br> Semestre: $semestre <br> Carrera: $carrera <br><br><br> <strong>Fueron enviados correctamente.</strong>"; //header("location: contacto.html");
		//echo "<br>"; echo "<br>"; echo "<br>"; 
		//echo "<strong>Recuerda pasar a pagar al capitulo Estudiantil de Sistemas e Informática (CSI).</strong>";
	}
?>
