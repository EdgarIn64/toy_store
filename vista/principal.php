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
</head>
<body>
	<?php  
		require('../header.html');
		require('../menu.html')
	?>
	<div class="presentacion">
		<h1>Videos de presentaci&oacute;n</h1>
		<video width="100%" controls poster="../img/premium.png">
			<source src="../media/amigurumi.mp4" type="video/mp4">
		</video>
	</div>	
	
	<?php  
		require('../aside.html');
	?>
	
	<label id="separacion"></label>
	<?php  
		require('../pie.html');
		session_start();
	?>
</body>
</html>