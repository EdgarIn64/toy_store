<!DOCTYPE html>
<html>
<head> 
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Carrito">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/realizarCompraEstilo.css"> 
</head>
<body> 
	<?php  
		require('../header.html');
	?>
	<div class="menu">
	<a href="carrito.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>	
	<h2 id="tituloListaCompra">Productos: </h2>

<form action="">
	<section id="listaPublicacionesCompra">
		<div class="publicacionCompra">
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

				<div class="imputsFormulario"><label class="tituloImput">Cantidad: </label>
					<input type="text" name="Cantidad" class="inputformulario" placeholder="#">
				</div>
				<div class="imputsFormulario"><label class="tituloImput">Cantidad a pagar: </label>
					<input type="text" name="Cantidad a pagar" class="inputformulario" placeholder="#">
				</div>
				<div class="imputsFormulario"><label class="tituloImput">Forma de pago: </label>
					<select name="Forma de pago" id="formas_pago">
						<option value="">En persona</option>
						<option value="saab">Tarjeta</option>
						<option value="mercedes">Dep&oacute;sito oxxo</option>
					</select>
				</div>
				<div class="imputsFormulario"><label class="tituloImput">Paqueter&iacute;a: </label>
					<select name="Paqueteria" id="formas_paqueteria">
						<option value="">Fedex</option>
						<option value="saab">DHL</option>
						<option value="mercedes">Estafeta</option>
					</select>
				</div>
			</div>
		</div>
	 <hr>
	</section>
	<input type="submit" id="botonConfirmarCompra" class="boton" value="Confirmar compra">
</form>	

<form method="post" action="">
	<section id="informacionDomocilio">
		<h2 id="tituloDomicilio">Informaci&oacute;n de domicilio y contacto: </h2>
	<div id="div1">
		<div class="formularioInput"><label class="tituloImputDomicilio">Colonia: </label>
			<input type="text" name="Colonia" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Calle: </label>
			<input type="text" name="Calle" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">No. externo: </label>
			<input type="text" name="No_externo" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">No. interno: </label>
			<input type="text" name="No_interno" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">C&oacute;digo postal: </label>
			<input type="text" name="Cp" class="inputformulario" placeholder="">
		</div>
	</div>
	<div id="div2">
		<div class="formularioInput"><label class="tituloImputDomicilio">Ciudad: </label>
			<input type="text" name="Ciudad" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Estado: </label>
			<input type="text" name="Estado" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Tel&eacute;fono celular: </label>
			<input type="text" name="Tel_celular" class="inputformulario" placeholder="">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Tel&eacute;fono extra: </label>
			<input type="text" name="Tel_extra" class="inputformulario" placeholder="">
		</div>
	</div>
	<input type="submit" id="botonConfirmarDomicilio" class="boton" value="Confirmar domicilio">
	</setion>
</form>
</section>
	<?php  
		require('../pie.html');
	?>
</body>
</html>