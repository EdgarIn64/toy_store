<?php
    
    
    function ventas() {
    
        $db = new AccesoDatos();
        $db->conectar();
        $oMysql = $db->getConex(); 

        $idSesion= $_SESSION['datos'][0][0]; 

        $Query= "SELECT historial_ventas.id_venta, historial_ventas.id_compra, 
        historial_compras.id_publicacion, historial_compras.cantidad, historial_compras.forma_pago, historial_compras.cantidad_pago, historial_compras.id_usuario, publicaciones.nombre_producto, 
        publicaciones.imagen, categorias.descripcion, publicaciones.precio, publicaciones.medidas, publicaciones.inventario, publicaciones.id_categoria , usuarios.nombre, usuarios.apellido_paterno, 
        usuarios.apellido_materno FROM ((((historial_ventas 
            INNER JOIN historial_compras ON historial_ventas.id_compra = historial_compras.id_compra) 
            INNER JOIN publicaciones ON historial_compras.id_publicacion = publicaciones.id_publicacion) 
            INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria) 
            INNER JOIN usuarios ON historial_compras.id_usuario = usuarios.id_usuario) WHERE publicaciones.id_usuario=".$idSesion."
             ORDER BY historial_ventas.id_venta ASC";             
        
        $Result = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar();
        if($Result!=null){
            while($row =$Result->fetch_array()){                

                $inventario=$row["inventario"];
                if($inventario<=0){
                    $inventario="<strong> Agotado por ahora </strong>";
                }

                echo ' 
                 
                <section id="listaPublicaciones" class="publicpestana2">

                <div class="publicacionHistorial publicpestana2">
                    <img src="../img/publicaciones/'.$row["imagen"].'" alt="" class="imagenPublicacion publicpestana2">
                    <div class="informacionPublicacion publicpestana2">
                        <table class="tablaInformacion publicpestana2">
                            <tr>
                                <td class="nombreColumna publicpestana2">Nombre producto: </td>
                                <td>'.$row["nombre_producto"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Precio: </td>
                                <td>$'.$row["precio"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Categor&iacute;a: </td>
                                <td>'.$row["descripcion"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Medidas: </td>
                                <td>'.$row["medidas"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Inventario: </td>
                                <td>'.$inventario.'</td>
                            </tr>
                        
                            <tr>
                                <td class="nombreColumna publicpestana2">id publicaci&oacute;n: </td>
                                <td>'.$row["id_publicacion"].'</td>
                            </tr>
                        </table>

                        <table class="tablaInformacion publicpestana2 tabla2">
                            <tr>
                            <td colspan="2" class="nombreColumna publicpestana2 domicilioTitulo" >Datos de la venta:</td>
                                
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Usuario: </td>
                                <td>'.$row["nombre"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Id usuario: </td>
                                <td>'.$row["id_usuario"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Cantidad: </td>
                                <td>'.$row["cantidad"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Forma de pago: </td>
                                <td>'.$row["forma_pago"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana2">Cantidad de pago: </td>
                                <td>$'.$row["cantidad_pago"].'</td>
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
          echo '<h2 class="tituloContenidoVacio">No se encuentra ninguna publicacion en ventas</h2>';
        }
    }
     
?>