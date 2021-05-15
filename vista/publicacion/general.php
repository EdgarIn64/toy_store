<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Publicaci&oacute;n">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../../header.html');
	//	require('../../controlador/crud_publicacion.php');
	?>
	<div class="menu">
		<a href="../categorias.php">
		<img src="../../img/flecha.png" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>

	<table>
		<td>
			<h1 id="nombre">Nombre del muñeco</h1>
			<h2 style="display: inline;">ID: </h2>
			<h2 id="id_publicacion" style="display: inline;">Id publicaci&oacute;n</h2>
			<!-- Añadir direccion de imagen bien -->
			<br>
			<?php//echo $_SESSION['img']?>
			<img src="../../img/Auxiliar.jpg" width="350" alt="publicacion">
		</td>
		<td>
			<h1>Categoria: </h1>
			<h1>Precio $: </h1>
			<h1>Medidas: </h1>
			<h1>Inventario: </h1>
		</td>
		<td>
			<h1 id="categoria">#</h1>
			<h1 id="precio">#</h1>
			<h1 id="medidas">#</h1>
			<h1 id="inventario">#</h1>
		</td>
	</table>

	<br><br>
	
	<label class="separacion"></label>	
	<?php  
//		read();
	?>
</body>
</html>