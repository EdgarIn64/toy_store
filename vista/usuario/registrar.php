<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Registrar cuenta">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		require('../../header.html');
	?>
<form method="post" action="">
<div class="registrar">
	<h1>Ingresa tus datos</h1>
	<input type="txt" name="nombre" placeholder="Nombre(s)" class="placeholder" required="true" style="width: 64%;">
	<br><br>
	<input type="txt" name="apellido_paterno" placeholder="Apellido paterno" class="placeholder" required="true" style="width: 30px; display: inline;">
	<input type="txt" name="apellido_materno" placeholder="Apellido materno" class="placeholder" required="true" style="width: 30px;">
	<br><br>
	<input type="txt" name="correo" placeholder="Correo electrónico" class="placeholder" required="true" style="width: 64%;">
	<br><br>
	<input type="password" name="contra" placeholder="Contraseña" class="placeholder" required="true" style="width: 64%;">
	<br><br>
	<input type="submit" class="boton" name="registrar" value="Registrar">
</form>
	<a href="../../index.php" class="boton">Cancelar</a>

	<?php  
		if(isset($_POST["registrar"])){
			require('../../controlador/crud_usuario.php');
			create();
		}
	?>

</div>
</body>
</html>