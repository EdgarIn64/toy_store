<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mis publicaciones">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../header.html');
	?>
	<div class="menu">
		<a href="principal.php">
		<img src="../img/flecha.png" style="margin-left: 10px;" alt="regresar">
		</a>
		<input type="submit" class="boton" name="crear" value="Crear publicaci&oacute;n" style="float: right;">
	</div>	

	<table>
		<td>
			<h1 class="nombre_toy">Nombre del muñeco</h1>
			<h2 class="id_publicacion">Id publicaci&oacute;n</h2>
			<img src="../img/Auxiliar.jpg" width="250">
		</td>
		<td>
			<!-- Javascript onclick event -->
			<h2 style="display: inline;">Descripci&oacute;n</h2>
			<a class="descripcion">#</a>
			<br><br>
			<input type="submit" class="boton" name="ver" value="Ver publicaci&oacute;n">
			<br><br>
			<input type="submit" class="boton" name="editar" value="Editar">
			<br><br>
			<input type="submit" class="boton" name="eliminar" value="Eliminar">
		</td>
	</table>

	<label class="separacion"></label>	
	<?php  
		require('../pie.html');
	?>
</body>
</html>