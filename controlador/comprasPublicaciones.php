<?php
    function ejemplo_compra($valor) {
        echo '     
            <section id="listaPublicaciones" class="publicpestana'.$valor.'">

            <div class="publicacionHistorial publicpestana1">
                <img src="../img/Auxiliar.jpg" alt="" class="imagenPublicacion publicpestana1">
                <div class="informacionPublicacion publicpestana1">
                    <table class="tablaInformacion publicpestana1">
                        <tr>
                            <td class="nombreColumna publicpestana1">Nombre producto: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Precio: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Categor&iacute;a: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Medidas: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Inventario: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Vendedor: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">id publicaci&oacute;n: </td>
                            <td>#</td>
                        </tr>
                    </table>

                    <table class="tablaInformacion publicpestana1" id="tabla2">
                        <tr>
                            <td class="nombreColumna publicpestana1" id="domicilioTitulo">Datos de la compra: </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Cantidad: </td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana1">Cantidad de pago: </td>
                            <td>#</td>
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

            ';
    }   

    function compras($valor) {
    require("../modelo/AccesoDatosCompras.php");    
        $db = new AccesoDatosC();
        $db->conectar();
        $oMysql = $db->getConex(); 

        $idSesion= $_SESSION['datos'][0][0];    

        $Query= "SELECT id_compra, historial_compras.id_publicacion, cantidad, forma_pago, cantidad_pago, historial_compras.id_usuario, publicaciones.nombre_producto, publicaciones.imagen, categorias.descripcion, publicaciones.precio, publicaciones.medidas, publicaciones.inventario, publicaciones.id_categoria,
                usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno 
                FROM (((historial_compras 
                    INNER JOIN publicaciones ON historial_compras.id_publicacion = publicaciones.id_publicacion)
                    INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria)
                    INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) WHERE historial_compras.id_usuario =".$idSesion."
                     ORDER BY id_compra ASC";             
            
        $Result = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar();
        if($Result!=null){
            while($row =$Result->fetch_array()){                

                echo ' 
                
                <section id="listaPublicaciones" class="publicpestana'.$valor.'">

                <div class="publicacionHistorial publicpestana1">
                    <img src="../img/'.$row["id_categoria"].'.png" alt="" class="imagenPublicacion publicpestana1">
                    <div class="informacionPublicacion publicpestana1">
                        <table class="tablaInformacion publicpestana1">
                            <tr>
                                <td class="nombreColumna publicpestana1">Nombre producto: </td>
                                <td>'.$row["nombre_producto"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Precio: </td>
                                <td>$'.$row["precio"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Categor&iacute;a: </td>
                                <td>'.$row["descripcion"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Medidas: </td>
                                <td>'.$row["medidas"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Inventario: </td>
                                <td>'.$row["inventario"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Vendedor: </td>
                                <td>'.$row["nombre"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">id publicaci&oacute;n: </td>
                                <td>'.$row["id_publicacion"].'</td>
                            </tr>
                        </table>

                        <table class="tablaInformacion publicpestana1" id="tabla2">
                            <tr>
                                <td class="nombreColumna publicpestana1" id="domicilioTitulo">Datos de la compra: </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Cantidad: </td>
                                <td>'.$row["cantidad"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Forma de pago: </td>
                                <td>'.$row["forma_pago"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana1">Cantidad de pago: </td>
                                <td>$'.$row["cantidad_pago"].'</td>
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

                ';

            }
        }
        else {
          echo '<h2 class="tituloContenidoVacio">No se encuentra ninguna publicacion en compras</h2>';
        }
    }
     /*
        SELECT id_compra, historial_compras.id_publicacion, cantidad, forma_pago, cantidad_pago, historial_compras.id_usuario, publicaciones.nombre_producto, publicaciones.imagen, categorias.descripcion, publicaciones.precio, publicaciones.medidas, publicaciones.inventario, 
        usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno 
        FROM (((historial_compras 
            INNER JOIN publicaciones ON historial_compras.id_publicacion = publicaciones.id_publicacion)
            INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria)
            INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) 
            WHERE historial_compras.id_usuario = 6 (id usuario que realizo la compra);

     */ 
?>