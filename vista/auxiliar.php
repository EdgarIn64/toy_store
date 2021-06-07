<?php  
	session_start();
	$_SESSION['eliminar'] = true;
	header("Location: ".$_SESSION['direccion']);
?>