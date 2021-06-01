<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "DEBE AUTENTIFICARSE";
		}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title></title>
	<script type="text/javascript">
	function opcion(opc){
	switch(opc){
		case 'ProgramaciónAD17':
			top.frames['2'].location.href = "shwConcurso.php";
			break;

		case 'Alumnos':
			top.frames['2'].location.href = "shwAlumno.php";
			break;

		case 'Reporte':
			top.frames['2'].location.href = "reporte.php";
			break;

		case 'ReporteInscritos':
			top.frames['2'].location.href = "ReporteInscritos.php";
			break;

		//case 'Calificaciones':
		//	top.frames['2'].location.href = "calificaciones.html";
		//	break;

		case 'Terminar':
			window.top.location.href = "usuario.html";
			break;
	}
opc="";
}

</script>
<style type="text/css">
	.tamaoBoton{
		width: 150px;
		height: 40px;
			}
</style>
</head>
<body>
	<table align ="center">
		<tr>
			<td>
				<input type="button" value= "ProgramaciónAD17" class="tamaoboton" style="width: 150px; height:40px;" onClick ="opcion('ProgramaciónAD17');">
			</td>
		</tr>
		<tr style="height:100px">
			<td>
				<input type="button" value= "Alumnos" class="tamaoboton" style="width: 150px; height:40px;" onClick ="opcion('Alumnos');">
			</td>
		<tr style="height:150px">
			<td>
				<input type="button" value= "Reporte" style="width: 150px; height:40px;" onClick ="opcion('Reporte');">
			</td>
		</tr>
		<tr style="height:100px">
			<td>
				<input type="button" value= "ReporteInscritos" style="width: 150px; height:40px;" onClick ="opcion('ReporteInscritos');">
			</td>
		</tr>
		</tr>
			<tr style="height:100px">
			<td>
				<input type="button" value= "Terminar" style="width: 150px; height:40px;" onClick ="opcion('Terminar');">
			</td>
		</tr>
		
</table>
</body>
</html>
