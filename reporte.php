<?php
/*session_start();
include ("../../conexion/config.php");*/
$fecha=date(dMY);
$filename="Reporte_Concurso_PrograA_D17_$fecha.xls";
	header("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"" . $filename . "\"" );
	 $result = mysql_query("SELECT conprog_ag17.matricula, conprog_ag17.nombre, conprog_ag17.apellidos, conprog_ag17.semestre, conprog_ag17.correo, conprog_ag17.carrera, conprog_ag17.telefono, conprog_ag17.pagado  FROM conprog_ag17, respuestas WHERE conprog_ag17.matricula=conprog_ag17.matricula order by matricula", $link); // esta es otra manera de poner la lista de los conprog_ag17 en la tabla.
					 		  echo "<table border = '1'> \n"; 
                              echo "<tr bgcolor='#a9c9d9'>
							   <td><strong> Matrícula                   </strong></div></td>
							   <td><strong> Nombre                  </strong></div></td>
							   <td><strong> Apellidos                  </strong></div></td>
							   <td><strong> Semestre                    </strong></div></td>
						        <td><strong>Correo  </strong></div></td>
							   <td><strong> Carrera                 </strong></td></td>
							   <td><strong> Teléfono                 </strong></td></td>
							   <td><strong> Estatus                 </strong></td></td>
							   \n";
							   
							   while ($row_cons=mysql_fetch_array($result)){
							  
							    echo "<tr>
								   		   <td>".$row_cons["matricula"].		"</td> 
								           <td>".$row_cons["nombre"].         "</td>
								           <td>".$row_cons["apellidos"].       "</td>
										   <td>".$row_cons["semestre"].         "</td>
										   <td>".$row_cons["correo"].      "</td>
										   <td>".$row_cons["carrera"].      "</td>
										   <td>".$row_cons["telefono"].      "</td>
										   <td>".$row_cons["pagado"].      "</td>";
                                    }  
                                echo "</table> \n";   
	mysql_close($link);	
?>