<?php
	session_start();
?>
<!DOCTYPE html>
<html> 
<head> 
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Realizar Compra">
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/realizarCompraEstilo.css?v=<?php echo time(); ?>"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="../plugin/jQuery-Mask/src/jquerymask.js?v=<?php echo time(); ?>"></script>
	<script src="../js/formularioMascaras.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/titulo.js"></script>
 
	<script src="../js/datosCompra.js?v=<?php echo time(); ?>"></script>
   
</head>
<body> 
	<?php  
		require('../header.html');
		if(!isset($_SESSION["usuario"])){
			echo "<script type='text/javascript'>
                    window.location.replace('../index.php');
                </script>";
		}
		echo "
		<script type='text/javascript'>
			document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
			document.body.style.color= '".$_SESSION['color_letra']."';
			document.body.style.fontSize = '".$_SESSION['letra']."';
		</script>
		";
		//VARIABLES PASADAS DE LOS DATOS DE LA COMPRA obtenerPublicaciones

    	require('../controlador/confirmarCompra.php');

		
		if(isset($_POST["array_cantidades"])){

			//echo'cantidades= | '.$_POST["array_cantidades"].' | ';

			$valor1=$_POST["array_cantidades"];
			$array1 = explode(',', $valor1);
			$cantidades = array_filter($array1,'is_numeric'); //convertir a numeros

		}else{ 
			$cantidades[0]=0; 
			
		}	

		if(isset($_POST["array_porProducto"])){

			//echo'porProductos= | '.$_POST["array_porProducto"].' | ';

			$valor2=$_POST["array_porProducto"];
			$array2 = explode(',', $valor2);
			$proProductos = array_filter($array2,'is_numeric'); //convertir a numeros

		}else{
			$proProductos[0]=0; 

		}	

		if(isset($_POST['NoProductos'])){

			//echo'no de productos= | '.$_POST["NoProductos"].' | ';

			$valor3=$_POST['NoProductos'];
			$array3 = explode(',', $valor3);
			$NoProductos = array_filter($array3,'is_numeric');	//convertir a numeros
			//echo'no de productos a numero= | '.$NoProductos[0].' | ';
		}
		else{
			
			$NoProductos[0]=0; 
		}

		if(isset($_POST['CantidadPagar'])){

			//echo' cantidad a pagar= | '.$_POST["CantidadPagar"].' | ';

			$valor4=$_POST['CantidadPagar'];
			$array4 = explode(',', $valor4);
			$CantidadPagar = array_filter($array4,'is_numeric'); //convertir a numeros
		}
		else{	
			$CantidadPagar[0]=0; 
		}


		$checarProductos1=false;
		$checarProductos2=false;
		$checarProductos3=false;


		foreach ($proProductos as $actual) {
			if($actual==0)
			{
				$checarProductos1=true;
			}
		}
        foreach ($cantidades as $actual) {
			if($actual==0)
			{
				$checarProductos2=true;
			}
			
		}
		if($NoProductos[0]==0){
			$checarProductos3=true;
		}


		if($checarProductos1==true && $checarProductos2==true || $checarProductos3==true){
			$restriccion="vacio";
		}
		else{
			$restriccion="lleno";
		}

		//echo' restriccion= | '.$restriccion.' | ';
	?>

	<div class="menu">
	<a href="carrito.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>	
	<h2 id="tituloListaCompra">Productos: </h2>

	<form action="" method="post" id="idForm">
	<section id="listaPublicacionesCompra">
    <div class="publicacionCompra">
			<img src="../img/inicio.png" alt="" class="imagenPublicacion">
			<div class="informacionPublicacion">
				<table class="tablaInformacion"> 
					<tr>
						<td class="nombreColumna" colspan="2"><?php echo' '.$NoProductos[0].' '; ?> productos en el carro de compras</td>
						 
					</tr>
					<tr>
						<td class="nombreColumna" colspan="2">Total a pagar: $<?php echo' '.$CantidadPagar[0].'.00 '; ?></td>
						
					</tr>
					<tr>
						<td class="nombreColumna" id="noProductos">Productos: </td>
						<td class="nombreColumna" id="noProductos"></td>
					</tr>
					<?php obtenerPublicaciones($proProductos,$cantidades, $NoProductos);?>
				</table> 
				<div id="acomodar">
				<div class="imputsFormulario"><label class="tituloImput">Forma de pago: </label>
				<select name="FormaPago" id="formas_pago">  <!--SELECT BIEN --> 
					<option value="Deposito oxxo">Dep&oacute;sito oxxo</option>
					<option value="Tarjeta">Tarjeta</option>
					<option value="En persona">En persona</option>
				</select>
				</div>
				<div class="imputsFormulario paqueteria"><label class="tituloImput">Paqueter&iacute;a: </label>
				<select name="Paqueteria" id="formas_paqueteria">  <!--SELECT BIEN --> 
					<option value="Fedex">Fedex</option>
					<option value="DHL">DHL</option>
					<option value="Estafeta">Estafeta</option>
				</select>
				</div>
				</div>
			</div>
		</div>
		
		<input type="text" name="hora" id="reloj" style="display:none;">
		<input type="hidden" name="arrayCantidades" value="<?php echo $valor1;?>">
		<input type="hidden" name="arrayPorProducto" value="<?php echo $valor2;?>">
		<input type="hidden" name="arrayNoProductos" value="<?php echo $valor3;?>">
		<input type="text" style="display:none;" id="cuantosProductos" value="<?php echo $restriccion;?>">
		<input type="text" style="display:none;" id="productosRecibidos" value="<?php echo $NoProductos[0];?>">

	</section>
	<input type="submit" id="botonConfirmarCompra" class="boton disable" value="Confirmar compra" name="Confirmar">

  
	<section id=tarjeta class="seccionTarjeta">
	<div id=tituloTarjeta class="seccionTarjeta">
		Tarjeta de debito o credito
	</div>
	<hr id="linea" class="seccionTarjeta">
	<div class="tarjetasImagen" class="seccionTarjeta">
	<img src="../img/tarjetas1.png" alt="tarjetas1" class="imagenTarjeta seccionTarjeta">
	</div>
	<div id="datos1" class="tarjetaDatos seccionTarjeta">
		<div class="inputsTarjeta seccionTarjeta">
			<label class="campoTarjeta seccionTarjeta">Nombre del titular</label>
			<input type="text" name="titular" class="inputTarjeta seccionTarjeta" placeholder="Como aparece en la tarjeta" onkeypress="return soloLetras(event)">
		</div>
		<div class="inputsTarjeta seccionTarjeta">
			<label class="campoTarjeta seccionTarjeta">Fecha de expiracion</label>
			<input type="text" name="fechaTitular"  id="fecha" class="inputTarjeta seccionTarjeta" placeholder="__/__/___">
		</div> 
	</div>
	<div id="datos2" class="tarjetaDatos seccionTarjeta">
	<div class="inputsTarjeta seccionTarjeta">
			<label class="campoTarjeta seccionTarjeta">Numero de tarjeta</label>
			<input type="text" name="noTarjeta" id="tarjetaNum" class="inputTarjeta seccionTarjeta" placeholder="0000-0000-0000-0000">
		</div>
		<div class="inputsTarjeta seccionTarjeta">
			<label class="campoTarjeta seccionTarjeta">Codigo de seguridad</label>
			<input type="text" name="tarjetaCodigo" id="codigo" class="inputTarjeta seccionTarjeta" placeholder="3 digitos">
		</div>

	</div>
