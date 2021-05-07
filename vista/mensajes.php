<!DOCTYPE html>
<html>
<head>
	<title>Toy Store Mensajes</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mensajes">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/gestionMensajesEstilo.css"/>
</head>
<body>
	<?php  
		require('../header.html');
	?>
	<div class="menu"> 
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>"></a>
	</div>	

	<section class="seccionMensajes">
		<img class="imagenPublicacion" src="../img/logoUsuario.png" alt="">
		<label id="titutoUsuario">Nombre: ------------</label>
		<table class="accionesMensajes">
			<tr>
				<td><a class="links" href="#">Ver usuario</a></td>
				<td><a class="links" href="mensajesChat.php">Contestar mensajes</a></td>
			</tr>
		</table>
	</section>

	<label id="separacion"></label>
	<?php  
		require('../pie.html');
	?>
</body>
</html>