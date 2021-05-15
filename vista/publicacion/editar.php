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
		require('../../controlador/crud_publicacion.php');
//		require('../../controlador/comprobar_sesion.php');
	?>
	<div class="menu">
		<a href="ver.php">
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	
	<div class="datos">
	<?php //session_start();?>
	<form method="post" action="" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Nombre</th>
				<th id=nombre><input type="txt" name="nombre" value="<?php //echo $_SESSION['publicacion'][0][1];?>"></th>
			</tr>
		<!--
			<tr>
				<td>Imagen</td>
				<td id=imagen>
					<input type="file" name="imagen" value="#">
				</td>
			</tr>
		-->
			<tr>
				<td>Categoria</td>
				<td id=categoria><input type="txt" name="categoria" value="<?php// echo $_SESSION['publicacion'][0][3];?>"></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td id="precio"><input type="txt" name="precio" value="<?php //echo $_SESSION['publicacion'][0][4];?>"></td>
			</tr>
			<tr>
				<td>Medidas</td>
				<td id=medidas><input type="txt" name="medidas" value="<?php //echo $_SESSION['publicacion'][0][5];?>"></td>
			</tr>
			<tr>
				<td>Inventario</td>
				<td id="inventario"><input type="txt" name="inventario" value="<?php// echo $_SESSION['publicacion'][0][6];?>"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" class="boton" name="cambiar" value="Guardar cambios">
	</form>	
	</div>
	<?php
//		print_r($_SESSION["publicacion"]);
		if(isset($_POST['cambiar']))
			echo '<script type="text/javascript">alert("Conexion inhabilitada");</script>';
			//update(); 
	?>
</body>
</html>