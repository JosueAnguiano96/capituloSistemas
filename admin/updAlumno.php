<?php 
//aqui va la variable de sesion que valida la autenticacion al programa
session_start();
	if(empty($_SESSION['usr'])){
		echo "DEBE AUTENTIFICARSE";
		exit();
		}

//conexion a la BD 
$conexionBD = mysqli_connect('localhost', 'root','') or die ('No pudo conectarse a servidor de Base de Datos MySql: '.mysqli_error());

//conexion a la BD kardex 
mysqli_select_db($conexionBD,'csi')or die('No se puede abrir la estructura de BD '.mysqli_error());

//Identificar la accion del usuario para conocer que tipo de query usar en la actualización de la BD
$accion = $_GET['matricula'];
	if($accion =='noId'){
		//construir el formulario para la opcion de modificar el registro
		//obtener el id para recuperar el registro correspondiente
		$matricula = $_GET['matricula'];

		//obtener la coleccion de registros que corresponde al id enviado
		$qry = "SELECT * FROM alumno_capitulo WHERE matricula='$matricula'";
		//ejecutar la consulta
		$tablaBD = mysqli_query($conexionBD, $qry);

		//sacar los datos de la tabla de registros intermedios 
		$registro = @mysqli_fetch_array($tablaBD);

		//$id = $registro['id'];
        $matricula = $registro['matricula'];
        $nombre = $registro['nombre'];
        $apellidos = $registro['apellidos'];
        $correo = $registro['correo'];
        $telefono = $registro['telefono'];
        $semestre = $registro['semestre'];
        $hrslb = $registro['hrslb'];
        $fecha_nac = $registro['fecha_nac'];
        $especialidad = $registro['especialidad'];
		//construir el html de la interface para la opcion de agregar nuevo registro 
		echo "
		<html>
    	<head>
    		<title></title>
    		<script type='text/javascript'>
    		function enviar(opc){
    			switch (opc) {
    				case 'modificar':
    					document.getElementById('hdnOpc').value='agregar';
    					document.getElementById('hdnId').value='".$matricula."';
    					document.getElementById('frmUpdAlumno').submit();
    					break;
    				
    				case 'regresar':
    					window.location='shwAlumno.php'
    					break;
    			}
    		}
    		</script>
    	</head>
    	<body onLoad='javascript:document.getElementById(\"txtNombre\").focus()'>
    	<form name='frmUpdAlumno' id='frmUpdAlumno' action='qryAlumno.php' method='POST'>
    			<table align='center' width='430'>
    				<tr height='100'><td colspan='2' align='center'>
    				<b>Agregando</b>
    				<input type='hidden' id='hdnOpc' name='hdnOpc'>
    				<input type='hidden' id='hdnId' name='hdnId'>
    				</td></tr>
    			<!--<tr>
    				<td>Id</td>
    				<td>$id</td>
    			</tr>-->
    			<tr>
    				<td>Matricula</td>
    				<td><input type='text' id='txtMatricula' name='txtMatricula' value='$matricula'></td>
    			</tr>
    			<tr>
    				<td>Nombre(s)</td>
    				<td><input type='text' id='txtNombre' name='txtNombre' value='$nombre'></td>
    			</tr>
                <tr>
                    <td>Apellido(s)</td>
                    <td><input type='text' id='txtApellidos' name='txtApellidos' value='$apellidos'></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type='text' id='txtCorreo' name='txtCorreo' value='$correo'></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input type='text' id='txtTelefono' name='txtTelefono' value='$telefono'></td>
                </tr>
                 <tr>
                    <td>Semestre</td>
                    <td><input type='text' id='txtSemestre' name='txtSemestre' value='$semestre'></td>
                </tr>
                <tr>
                    <td>Hrs lib</td>
                    <td><input type='text' id='txtHrslb' name='txtHrslb' value='$hrslb'></td>
                </tr>
                <tr>
                    <td>Fecha_Nac</td>
                    <td><input type='text' id='txtFecha_nac' name='txtFecha_nac' value='$fecha_nac'></td>
                </tr>
                <tr>
                    <td>Especialidad</td>
                    <td><select name='txtEspecialidad' class='form-control selectpicker'  id='txtEspecialidad' value='especialidad'>
                        <option disabled='disabled'>Selecciona una opción</option>
                            <option value='Ing. en Sistemas Computacionales'>Ing en Sistemas Computacionales</option>
                            <option value='Ing en Informática'>Ing. en Informática</option></td>
                </tr>
    			<tr>
    				<td colspan='2' align='center'>
    				<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width:100px' onClick='enviar(\"modificar\")'></td>
    			</tr>
    			<tr>
    			<td colspan='2' align='center'>
    			  <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='enviar(\"regresar\")'></td>
    			 </tr>
    		</table>
    	</html>
		";
	}
	else {
		//construir el formulario para la opcion de modificar el registro
		//obtener el id para recuperar el registro correspondiente
		$matricula = $_GET['matricula'];

		//obtener la coleccion de registros que corresponde al id enviado
		$qry = "SELECT * FROM alumno_capitulo WHERE matricula='$matricula'";
		//ejecutar la consulta
		$tablaBD = mysqli_query($conexionBD, $qry);

		//sacar los datos de la tabla de registros intermedios 
		$registro = @mysqli_fetch_array($tablaBD);

		$matricula = $registro['matricula'];
        $nombre = $registro['nombre'];
        $apellidos = $registro['apellidos'];
        $correo = $registro['correo'];
        $telefono = $registro['telefono'];
        $semestre = $registro['semestre'];
        $hrslb = $registro['hrslb'];
        $fecha_nac = $registro['fecha_nac'];
        $especialidad = $registro['especialidad'];
		//construir el html de la interface para la opcion de modificar 
		echo "
    	<html>
    	<head>
    		<title></title>
    		<script type='text/javascript'>
    		function enviar(opc){
    			switch (opc) {
    				case 'modificar':
    					document.getElementById('hdnOpc').value='modificar';
    					document.getElementById('hdnId').value='".$matricula."';
    					document.getElementById('frmUpdAlumno').submit();
    					break;
    				
    				case 'regresar':
    					window.location='shwAlumno.php'
    					break;
    			}
    		}
    		</script>
    	</head>
    	<body onLoad='javascript:document.getElementById(\"txtNombre\").focus()'>
    	<form name='frmUpdAlumno' id='frmUpdAlumno' action='qryAlumno.php' method='POST'>
    			<table align='center' width='430'>
    				<tr height='100'><td colspan='2' align='center'>
    				<b>Modificando Datos de Alumno</b>
    				<input type='hidden' id='hdnOpc' name='hdnOpc'>
    				<input type='hidden' id='hdnId' name='hdnId'>
    				</td></tr>
    			<tr>
                    <td>Matricula</td>
                    <td><input type='text' id='txtMatricula' name='txtMatricula' value='$matricula'></td>
                </tr>
                <tr>
                    <td>Nombre(s)</td>
                    <td><input type='text' id='txtNombre' name='txtNombre' value='$nombre'></td>
                </tr>
                <tr>
                    <td>Apellido(s)</td>
                    <td><input type='text' id='txtApellidos' name='txtApellidos' value='$apellidos'></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type='text' id='txtCorreo' name='txtCorreo' value='$correo'></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input type='text' id='txtTelefono' name='txtTelefono' value='$telefono'></td>
                </tr>
                 <tr>
                    <td>Semestre</td>
                    <td><input type='text' id='txtSemestre' name='txtSemestre' value='$semestre'></td>
                </tr>
                <tr>
                    <td>Hrs lib</td>
                    <td><input type='text' id='txtHrslb' name='txtHrslb' value='$hrslb'></td>
                </tr>
                <tr>
                    <td>Fecha_Nac</td>
                    <td><input type='text' id='txtFecha_nac' name='txtFecha_nac' value='$fecha_nac'></td>
                </tr>
                <tr>
                    <td>Especialidad</td>
                    <td><select name='txtEspecialidad' class='form-control selectpicker'  id='txtEspecialidad' value='especialidad'>
                        <option disabled='disabled'>Selecciona una opción</option>
                            <option value='Ing. en Sistemas Computacionales'>Ing en Sistemas Computacionales</option>
                            <option value='Ing en Informática'>Ing. en Informática</option></td>
                </tr>
    			<tr>
    				<td colspan='2' align='center'>
    				<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width:100px' onClick='enviar(\"modificar\")'></td>
    			</tr>
    			
    			<tr>
    			<td colspan='2' align='center'>
    			  <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='enviar(\"regresar\")'></td>
    			 </tr>
    		</table>
    	</html>
		";
	}