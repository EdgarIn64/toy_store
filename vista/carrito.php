<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Carro de compras"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/carritoEstilos.css?v=<?php echo time(); ?>">
	<script src="../js/refrescar.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head> 
<body> 
	<?php      
		require('../header.html');
		/*
		session_start();
		if(!isset($_SESSION["usuario"])){
			header("Location: ../index.php");
		}
		*/
		require("../controlador/carritoPublicaciones.php");
	?> 

	<div class="menu">
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>	 
	<a href="realizarCompra.php"><input type="submit" id="botonRealizarCompra" class="boton" value="Realizar compra"></a>
	<h2 id="tituloListaCarrito">Publicaciones del carro de compras</h2>
	
	<a href="../vista/carrito.php" class="refrescar" style="display:none;"> </a>
	<?php ejemplo();//carrito();  
		
		if(isset($_POST["Eliminar"])){
			echo '<script type="text/javascript">alert("Conexion inhabilitada");</script>';
//			require('../controlador/eliminarDelCarro.php');
		}
	?>   
	
	<?php  
		require('../pie.html');
	?>
</body>
</html>