<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mis publicaciones">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../../js/titulo.js"></script>
</head>
<body>
	<?php  
		require('../../header.html');
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
		<a href="../principal.php">
		<img src="../../img/flecha.png" style="margin-left: 10px;" alt="regresar">
		</a>
		<form method="post" action="">
			<input type="submit" class="boton" name="crear" value="Crear publicaci&oacute;n" style="float: right;">
		</form>
	</div>
	<section id="listaPublicacionesCompra">
		<?php  
			require('../../controlador/publicacion_lista.php');
		?>
	</section>	

	<label class="separacion"></label>	
	<label class="separacion"></label>		
	<?php  
		if(isset($_POST['crear'])){
			echo "<script type='text/javascript'>
                    window.location.replace('crear.php');
                </script>";
		}
		if(isset($_POST['ver'])){
			echo "<script type='text/javascript'>
                    window.location.replace('ver.php');
                </script>";
		}
		require('../../pie.html');
	?>
</body>
</html>