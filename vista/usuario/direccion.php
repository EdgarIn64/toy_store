<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Editar Direccion">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		require('../../header.html');
		require('../../controlador/crud_usuario.php');
		if(!isset($_SESSION["usuario"])){
			header("Location: ../../index.php");
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
		<a href="cuenta.php">
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	
	<div class="datos">
	<form method="post" action="">
		<table>
			<tr>
				<td>Colonia</td>
				<td id=colonia><input type="txt" name="colonia" value="<?php echo $_SESSION['datos'][0][6];?>"></td>
			</tr>
			<tr>
				<td>Calle</td>
				<td id=calle><input type="txt" name="calle" value="<?php echo $_SESSION['datos'][0][7];?>"></td>
			</tr>
			<tr>
				<td>No_externo</td>
				<td id=no_externo><input type="txt" name="no_externo" value="<?php echo $_SESSION['datos'][0][8];?>"></td>
			</tr>
			<tr>
				<td>No_interno</td>
				<td id="no_interno"><input type="txt" name="no_interno" value="<?php echo $_SESSION['datos'][0][9];?>"></td>
			</tr>
			<tr>
				<td>CP</td>
				<td id=cp><input type="number" name="cp" value="<?php echo $_SESSION['datos'][0][10];?>"></td>
			</tr>
			<tr>
				<td>Ciudad</td>
				<td id=ciudad><input type="txt" name="ciudad" value="<?php echo $_SESSION['datos'][0][11];?>"></td>
			</tr>
			<tr>
				<td>Estado</td>
				<td id=estado><input type="txt" name="estado" value="<?php echo $_SESSION['datos'][0][12];?>"></td>
			</tr>
			<tr>
				<td>Tel_celular</td>
				<td id="tel_celular"><input type="number" name="tel_celular" value="<?php echo $_SESSION['datos'][0][13];?>"></td>
			</tr>
			<tr>
				<td>Tel_extra</td>
				<td id="tel_extra"><input type="number" name="tel_extra" value="<?php echo $_SESSION['datos'][0][14];?>"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" class="boton" name="guardar_direccion" value="Guardar cambios">
	</form>	
	</div>
	<label id="separacion"></label>
	<?php
		require('../../pie.html');
		if(isset($_POST['guardar_direccion']))
			update(); 
	?>
</body>
</html>