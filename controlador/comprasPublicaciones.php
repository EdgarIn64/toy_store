<?php
    session_start();
    require("../modelo/AccesoDatos.php");      
 
    function compras($valor) { 
        $db = new AccesoDatos();
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

                $inventario=$row["inventario"];
                if($inventario<=0){
                    $inventario="<strong> Agotado por ahora </strong>";
                }

                echo ' 
                
                <section id="listaPublicaciones" class="publicpestana'.$valor.'">

                <div class="publicacionHistorial publicpestana1">
                    <img src="../img/publicaciones/'.$row["imagen"].'" alt="" class="imagenPublicacion publicpestana1">
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
                                <td>'.$inventario.'</td>
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

                        <table class="tablaInformacion publicpestana1 tabla2">
                            <tr>
                                <td colspan="2" class="nombreColumna publicpestana1 domicilioTitulo" >Datos de la compra:</td>
                                
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
     
?>