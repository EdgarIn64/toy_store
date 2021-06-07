<?php
    session_start();
	include_once("modelo/Usuario.php");
	$sErr="";
	$correo="";
	$sNom="";
	$password="";	
	$oUsu = new Usuario();
	
	if (isset($_POST["correo"]) && !empty($_POST["correo"]) &&
		isset($_POST["contra"]) && !empty($_POST["contra"])) {
		$correo = $_POST["correo"];
		$password = $_POST["contra"];
		$oUsu->setCorreo($correo);
		$oUsu->setContrasena($password);
		
		try{
			if ($oUsu->validarUsuario() ){
				$oUsu->setNombre($_SESSION["datos"][0][1]);
				$oUsu->setPaterno($_SESSION["datos"][0][2]);
				$oUsu->setMaterno($_SESSION["datos"][0][3]);

				$_SESSION["usuario"] = $oUsu;
			}
			else{
				$sErr = "Usuario desconocido";
			}
		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
		}
		if ($sErr == "") {
		    echo "<script type='text/javascript'>
                    window.location.replace('vista/principal.php');
                </script>";
		}
		else{
			echo "<script type='text/javascript'>alert('No se pudo iniciar sesion')</script>";
		}
	}
	else{
		if(isset($_POST['ingresar']))
			header("Location: error.html");
	}
?>
