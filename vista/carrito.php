<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head> 
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta MIO -->
	<meta name="titulo" content="Carro de compras"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/carritoEstilo.css?v=<?php echo time(); ?>"> 
	
	<script type="text/javascript" src="../js/titulo.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="../js/realizarCompraCarrito.js?v=<?php echo time(); ?>"></script>
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
		require("../controlador/carritoPublicaciones.php");
	?> 
     
	<div class="menu">
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>
	<br> <!--Nuevo boton llamando a la funcion nueva y se reacomodo el titulo y se agrego un br -->
	<input type="button" id="botonVerificarCantidades" class="boton" value="Realizar compra" style="float: right;" onclick="verifica();">
	<h2 id="tituloListaCarrito">Publicaciones del carro de compras</h2>
 
	<form action="realizarCompra.php" method="post" id="myForm">
	<input type="submit" id="botonRealizarCompra" class="boton" name="realizarCompra" value="Realizar compra" style="display:none;">

	<div class="imputsFormulario total"><label class="tituloImput">Cantidad a pagar: </label><label id="signo">$</label>
        <label id="total" class="inputformulario">0</label>
		<input type="text" id="cantidadTotal" name="CantidadPagar"  style="display: none;" > 
		<input type="text" id="cantidadProductos" name="NoProductos" style="display: none;"> 
		<input type="text" id="array_cantidades" name="array_cantidades"  style="display: none;"> 
        <input type="text" id="array_porProducto" name="array_porProducto"  style="display: none;"> 
    </div>  
	</form> 
	<a href="../vista/carrito.php" class="refrescar" style="display:none;"> </a>

	<?php 
	    carrito(); 
		if(isset($_POST["Eliminar"])){ 
			require('../controlador/eliminarDelCarro.php');
		}   
		require('../pie.html');
	?>
	</body>
</html>