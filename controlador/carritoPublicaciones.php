<?php

    function ejemplo() {
        echo ' 
            <section id="listaPublicacionesDelCarro">

                <div class="publicacionDelCarro">
                    <img src="../img/Auxiliar.jpg" alt="" class="imagenPublicacion" width="300" style="float: left;">
                    <div class="informacionPublicacion">
                        <table class="tablaInformacion">
                            <tr>
                                <td class="nombreColumna">Nombre producto: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">Precio: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">Categor&iacute;a: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">Medidas: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">Inventario: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">Vendedor: </td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna">id publicaci&oacute;n: </td>
                                <td>#</td>
                            </tr>
                        </table>

                        <form method="post" action="../controlador/eliminarDelCarro.php">  
                        <input type="text" style="display: none"; name="sesion" value="#">
                        <input type="text" style="display: none"; name="id" value="#">
                        <input type="submit" class="botonEliminar boton" name="Eliminar" value="Borrar del carro de compras"> 
                        </form>

                        <form method="post" action="../vista/mensajesChat.php">
                        <input type="text" style="display: none"; name="IdPublicacion" value="#">
                        <input type="submit" class="botonContactarVendedor boton" value="Contactar vendedor">
                        </form>

                    </div>
                </div>
                <hr>

            </section>
            ';
    }

    function carrito() {  
    require("../modelo/AccesoDatosCarrito.php");  
        $db = new AccesoDatosCarrito(); 
        $db->conectar();

        $idSesion= $_SESSION['datos'][0][0];

        $oMysql = $db->getConex(); 
        $Query= "SELECT id_carro, carro_compras.id_publicacion, publicaciones.nombre_producto, publicaciones.imagen, publicaciones.precio, publicaciones.medidas, publicaciones.id_categoria,
                publicaciones.inventario, categorias.descripcion, usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno, carro_compras.id_usuario
                FROM (((carro_compras
                INNER JOIN publicaciones ON carro_compras.id_publicacion = publicaciones.id_publicacion)
                INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria) 
                INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) WHERE carro_compras.id_usuario =".$idSesion." ORDER BY id_carro DESC";             

        $Result = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar();
        if($Result!=null){
            while($row =$Result->fetch_array()){                

                echo ' 
                <section id="listaPublicacionesDelCarro">

                    <div class="publicacionDelCarro">
                        <img src="../img/publicaciones/'.$row["imagen"].'" alt="" class="imagenPublicacion">
                        <div class="informacionPublicacion">
                            <table class="tablaInformacion">
                                <tr>
                                    <td class="nombreColumna">Nombre producto: </td>
                                    <td>'.$row["nombre_producto"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">Precio: </td>
                                    <td>$'.$row["precio"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">Categor&iacute;a: </td>
                                    <td>'.$row["descripcion"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">Medidas: </td>
                                    <td>'.$row["medidas"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">Inventario: </td>
                                    <td>'.$row["inventario"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">Vendedor: </td>
                                    <td>'.$row["nombre"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"].'</td>
                                </tr>
                                <tr>
                                    <td class="nombreColumna">id publicaci&oacute;n: </td>
                                    <td>'.$row["id_publicacion"].'</td>
                                </tr>
                            </table>

                            <form method="post" action="../controlador/eliminarDelCarro.php">  
                            <input type="text" style="display: none"; name="sesion" value="'.$idSesion.'">
                            <input type="text" style="display: none"; name="id" value="'.$row["id_carro"].'">
                            <input type="submit" class="botonEliminar boton" name="Eliminar" value="Borrar del carro de compras"> 
                            </form>

                            <form method="post" action="../vista/mensajesChat.php">
                            <input type="text" style="display: none"; name="IdPublicacion" value="'.$row["id_publicacion"].'">
                            <input type="submit" class="botonContactarVendedor boton" value="Contactar vendedor">
                            </form>

                        </div>
                    </div>
                    <hr>

                </section>
                ';

            } 
             
        }
        else {
          echo '<h2 class="tituloContenidoVacio">No se encuentra ninguna publicacion</h2>';
        }
    }


/* INSERT INTO `carro_compras`(`id_carro`, `id_publicacion`, `id_usuario`) VALUES ('','1','4'); */

?>