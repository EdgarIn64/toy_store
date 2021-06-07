<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Resultados de la busqueda"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../js/titulo.js"></script>
	<style type="text/css">
		input {
			margin-left: 5px;
			font-size: 1.5rem;
			margin-bottom: 5px;"
		}
	</style>
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
	?>
	
	<div class="menu">
		<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px; float: left;"></a>
		<form method="post" action="" style="margin-left: 100px; display: inline;">
			<input type="search" name="buscar" placeholder="buscar">
			<input type="submit" name="busqueda" value="Realizar busqueda">
		</form>
	</div>	 
	<?php    
		if(isset($_POST['busqueda'])){
			$_SESSION['busqueda']=$_POST['buscar'];
		}
		echo "<h1 style='text-align: center;'>Buscando ".$_SESSION['busqueda']."</h2>";
	?>

	<section id="listaPublicacionesCompra">
	<?php    
		require('../controlador/buscar.php');
	?>
	</section>
	<label id="separacion"></label>
	<?php

		require('../pie.html');
	?>
</body>
</html>