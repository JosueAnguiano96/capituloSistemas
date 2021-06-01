<?php
$host = "localhost";
$usuario="root";
$password="";
$bd="csi"; 

$link=mysqli_connect("$host", "$usuario", "$password", "$bd") 
or die("mysqli_error()"); 

/*mysqli_select_db($link, "$bd") 
or die ("<font face=Tahoma size=2> Error: No es posible conectarse.</font>");*/

?>