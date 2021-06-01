<?php
//aqui va la variable de sesion que valida la autenticacion al programa
session_start();
	if(empty($_SESSION['usr'])){
		echo "DEBE AUTENTIFICARSE";
		exit();
		}

//conexion a la BD 
$conexionBD = mysqli_connect('localhost', 'root', '') or die ('No pudo conectarse al servidor de Base de Datos MySql: '.mysqli_error());

//conexion a la BD kardex 
mysqli_select_db($conexionBD,'csi') or die ('No se puede abrir la estructura de BD'.mysqli_error($conexionBD));

//conocer que tipo de query usar para actualizatrla bd 
$opcion = $_POST['hdnOpc'];

switch ($opcion) {
	//opcion grabar
	case ('agregar'):
		//construir el query para insertar en la tabla de BD
		$matricula = $_POST['txtMatricula'];
		$nombre = $_POST['txtNombre'];
		$apellidos = $_POST['txtApellidos'];
		$correo = $_POST['txtCorreo'];
		$telefono = $_POST['txtTelefono'];
		$semestre = $_POST['txtSemestre'];
		$hrslb = $_POST['txtHrslb'];
		$fecha_nac = $_POST['txtFecha_nac'];
		$especialidad = $_POST['txtEspecialidad'];
		$qry = "INSERT INTO alumno_capitulo (id,matricula,nombre,apellidos,correo,telefono,semestre,hrslb,fecha_nac,especialidad) VALUES(0,'$matricula','$nombre', '$apellidos','$correo','$telefono', '$semestre', '$hrslb', '$fecha_nac,'$especialidad')";
			//ejecutar el query
		$resultado = mysqli_query($conexionBD, $qry) or die("**Error al insertar el registro: ".mysqli_error($conexionBD));

		//redirigir el programa al script html de captura de datos
		echo "
		 <script type='text/javascript'>
		 	window.location='updAlumno.php?id=noId'
		 	</script>
		";
		break;

	//grabar modificar
	case ('modificar'):
		//construir el query para insertar en la tabla de BD
		//$id = $_POST['hdnId'];
		$matricula = $_POST['txtMatricula'];
		$nombre = $_POST['txtNombre'];
		$apellidos = $_POST['txtApellidos'];
		$correo = $_POST['txtCorreo'];
		$telefono = $_POST['txtTelefono'];
		$semestre = $_POST['txtSemestre'];
		$hrslb = $_POST['txtHrslb'];
		$fecha_nac = $_POST['txtFecha_nac'];
		$especialidad = $_POST['txtEspecialidad'];
		$qry = "UPDATE alumno_capitulo SET matricula='$matricula', nombre='$nombre', apellidos='$apellidos', correo='$correo', telefono='$telefono', semestre='$semestre', hrslb='$hrslb', fecha_nac='$fecha_nac', especialidad='$especialidad'  WHERE matricula='$matricula'";

			//ejecutar el query
		$resultado = mysqli_query($conexionBD, $qry) or die("***Error al modificar el registro: ".mysqli_error($conexionBD));;

		//redirigir el programa al script html de captura de datos
		echo "
		 <script type='text/javascript'>
		 	window.location='shwAlumno.php'
		 	</script>
		";	
		break;

		//opcion de eliminar 
		case('eliminar'):
		//construir el query para eliminar en la tabla de la BD
		$matricula = $_POST['matricula'];

		$qry ="DELETE * FROM alumno_capitulo where matricula='$matricula'";

		//ejecutar el query 
		$resultado = mysqli_query($qry) or die("***Error al eliminar el registro:".mysqli_error());;

		//redirigir el programa al script html de captura de datos
		echo "
		  <script type='text/javascript'>
		   	window.location='shwAlumno.php'
		   </script>
		";
		break;
}



?>