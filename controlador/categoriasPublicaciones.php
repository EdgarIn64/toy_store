<?php

    function ejemplo($valor) {
        echo ' 
            <section id="listaPublicaciones" class="publicpestana'.$valor.'">

            <div class="publicacionCategoria publicpestana'.$valor.'">
                <img src="../img/Auxiliar.jpg" alt="" class="imagenPublicacion publicpestana'.$valor.'">';
                if(isset($_POST['ver'])){
                    echo "<script type='text/javascript'>
                        window.location.replace('../vista/publicacion/general.php');
                    </script>";
                }
                echo '<div class="informacionPublicacion publicpestana'.$valor.'">
                    <table class="tablaInformacion publicpestana'.$valor.'">
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Nombre producto: </td>
                            <td>Nombre_producto</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Precio: </td>
                            <td>Precio</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Categor&iacute;a: </td>
                            <td>Descripcion</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Medidas: </td>
                            <td>Medidas</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Inventario: </td>
                            <td>Inventario</td>
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">Vendedor: </td>
                            <td>Nombre</td> 
                        </tr>
                        <tr>
                            <td class="nombreColumna publicpestana'.$valor.'">id publicaci&oacute;n: </td>
                            <td>ID</td>
                        </tr> 
                    </table>
                    
                    <form method="post" action="">
                        <input type="text" name="IdPublicacion" value="ID" style="display: none;">
                        <input type="text" name="IdSesion" value="ID" style="display: none;">
                        <input type="submit" class="agregarCarro boton publicpestana'.$valor.'" value="Agregar al carro" name="agregar">
                    </form>   

                    <form method="post" action=""> 
                        <input type="submit" class="verPublicacion boton publicpestana'.$valor.'" value="Ver publicaci&oacute;n" name="ver"]">
                    </form>';
            echo '</div>
            </div>
            <hr> 
            ';
            echo "</section>"; 
            
    }

    function categoria($valor) {
        require("../modelo/AccesoDatos.php");   
        $db = new AccesoDatos();
        $db->conectar();
        $oMysql = $db->getConex();

        $idSesion= $_SESSION['datos'][0][0];

        $Query= "SELECT id_publicacion, nombre_producto, imagen, categorias.descripcion, precio, medidas, inventario, usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno 
        FROM ((publicaciones INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria AND categorias.id_categoria=$valor) 
        INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario)";             
                  //$oMysql->query    seria como Objeto.metodo
        $Result = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar();
        if($Result!=null){
            while($row =$Result->fetch_array()){                
                
                echo ' 
                <section id="listaPublicaciones" class="publicpestana'.$valor.'">

                <div class="publicacionCategoria publicpestana'.$valor.'">
                    <img src="../img/publicaciones/'.$row["imagen"].'" alt="" class="imagenPublicacion publicpestana'.$valor.'">';
                    if(isset($_POST['ver'.$row["id_publicacion"]])){
                        $_SESSION["publicacion"][0][0]=$row["id_publicacion"];
                        $_SESSION["img"]="../../img/publicaciones/".$row["imagen"];
                        echo "<script type='text/javascript'>
                            window.location.replace('../vista/publicacion/general.php');
                        </script>";
                    }
                    echo '<div class="informacionPublicacion publicpestana'.$valor.'">
                        <table class="tablaInformacion publicpestana'.$valor.'">
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Nombre producto: </td>
                                <td>'.$row["nombre_producto"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Precio: </td>
                                <td>$'.$row["precio"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Categor&iacute;a: </td>
                                <td>'.$row["descripcion"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Medidas: </td>
                                <td>'.$row["medidas"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Inventario: </td>
                                <td>'.$row["inventario"].'</td>
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">Vendedor: </td>
                                <td>'.$row["nombre"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"].'</td> 
                            </tr>
                            <tr>
                                <td class="nombreColumna publicpestana'.$valor.'">id publicaci&oacute;n: </td>
                                <td>'.$row["id_publicacion"].'</td>
                            </tr> 
                        </table>
                        <input type="text" name="imagenNombrePublicacion" value="'.$row["imagen"].'" style="display: none;">
                        
                        <form method="post" action="">
                            <input type="text" name="IdPublicacion" value="'.$row["id_publicacion"].'" style="display: none;">
                            <input type="text" name="IdSesion" value="'.$idSesion.'" style="display: none;">
                            <input type="submit" class="agregarCarro boton publicpestana'.$valor.'" value="Agregar al carro" name="agregar">
                        </form>   

                        <form method="post" action=""> 
                            <input type="submit" class="verPublicacion boton publicpestana'.$valor.'" value="Ver publicaci&oacute;n" name="ver'.$row["id_publicacion"].'">
                        </form>';
                echo '</div>
                </div>
                <hr> 
                ';
                echo "</section>"; 
            }

        }
        else {
          echo '<h2 class="tituloContenidoVacio">No se encuentra ninguna publicacion en esta categoria</h2>';
        }
    }
?>
