<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Crear publicacion">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../../header.html');
		//require('../../controlador/crud_publicacion.php');
		//require('../../controlador/comprobar_sesion.php');
	?>
	<div class="menu">
		<a href="lista.php">
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	
	<div class="datos">
	<?php //session_start();?>
	<form method="post" action="" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Nombre</th>
				<th id=nombre><input type="txt" name="nombre" required="true"></th>
			</tr>
		<!--
			<tr>
				<td>Imagen</td>
				<td id=imagen>
					<input type="file" name="imagen">
				</td>
			</tr>
		-->	
			<tr>
				<td>Categoria</td>
				<td id=categoria>
					<select name="categoria" style="font-size: 1.25rem;">
						<option value="1">Papel</option>
						<option value="2">Tela</option>
						<option value="3">Segunda mano</option>
						<option value="4">Por pedido</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Precio</td>
				<td id="precio"><input type="txt" name="precio" required="true"></td>
			</tr>
			<tr>
				<td>Medidas</td>
				<td id=medidas><input type="txt" name="medidas" required="true"></td>
			</tr>
			<tr>
				<td>Inventario</td>
				<td id="inventario"><input type="txt" name="inventario" required="true"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" class="boton" name="guardar" value="Guardar">
	</form>	
	</div>
	<?php
		//print_r($_SESSION["publicacion"]);
		if(isset($_POST['guardar']))
			echo '<script type="text/javascript">alert("Conexion inhabilitada");</script>';
		//	create(); 
	?>
</body>
</html>