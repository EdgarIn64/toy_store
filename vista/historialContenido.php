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
	
	
        <div class="contenedor">
            <div id="pestanas"> 
                <ul id=lista> 
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Compras</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Ventas</a></li>
                </ul>
            </div>
            
            <div id="contenidopestanas">
                <div id="cpestana1">
                    <section id="listaPublicaciones" class="publicpestana1">

                    <div class="publicacionHistorial publicpestana1">
                        <img src="../img/inicio.png" alt="" class="imagenPublicacion publicpestana1">
                        <div class="informacionPublicacion publicpestana1">
                            <table class="tablaInformacion publicpestana1">
                                <tr>
                                    <td class="nombreColumna publicpestana1">Nombre producto: </td>
                                    <td>----------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Precio: </td>
                                    <td>$-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Categor&iacute;a: </td>
                                    <td>--------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Medidas: </td>
                                    <td>-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Inventario: </td>
                                    <td>-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Vendedor (id usuario): </td>
                                    <td>-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">id publicaci&oacute;n: </td>
                                    <td>-------------</td>
                                </tr>
                            </table>

                            <table class="tablaInformacion publicpestana1" id="tabla2">
                                <tr>
                                    <td class="nombreColumna publicpestana1" id="domicilioTitulo">Datos de la compra: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Cantidad: </td>
                                    <td>$-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Forma de pago: </td>
                                    <td>--------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Cantidad de pago: </td>
                                    <td>-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Paqueter&iacute;a: </td>
                                    <td>-------------</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <hr> 

                    </section>
                </div>
                <div id="cpestana2">
                <section id="listaPublicaciones" class="publicpestana2">

                <div class="publicacionHistorial publicpestana2">
                    <img src="../img/inicio.png" alt="" class="imagenPublicacion publicpestana2">
                    <div class="informacionPublicacion publicpestana2">
                        <table class="tablaInformacion publicpestana2">
                            <tr>
                                <td class="nombreColumna publicpestana2">Nombre producto: </td>
                                <td>----------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Precio: </td>
                                <td>$-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Categor&iacute;a: </td>
                                <td>--------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Medidas: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Inventario: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Vendedor (id usuario): </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">id publicaci&oacute;n: </td>
                                <td>-------------</td>
                            </tr>
                        </table>
                        <table class="tablaInformacion publicpestana1" id="tabla2">
                                <tr>
                                    <td class="nombreColumna publicpestana1" id="domicilioTitulo">Datos de la venta: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Cantidad: </td>
                                    <td>$-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Forma de pago: </td>
                                    <td>--------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Cantidad de pago: </td>
                                    <td>-------------</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna publicpestana1">Paqueter&iacute;a: </td>
                                    <td>-------------</td>
                                </tr>
                            </table>

                    </div>
                </div>
                <hr> 

                </section>
                </div>
            </div>
        </div>
    </div>


</body>
</html>