<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "DEBE AUTENTIFICARSE";
		}

?>
	<html>
		<frameset rows="30%,*">
		<frame src="FotoJet1.png" noresize="noresize" scrolling="no">
		<frameset cols="15%, 60%">
		<frame src="menuOpciones.php" noresize = "noresize" scrolling="no">
		<frame src="nada.html" noresize ="noresize" scrolling ="no">
		</frameset>
	</frameset>
</html> 
