<?php
	session_start();
?>
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
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		require('../../header.html');
		require('../../controlador/crud_publicacion.php');
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
		<img src="../../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;" alt="regresar">
		</a>
	</div>	
	<section id="listaPublicacionesCompra" style="width: auto; padding: 15px">
	
	<form method="post" action="">
		<table>
			<tr>
				<th>Nombre</th>
				<th id=nombre><input type="txt" name="nombre" class="info" required="true"></th>
			</tr>
			<tr>
				<td>Categoria</td>
				<td id=categoria>
					<select name="categoria" style="font-size: 1.38rem;">
						<option value="1">Papel</option>
						<option value="2">Tela</option>
						<option value="3">Segunda mano</option>
						<option value="4">Por pedido</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Precio</td>
				<td id="precio"><input type="txt" name="precio" class="info" required="true"></td>
			</tr>
			<tr>
				<td>Medidas</td>
				<td id=medidas><input type="txt" name="medidas" class="info" required="true"></td>
			</tr>
			<tr>
				<td>Inventario</td>
				<td id="inventario"><input type="txt" name="inventario" class="info" required="true"></td>
			</tr>
		</table>
		<br><br>
		<input type="submit" class="boton" name="guardar" value="Guardar">
	</form>	
	</section>
	<?php
		//print_r($_SESSION["publicacion"]);
		if(isset($_POST['guardar']))
			create(); 
	?>
</body>
</html>