</section>


</form>	

<form method="post" action=""> 
	<section id="informacionDomocilio">
		<h2 id="tituloDomicilio">Informaci&oacute;n de domicilio y contacto: </h2>
	<div id="div1">
		<div class="formularioInput"><label class="tituloImputDomicilio">Colonia: </label>
			<input type="text" name="colonia" class="inputformulario" value="<?php echo $colonia;?>">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Calle: </label>
			<input type="text" name="calle" class="inputformulario" value="<?php echo $calle;?>">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">No. externo: </label>
			<input type="text" name="no_externo" class="inputformulario" value="<?php echo $noExterno;?>">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">No. interno: </label>
			<input type="text" name="no_interno" class="inputformulario" value="<?php echo $noInterno;?>">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">C&oacute;digo postal: </label>
			<input type="text" name="cp" id="codigoPostalUsuario" class="inputformulario" value="<?php echo $cp;?>">
		</div>
	</div> 
	<div id="div2">
		<div class="formularioInput"><label class="tituloImputDomicilio">Ciudad: </label>
			<input type="text" name="ciudad" class="inputformulario" value="<?php echo $ciudad;?>" onkeypress="return soloLetras(event)"> 
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Estado: </label>
			<input type="text" name="estado" class="inputformulario" value="<?php echo $estado;?>" onkeypress="return soloLetras(event)">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Tel&eacute;fono celular: </label>
			<input type="text" name="tel_celular" id="telefonoUsuario1" class="inputformulario" value="<?php echo $tel_celular;?>">
		</div>
		<div class="formularioInput"><label class="tituloImputDomicilio">Tel&eacute;fono extra: </label>
			<input type="text" name="tel_extra" id="telefonoUsuario2" class="inputformulario" value="<?php echo $tel_extra;?>">
		</div>
	</div>
	<input type="submit" id="botonConfirmarDomicilio" class="boton disable" value="Confirmar domicilio" name="guardar_direccion">
	</setion>
</form>
</section>
		 					

	<?php  
		if(isset($_POST['guardar_direccion']))
		update(); 

		if(isset($_POST['Confirmar']))
		venta();

		require('../pie.html');
	?>

</body>
</html>