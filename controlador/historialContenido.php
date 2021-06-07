<?php
    session_start();
?>
<!DOCTYPE html>
<html> 
<head>  
    <link rel="stylesheet" type="text/css" href="../css/historialEstilo.css?v=<?php echo time(); ?>"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cambiarPestanna.js"></script>
<style>
    body{
        margin: 0; 
    } 
</style> 
<title>historialContendio</title>
</head>
<body onload="javascript:cambiarPestanna(pestanas,pestana1);"> 
<?php 
    require("comprasPublicaciones.php"); 
    require("ventasPublicaciones.php"); 	
	echo "
        <script type='text/javascript'>
            document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
            document.body.style.color= '".$_SESSION['color_letra']."';
            document.body.style.fontSize = '".$_SESSION['letra']."';
        </script>
        ";  
?>
        <div class="contenedor"> 
            <div id="pestanas"> 
                <ul id=lista> 
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Compras</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Ventas</a></li>
                </ul>
            </div>
            
            <div id="contenidopestanas">
            
                <div id="cpestana1">
                <?php compras(1); ?>
                </div>
                <div id="cpestana2">
                <?php ventas(); ?>
                </div>
            </div>
        </div>
    </div>


</body>
</html>