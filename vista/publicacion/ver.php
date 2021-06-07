<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mi publicacion">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		require('../../header.html');
		require('../../controlador/crud_publicacion.php');
		if(isset($_POST['subir'])){
			foto();
		}
		if(!isset($_SESSION["usuario"])){
			echo "<script type='text/javascript'>
                    window.location.replace('../../index.php');
                </script>";
		}
		echo "
		<script type='text/javascript'>
			document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
			document.body.style.color= '".$_SESSION['color_letra']."';
			document.body.style.fontSize = '".$_SESSION['letra']."';
		</script>
		";
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

	<table style="float: left;">
		<tr><td>
			<h1 id="nombre">Nombre del muñeco</h1>
			<h2 style="display: inline;">ID: </h2>
			<h2 id="id_publicacion" style="display: inline;">Id publicaci&oacute;n</h2>
			<br>
		</td></tr>
		<tr><td>
			<img src="<?php echo $_SESSION['img']?>" width="380" alt="publicacion" style="float: left;">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="img">
				<button class="boton" name="subir">Subir foto</button>
			</form>
		</td></tr>
	</table>
	<br><br>
	<table style="padding-left: 7%;">
		<td>
			<h3>Categoria: </h3>
			<h3>Precio: $</h3>
			<h3>Medidas: </h3>
			<h3>Inventario: </h3>
		</td>
		<td>
			<h3 id="categoria">#</h3>
			<h3 id="precio">#</h3>
			<h3 id="medidas">#</h3>
			<h3 id="inventario">#</h3>
		</td>
	</table>

<!--
	<h3 style="display: inline;">Descripci&oacute;n</h3>
	<a class="descripcion">#</a>
-->
	<br><br>
	<label class="separacion"></label>	
	<?php  
		read();
		if(isset($_POST['editar'])){
			echo "<script type='text/javascript'>
                    window.location.replace('editar.php');
                </script>";
		}
		if(!isset($_SESSION['eliminar'])){
			$_SESSION['eliminar']=false;
		}
		if($_SESSION['eliminar']) {
			$_SESSION['eliminar']=false;
			delete();
		}
		if(isset($_POST['eliminar'])){
			if(!$_SESSION['eliminar']) {
				$_SESSION['direccion'] = "publicacion/lista.php";
				echo "<script type='text/javascript'>
					var bandera = confirm('¿Esta seguro de eliminar la publicación?');
					if(bandera) 
						window.location.replace('../auxiliar.php');
				</script>";
			}
		}
		require('../../pie.html');
	?>
</body>
</html>