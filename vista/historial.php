<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Historial">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<style>
		iframe{ 
			display: block;
			margin-top: .7rem;
			margin-bottom: 4rem;
			margin-left: auto;
			margin-right: auto;
			width: 1250px;  
			height: 500px;
			border: none;
			overflow:hidden;
			position: relative;	
		}
	</style>
</head>
<body>
	<?php  
		require('../header.html');
/*		session_start();
		if(!isset($_SESSION["usuario"])){
			header("Location: ../index.php");
		}
*/
	?>
	<div class="menu">
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>	

	<iframe src="../controlador/historialContenido.php" title="Iframe historial"></iframe>


	<?php  
		require('../pie.html');
	?>
</body>
</html>