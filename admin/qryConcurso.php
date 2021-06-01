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
		$semestre = $_POST['txtSemestre'];
		$correo = $_POST['txtCorreo'];
		$carrera = $_POST['txtCarrera'];
		$telefono = $_POST['txtTelefono'];
		$pagado = $_POST['txtPagado'];
		$qry = "INSERT INTO conprog_ag17 (matricula,nombre,apellidos,semestre,correo,carrera,telefono,pagado) VALUES('$matricula','$nombre', '$apellidos', '$semestre', '$correo', '$carrera', '$telefono', '$pagado')";
			//ejecutar el query
		$resultado = mysqli_query($conexionBD, $qry) or die("**Error al insertar el registro: ".mysqli_error($conexionBD));

		//redirigir el programa al script html de captura de datos
		echo "
		 <script type='text/javascript'>
		 	window.location='updConcurso.php?id=noId'
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
		$semestre = $_POST['txtSemestre'];
		$correo = $_POST['txtCorreo'];
		$carrera = $_POST['txtCarrera'];
		$telefono = $_POST['txtTelefono'];
		$pagado = $_POST['txtPagado'];
		$qry = "UPDATE conprog_ag17 SET matricula='$matricula', nombre='$nombre', apellidos='$apellidos', semestre='$semestre', correo='$correo', carrera='$carrera', telefono='$telefono', pagado='$pagado'  WHERE matricula='$matricula'";

			//ejecutar el query
		$resultado = mysqli_query($conexionBD, $qry) or die("***Error al modificar el registro: ".mysqli_error($conexionBD));;

		//redirigir el programa al script html de captura de datos
		echo "
		 <script type='text/javascript'>
		 	window.location='shwConcurso.php'
		 	</script>
		";	
		break;

		//opcion de eliminar 
		case('eliminar'):
		//construir el query para eliminar en la tabla de la BD
		//$id = $_POST['hdnId'];

		$qry ="DELETE * FROM conprog_ag17 where matricula='$matricula'";

		//ejecutar el query 
		$resultado = mysqli_query($qry) or die("***Error al eliminar el registro:".mysqli_error());;

		//redirigir el programa al script html de captura de datos
		echo "
		  <script type='text/javascript'>
		   	window.location='shwConcurso.php'
		   </script>
		";
		break;
}



?>