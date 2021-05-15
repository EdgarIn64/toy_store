<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Editar Cuenta">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../../header.html');
//		require('../../controlador/crud_usuario.php');
//		require('../../controlador/comprobar_sesion.php');
	?>
	<div class="menu">
		<a href="cuenta.php">
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	
	<div class="datos">

	<form method="post" action="">
		<table>
			<tr>
				<th>Nombre</th>
				<th id=nombre><input type="txt" name="nombre" value="<?php //echo $_SESSION['datos'][0][1];?>"></th>
			</tr>
			<tr>
				<td>Apellido Paterno</td>
				<td id=paterno><input type="txt" name="paterno" value="<?php //echo $_SESSION['datos'][0][2];?>"></td>
			</tr>
			<tr>
				<td>Apellido Materno</td>
				<td id=materno><input type="txt" name="materno" value="<?php //echo $_SESSION['datos'][0][3];?>"></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td id="contrasena"><input type="txt" name="contrasena" value="<?php //echo $_SESSION['datos'][0][5];?>"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" class="boton" name="guardar" value="Guardar cambios">
	</form>	
	</div>

	<label id="separacion"></label>
	<?php
		require('../../pie.html');
		if(isset($_POST['guardar']))
			echo '<script type="text/javascript">alert("Conexion inhabilitada");</script>';
//			update(); 
	?>
</body>
</html>