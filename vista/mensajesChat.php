<!DOCTYPE html>
<html>
<head>
	<title>Toy Store Chat</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mensajes">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/mensajesEstilo.css"/>
</head>
<body>
	<?php  
		require('../header.html');
	?>
	<div class="menu"> 
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>"></a>
	</div>	

	<section id="contenedorChat">
		<div id="mensajes">
            <div id="mensajeRecibido">
            Hola
            </div>  
            <div id="mensajeEnviado">
            Hola
            </div>
        </div>
        <input type="text" name="mensajeNuevo" id="mensajeUsuario" placeholder="Escribe un mensaje">
        <a href="#"><img src="../img/enviarMensaje.png" alt="iconoMensaje" id="enviarMensaje"></a>
	</section>
<br>
	<?php  
		require('../pie.html');
	?>
</body>
</html>