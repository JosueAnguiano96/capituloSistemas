<?php
//paso1
session_start();
	if(empty($_SESSION['usr'])){
		echo "DEBE AUTENTIFICARSE";
		exit();
		}

//paso2
//conexion al servidor web y BD
@mysql_connect('localhost','root','') or die ('No pudo conectarse a servidor de Base de Datos MySql: '.mysql_error());

//seleccionar base de datos
mysql_select_db('csi') or die ('No se puede abrir la estructura de BD '.mysql_error());

//query para obtener conjunto de registros de la tabla de especialidades 
$qry= "SELECT * FROM alumno_capitulo ORDER BY matricula";

//ejecutar el query
$tablaBD = mysql_query($qry);

//paso3
//Si existen registros crear tabla
if(mysql_num_rows($tablaBD)>0){
	//crear el encabaezado de la tabla
	echo "
	<html>
	<title></title>
	<head>
		<script type='text/javascript'>
			function enviar(){
				window.location='updAlumno.php?matricula=noId'; 
			}
		</script>
	</head>
	<body>
		<table align='center' width='900' border='0'> 
		<tr>
			<td colspan='2' align='center'>
				<p>Alumnos Inscritos al Capitulo Estudiantil de Sistemas e Informática de la ACM</p>
				<td colspan='2' align='right'>
			</td>
		</tr>
		</table>
		<table id='idTabla' border='1' align='center' width='430'>
			<tr><td>
				<thead>
					<tr style='background-color:#BAB7B7'>
						<!--<th width='30' height='20'>Id</th>-->
						<th width='50' height='20'>Matricula</th>
						<th width='400' height='20'>Nombre(s)</th>
						<th width='400' height='20'>Apellido(s)</th>
						<th width='400' height='20'>Correo</th>
						<th width='400' height='20'>Telefono</th>
						<th width='400' height='20'>Sem</th>
						<th width='400' height='20'>Hrs Lib</th>
						<th width='400' height='20'>Fecha_nac</th>
						<th width='400' height='20'>Especialidad</th>
					</tr>
				</thead>

				<!-ciclo para recorrer la tabla de registros intermedios que forma la tabla html>

			</td></tr>

			";

		//desplegar los registros de la tabla especialidades de la BD
		while ($registro = mysql_fetch_array($tablaBD)) {
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
			echo "<tr>";
			echo "<script type='text/javascript'>document.getElementById('hdnId').value=$matricula;</script>";
			//echo "<td><a href='updAlumno.php?id=$id'>".$id."</a></td>";
			echo "<td><a href='updAlumno.php?matricula=$matricula'>".$matricula."</a></td>";
			echo "<td>".$nombre."</td>";
			echo "<td>".$apellidos."</td>";
			echo "<td>".$correo."</td>";
			echo "<td>".$telefono."</td>";
			echo "<td>".$semestre."</td>";
			echo "<td>".$hrslb."</td>";
			echo "<td>".$fecha_nac."</td>";
			echo "<td>".$especialidad."</td>";
			echo "</tr>";
		}
		    echo "</table>";
		}
		else{
			//notificar que no existen registros en la tabla de especialidades 
			echo "
			<table border='0' align='center' bordercolor='#FF3333'>
			<tr>
			<td></td>
			</tr>
			<tr align='center'>
				<td width='1000' align='center'><font color='FF3333'>No existen registros en la tabla de Inscripción al CSI!!</font></td>
				</tr>
				</table> 
				";
				echo "
				</body>
				";
		}
		//cerrar la conexion a la BD
		mysql_free_result($tablaBD); //libera los registros de la tabla
		//mysql_close($conexionBD);
	?>