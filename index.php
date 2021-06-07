<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="TOY STORE">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/quintos.png">
	<link rel="stylesheet" type="text/css" href="css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="js/titulo.js"></script>
</head>
<body>
	
	<?php  
		include_once('header.html');
	?>

<div class="imagen">
	<img src="img/inicio.png">
	<br><br><br><br>
</div>

<form method="post" action="">
<div class="formulario">
	<h1>Iniciar Sesión</h1>
	<input type="txt" name="correo" placeholder="Correo electrónico" class="placeholder" required="true" style="width: 33%;">
	<br><br>
	<input type="password" name="contra" placeholder="Contraseña" class="placeholder" required="true" style="width: 33%;">
	<br><br>

	<input type="submit" name="ingresar" value="Ingresar" class="boton">
	<br>
	<hr>
</form>
	<p>¿No tienes cuenta?<br>Crea una
	<br><br>
	<a href="vista/usuario/registrar.php" name="registrar" class="boton">Crear cuenta</a>
	</p>
<br><br>
	<?php   
		require('pie.html');
		if(isset($_POST["ingresar"]))
			require('controlador/login.php');
	?>

</div>
</body>
</html>