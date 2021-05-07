<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/categoriasEstilo.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cambiarPestanna.js"></script>
<style>
    body{
        margin: 0; 
    }
</style>
<title>categoriasCotenido</title>
</head>
<body onload="javascript:cambiarPestanna(pestanas,pestana1);">
	
	
        <div class="contenedor">
            <div id="pestanas"> 
                <ul id=lista> 
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Muñecos de papel</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Muñecos de tela</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Muñecos de segunda mano</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Muñecos solo por pedido</a></li>
                </ul>
            </div>
            
            <div id="contenidopestanas">
                <div id="cpestana1">
                    <section id="listaPublicaciones" class="publicpestana1">

                    <div class="publicacionCategoria publicpestana1">
                        <img src="../img/papel.png" alt="" class="imagenPublicacion publicpestana1">
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
                                    <td>Muñecos de papel</td>
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

                            <input type="button" class="agregarCarro boton publicpestana1" value="Agregar al carro">
                            <input type="button" class="verPublicacion boton publicpestana1" value="Ver publicaci&oacute;n">
                        </div>
                    </div>
                    <hr> 

                    </section>
                </div>
                <div id="cpestana2">
                <section id="listaPublicaciones" class="publicpestana2">

                <div class="publicacionCategoria publicpestana2">
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
                                <td>Muñecos de pl&aacute;stico</td>
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

                        <input type="button" class="agregarCarro boton publicpestana2" value="Agregar al carro">
                        <input type="button" class="verPublicacion boton publicpestana2" value="Ver publicaci&oacute;n">
                    </div>
                </div>
                <hr> 

                </section>
                </div>

                <div id="cpestana3">

                <section id="listaPublicaciones" class="publicpestana3">

                <div class="publicacionCategoria publicpestana3">
                    <img src="../img/Auxiliar.jpg" alt="" class="imagenPublicacion publicpestana3">
                    <div class="informacionPublicacion publicpestana3">
                        <table class="tablaInformacion publicpestana3">
                            <tr>
                                <td class="nombreColumna publicpestana3">Nombre producto: </td>
                                <td>----------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">Precio: </td>
                                <td>$-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">Categor&iacute;a: </td>
                                <td>Muñecos de segunda mano</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">Medidas: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">Inventario: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">Vendedor (id usuario): </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana3">id publicaci&oacute;n: </td>
                                <td>-------------</td>
                            </tr>
                        </table>

                        <input type="button" class="agregarCarro boton publicpestana3" value="Agregar al carro">
                        <input type="button" class="verPublicacion boton publicpestana3" value="Ver publicaci&oacute;n">
                    </div>
                </div>
                <hr> 

                </section>

                </div>
                <div id="cpestana4">

                <section id="listaPublicaciones" class="publicpestana4">

                <div class="publicacionCategoria publicpestana4">
                    <img src="../img/premium.png" alt="" class="imagenPublicacion publicpestana4">
                    <div class="informacionPublicacion publicpestana4">
                        <table class="tablaInformacion publicpestana4">
                            <tr>
                                <td class="nombreColumna publicpestana4">Nombre producto: </td>
                                <td>----------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">Precio: </td>
                                <td>$-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">Categor&iacute;a: </td>
                                <td>Muñecos solo por pedido</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">Medidas: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">Inventario: </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">Vendedor (id usuario): </td>
                                <td>-------------</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana4">id publicaci&oacute;n: </td>
                                <td>-------------</td>
                            </tr>
                        </table>

                        <input type="button" class="agregarCarro boton publicpestana4" value="Agregar al carro">
                        <input type="button" class="verPublicacion boton publicpestana4" value="Ver publicaci&oacute;n">
                    </div>
                </div>
                <hr>  

                </section>
                
                </div>
            </div>
        </div>


</body>
</html>