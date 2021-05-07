<!DOCTYPE html>
<html>
<head>
	<title>Toy Store Carro de compras</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Carrito">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/carritoEstilo.css">
</head>
<body>
	<?php  
		require('../header.html');
	?>
	<div class="menu">
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>"></a>
	</div>	
	<h2 id="tituloListaCarrito">Publicaciones del carro de compras</h2>
	<section id="listaPublicacionesDelCarro">

		<div class="publicacionDelCarro">
			<img src="../img/inicio.png" alt="" class="imagenPublicacion">
			<div class="informacionPublicacion">
				<table class="tablaInformacion">
					<tr>
						<td class="nombreColumna">Nombre producto: </td>
						<td>----------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">Precio: </td>
						<td>$-------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">Categor&iacute;a: </td>
						<td>-------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">Medidas: </td>
						<td>-------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">Inventario: </td>
						<td>-------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">Vendedor (id usuario): </td>
						<td>-------------</td>
					</tr>
					<tr>
						<td class="nombreColumna">id publicaci&oacute;n: </td>
						<td>-------------</td>
					</tr>
				</table>

				<input type="button" class="botonEliminar boton" value="Borrar del carro de compras">
				<input type="button" class="botonContactarVendedor boton" value="Contactar vendedor">
			</div>
		</div>
		<hr>

	</section>

	<a href="realizarCompra.php"><input type="submit" id="botonRealizarCompra" class="boton" value="Realizar compra"></a>
	
	<?php  
		require('../pie.html');
	?>
</body>
</html>