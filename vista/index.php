<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="TOY STORE">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../header.html');
		
	?>
<div class="imagen">
	<img src="../img/inicio.png">
	<br><br><br><br>
</div>
<form method="post" action="">
<div class="formulario">
	<h1>Iniciar Sesión</h1>
	<input type="txt" name="correo" placeholder="Correo electrónico" class="placeholder" required="true">
	<br><br>
	<input type="password" name="contra" placeholder="Contraseña" class="placeholder" required="true">
	<br><br>
	<input type="submit" class="boton" name="ingresar" value="Ingresar">
	<br>
</form>
	<hr>
	<p>¿No tienes cuenta?<br>Crea una
<form method="post" action="">
	<input type="submit" class="boton" name="cuenta" value="Crear cuenta">
	</p>
</form>
<br>
	<?php   
//		require('../controlador/login.php');
		require('../pie.html');
		if(isset($_POST["ingresar"]))
			header("Location: principal.php");

		if(isset($_POST["cuenta"]))
			header("Location: registrar.php");
	?>

</div>
</body>
</html>