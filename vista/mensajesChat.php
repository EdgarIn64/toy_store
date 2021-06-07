<?php
	session_start();
?>
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
	<link rel="stylesheet" type="text/css" href="../css/mensajesEstilo.css?v=<?php echo time(); ?>"/>
	<script type="text/javascript" src="../js/titulo.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="../js/chat.js?v=<?php echo time(); ?>"></script>
</head>
<body>
	<?php  	
    	require('../header.html');
    	require('../controlador/mostrarMensajes.php');
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

		if(isset($_POST["idReceptor"])){ 
			$idReceptor=$_POST["idReceptor"];
			//echo'id de usuario para mandarle mensaje: '.$idReceptor.'  -';
			
		}
		else{
			//echo 'no hay idReceptor';
			//$idReceptor=" ";
		}

		if(isset($_POST["idConversacion"])){ 
			$idConversacion=$_POST["idConversacion"];
			//echo'id de la conversacion: '.$idConversacion.'  -';
			
		}
		else{
			//echo 'no hay idReceptor';
			//$idConversacion=" ";
		}
		

	?>
	<div class="menu"> 
	<a href="mensajes.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left:15px;"></a>
	</div>	
 
	<section id="contenedorChat" style="width:80%;">

		<div id="nuevo">
			<div id="mensajes">

			

			</div>  
		</div>

		<form action="" method="post">
        <input type="text" name="mensajeNuevo" id="mensajeUsuario" placeholder="Escribe un mensaje" style="width:80%;">
		<input type="text" name="hora" id="reloj" style="display:none;">
		<input type="hidden" name="idConversacionMensaje" value="<?php echo $idConversacion; ?>">
		<input type="hidden" name="receptor" value="<?php echo $idReceptor; ?>">
		<input type="submit" name="enviar" id="enviarMensaje" class="boton" value=" ">
		</form> 

	</section>

    <form action="mensajesChat.php" method="post">
			<input type="hidden" name="idReceptor" value="<?php echo $idReceptor; ?>">
			<input type="hidden" name="idConversacion" value="<?php echo $idConversacion; ?>">
			<input type="submit" value="Actualizar chat" name="refres" class="boton1">
    </form>
    <p style="text-align:center">Pueden haber mensajes que no hayas visto</p>
    <p style="text-align:center">Para verificar haz clic en el boton "Actualizar chat"</p>

    
	<?php
		if(isset($_POST["enviar"])){ 
			enviarMensaje(); 
		}    
	?>	


	<?php  
		require('../pie.html');
	?>

	
</body>
<script>	
	function pintar(){
	    
		var m=new Array();
		m=<?php echo json_encode(verMensajes($idReceptor,$idConversacion)); ?>; 
		//console.log(m);
	  
	  	var mensajesChat="";
	  
		for(var x=0; x<m.length; x++){
			mensajesChat=mensajesChat+m[x];
		}
		console.log(mensajesChat);

		document.getElementById("mensajes").innerHTML=mensajesChat;
	}
  
	
	setInterval(pintar, 5);

</script>
</html>
