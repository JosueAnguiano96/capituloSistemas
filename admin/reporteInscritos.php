<?php
/*session_start();*/
$link = @mysql_connect('localhost', 'root', '') or die ('No pudo conectarse a servidor de Base de Datos MySql: '.mysql_error());
//seleccionar base de datos
mysql_select_db('csi') or die ('No se puede abrir la estructura de BD'.mysql_error());

$fecha=date(DMY);
$filename="Reporte_Inscritos_CSI_$fecha.xls";
	header("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"" . $filename . "\"" );
	 $result = mysql_query("SELECT matricula, nombre, apellidos, correo, telefono, semestre, hrslb, fecha_nac, especialidad FROM alumno_capitulo", $link); // esta es otra manera de poner la lista de los conprog_ag17 en la tabla.
					 		  echo "<table border = '1'> \n"; 
                              echo "<tr bgcolor='#a9c9d9'>
							   <td><strong> Matr&iacute;cula                   </strong></div></td>
							   <td><strong> Nombre                  </strong></div></td>
							   <td><strong> Apellidos                  </strong></div></td>
						        <td><strong>Correo  </strong></div></td>
							   <td><strong> Tel&eacute;fono                 </strong></td></td>
							    <td><strong> Semestre                    </strong></div></td>
							   <td><strong> Hrslb                 </strong></td></td>
							   <td><strong> Fecha Nac                 </strong></td></td>
							   <td><strong> Especialidad                 </strong></td></td>
							   \n";
							   
							   while ($row_cons=mysql_fetch_array($result)){
							  
							    echo "<tr>
								   		   <td>".$row_cons["matricula"].		"</td> 
								           <td>".$row_cons["nombre"].         "</td>
								           <td>".$row_cons["apellidos"].       "</td>
										   <td>".$row_cons["correo"].      "</td>
										   <td>".$row_cons["telefono"].      "</td>
										   <td>".$row_cons["semestre"].         "</td>
										   <td>".$row_cons["hrslb"].      "</td>
										   <td>".$row_cons["fecha_nac"].      "</td>
										   <td>".$row_cons["especialidad"].      "</td>";
                                    }  
                                echo "</table> \n";   
	mysql_close($link);	
?>