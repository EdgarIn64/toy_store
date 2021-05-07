<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Cuenta">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../header.html');
		require('../controlador/crud_usuario.php');
	?>
	<div class="menu">
		<a href="principal.php">
		<img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	

	<div class="presentacion">
		<img src="../img/perfil.png" width="250">
		<br><br>
		<input type="submit" class="boton" name="foto" value="Subir foto">
	</div>

	<div class="datos" style="float: left;">
		<table>
			<tr>
				<th>Nombre</th>
				<th id=nombre>#</th>
			</tr>
			<tr>
				<td>Apellido Paterno</td>
				<td id=paterno>#</td>
			</tr>
			<tr>
				<td>Apellido Materno</td>
				<td id=materno>#</td>
			</tr>
			<tr>
				<td>Correo</td>
				<td id="correo">#</td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td id="contrasena">#</td>
			</tr>
			<tr>
				<td>ID usuario</td>
				<td id="id_usuario">#</td>
			</tr>
		</table>
	</div>
	<form method="post" action="">
		<input type="submit" class="boton" name="editar" value="Editar Cuenta">
		<br><br>
		<input type="submit" class="boton" name="direccion" value="Editar Direccion">
		<br><br><br>
		<input type="submit" class="boton" name="eliminar" value="Eliminar Cuenta">
	</form>
	<br><br><br><br>
	<br><br><br><br>
	<div class="datos">
		<table>
			<tr>
				<th>Direccion</th>
			</tr>
			<tr>
				<td>colonia</td>
				<td>#</td>
			</tr>
			<tr>
				<td>calle</td>
				<td>#</td>
			</tr>
			<tr>
				<td>no. externo</td>
				<td>#</td>
			</tr>
			<tr>
				<td>no. interno</td>
				<td>#</td>
			</tr>
			<tr>
				<td>CP</td>
				<td>#</td>
			</tr>
			<tr>
				<td>Ciudad</td>
				<td>#</td>
			</tr>
			<tr>
				<td>Estado</td>
				<td>#</td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td>#</td>
			</tr>
		</table>
	</div>
	

	<label id="separacion"></label>
	<?php
		read();  
		require('../pie.html');
		if(isset($_POST['editar'])){
			header("Location: cuentaEditar.php");
		}
		if(isset($_POST['eliminar']))
			delete();
	?>
</body>
</html>