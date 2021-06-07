<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head> 
	<title>Toy Store</title>
	<!-- Titulo del encabezado en el menta  -->
	<meta name="titulo" content="Mensajes">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../img/quintos.png">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/gestionMensajesEstilo.css?v=<?php echo time(); ?>"/>
	<script type="text/javascript" src="../js/titulo.js"></script>
</head>
<body>  
	<?php  
		require('../header.html');
		require('../controlador/conversaciones.php');
        print_r($_SESSION['query']);
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

	//CREAR CONVERSACION CUANDO EL USUARIO VENGA DEL CARRITO
		if(isset($_POST["carroContacto"])){ 
			$idContacto=$_POST["carroContacto"];
			echo'id del carro: '.$idContacto.'  -';
			conversacionNueva($idContacto);
		}
		else{
			//echo 'no hay idContacto';
		}
    

	?>
	<div class="menu"> 
	<a href="principal.php"><img src="../img/flecha.png?v=<?php echo time(); ?>" style="margin-left: 10px;"></a>
	</div>	
<br>
	<?php 
		mostrarConversaciones();
	?>

	<label id="separacion"></label>
	<?php  
		require('../pie.html');
	?> 
</body>
</html>