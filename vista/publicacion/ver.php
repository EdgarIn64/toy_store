<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mis publicaciones">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php  
		require('../../header.html');
/*		require('../../controlador/crud_publicacion.php');
		if(isset($_POST['subir'])){
			foto();
		}  
		*/
	?>
	<div class="menu">
		<a href="lista.php">
		<img src="../../img/flecha.png" style="margin-left: 10px;" alt="regresar">
		</a>
		<form action="" method="post" style="float: right;">
			<input type="submit" class="boton" name="editar" value="Editar" style="display: inline;">
			<input type="submit" class="boton" name="eliminar" value="Eliminar">
		</form>
	</div>	

	<table>
		<td>
			<h1 id="nombre">Nombre del muñeco</h1>
			<h2 style="display: inline;">ID: </h2>
			<h2 id="id_publicacion" style="display: inline;">Id publicaci&oacute;n</h2>
			<!-- Añadir direccion de imagen <?php //echo $_SESSION['img']?> -->
			<br>
			<img src="../../img/Auxiliar.jpg" width="400" alt="publicacion">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="img">
				<button class="boton" name="subir">Subir foto</button>
			</form>
		</td>
		<td>
			<h1>Categoria: </h1>
			<h1>Precio: $</h1>
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
	<!-- Javascript onclick event -->
	<h2 style="display: inline;">Descripci&oacute;n</h2>
	<a class="descripcion">#</a>
	<br><br>
	
	<label class="separacion"></label>	
	<?php  
//		read();
		if(isset($_POST['editar'])){
			echo "<script type='text/javascript'>
                    window.location.replace('editar.php');
                </script>";
		}
		if(isset($_POST['eliminar'])){
		//	delete();
			echo '<script type="text/javascript">alert("Conexion inhabilitada");</script>';
		}
		require('../../pie.html');
	?>
</body>
</html>