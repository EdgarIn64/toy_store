<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Principal">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/accesibilidad.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="../js/titulo.js"></script>
	<script type="text/javascript" src="../js/accesibilidad.js"></script>
</head>
<body>
	<?php  
		require('../header.html');
		require('../menu.html');
	?>
	<div class="presentacion">
		<h1>Videos de presentaci&oacute;n</h1>
		<video width="100%" controls poster="../img/premium.png">
			<source src="../media/amigurumi.mp4" type="video/mp4">
		</video>
	</div>	
	
	<?php  
		require('../aside.php');
		if(isset($_POST['busqueda'])){
			$_SESSION['busqueda']=$_POST['buscar'];
			echo "<script type='text/javascript'>
                    window.location.replace('busqueda.php');
                </script>";
		}
	?>
	
	<label id="separacion"></label>
	<?php  
		if(!isset($_SESSION['color_fondo'])) {
			$_SESSION['color_fondo']="rgba(0, 0, 0, 0)";
			$_SESSION['color_letra']="black";
			$_SESSION['color_letra']="1.25rem";
		}
		if($_SESSION['color_fondo']=="rgb(37,37,37)"){
			echo "
			<script type='text/javascript'>
				document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
				document.body.style.color= '".$_SESSION['color_letra']."';
				document.body.style.fontSize = '".$_SESSION['letra']."';
			</script>
			";
		}
		require('../pie.html');
	?>
</body>
</html>