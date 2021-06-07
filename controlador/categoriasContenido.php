<?php   
   session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">   
    <link rel="stylesheet" type="text/css" href="../css/categoriasEstilos.css?v=<?php echo time(); ?>"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cambiarPestanna.js?v=<?php echo time(); ?>"></script> 
    <style>
        body{  
            margin: 0;   
        }
    </style>

    <title>CategoriasCotenido</title>
</head>
<body onload="javascript:cambiarPestanna(pestanas,pestana1);"> 
<?php   
    require("categoriasPublicaciones.php"); 
?> 
        <div class="contenedor"> 
            <div id="pestanas"> 
                <ul id=lista> 
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Mu&ntilde;ecos de papel</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Mu&ntilde;ecos de tela</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Mu&ntilde;ecos de segunda mano</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Mu&ntilde;ecos solo por pedido</a></li>
                </ul>
            </div>
             
            <div id="contenidopestanas">
                <div id="cpestana1"> 
                    <?php categoria(1); ?>
                </div>
                <div id="cpestana2">
                    <?php categoria(2); ?>
                </div>
                <div id="cpestana3">
                    <?php categoria(3); ?>
                </div>
                <div id="cpestana4">
                    <?php categoria(4); ?>
                </div>
            </div>
        </div>

    <?php   
        if(isset($_POST["agregar"])){
            require('agregarAlCarro.php');
        } 
    ?>
</body>
</html>