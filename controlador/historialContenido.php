<!DOCTYPE html>
<html> 
<head> 
    <link rel="stylesheet" type="text/css" href="../css/historialEstilo.css"/>
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
<?php //session_start();
      require("comprasPublicaciones.php"); 
      require("ventasPublicaciones.php"); ?>	
	
        <div class="contenedor"> 
            <div id="pestanas"> 
                <ul id=lista> 
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Compras</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Ventas</a></li>
                </ul>
            </div>
            
            <div id="contenidopestanas">

            
                <div id="cpestana1">
                <?php ejemplo_compra(1); ?>
                </div>
                <div id="cpestana2">
                <?php ejemplo_venta(); ?>
                </div>
            </div>
        </div>
    </div>


</body>
</html>