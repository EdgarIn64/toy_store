<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Cuenta">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		if(!isset($_SESSION["usuario"])){
			echo "<script type='text/javascript'>
                    window.location.replace('../../index.php');
                </script>";
		}
		require('../../header.html');
		require('../../controlador/crud_usuario.php');
		if(!isset($_SESSION['imagen']))
			$_SESSION["imagen"]="../../img/perfil.png";
		if(isset($_POST['subir'])){
			foto();
		}
		readImage();
		echo "
		<script type='text/javascript'>
			document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
			document.body.style.color= '".$_SESSION['color_letra']."';
			document.body.style.fontSize = '".$_SESSION['letra']."';
		</script>
		";
	?>
	<div class="menu">
		<a href="../principal.php">
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
		<form method="post" action="" style="float: right;">
			<input type="submit" name="cerrar" value="Cerrar Sesi&oacute;n" class="boton">
		</form>
	</div>	

	<div class="presentacion">
		
		<img src="<?php echo $_SESSION['imagen'] ?>?v=<?php echo time(); ?>" width="250" alt="perfil">
		<br><br>
		<form method="post" action="" enctype="multipart/form-data">
			<input type="file" name="foto">
			<button class="boton" name="subir">Subir foto</button>
		</form>
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
	<br><br><br>
	<br><br><br>
	<div class="datos">
		<table>
			<tr>
				<th>Direccion</th>
			</tr>
			<tr>
				<td>colonia</td>
				<td id="colonia">#</td>
			</tr>
			<tr>
				<td>calle</td>
				<td id="calle">#</td>
			</tr>
			<tr>
				<td>no. externo</td>
				<td id="no_externo">#</td>
			</tr>
			<tr>
				<td>no. interno</td>
				<td id="no_interno">#</td>
			</tr>
			<tr>
				<td>CP</td>
				<td id="cp">#</td>
			</tr>
			<tr>
				<td>Ciudad</td>
				<td id="ciudad">#</td>
			</tr>
			<tr>
				<td>Estado</td>
				<td id="estado">#</td>
			</tr>
			<tr>
				<td>Telefono celular</td>
				<td id="tel_celular">#</td>
			</tr>
			<tr>
				<td>Telefono extra</td>
				<td id="tel_extra">#</td>
			</tr>
		</table>
	</div>
	

	<label id="separacion"></label>
	<?php
		read();
		if(isset($_POST['editar'])){
			echo "<script type='text/javascript'>
                    window.location.replace('editar.php');
                </script>";
		}
		if(isset($_POST['direccion'])){
			echo "<script type='text/javascript'>
                    window.location.replace('direccion.php');
                </script>";
		}
		if(isset($_POST['eliminar'])){
			delete();
		}

		if(isset($_POST['cerrar'])){
			session_destroy();
			echo "<script type='text/javascript'>
                    window.location.replace('../../index.php');
                </script>";
		}
		require('../../pie.html');
	?>
</body>
</html>