<?php
    session_start();
    require("../modelo/AccesoDatos.php");   

    function categoria($valor) {
        $db = new AccesoDatos();  
        $db->conectar();
        $oMysql = $db->getConex();

        $idSesion= $_SESSION['datos'][0][0];

        $Query= "SELECT id_publicacion, nombre_producto, imagen, categorias.descripcion, precio, medidas, inventario, usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno, publicaciones.id_usuario 
        FROM ((publicaciones INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria AND categorias.id_categoria=$valor) 
        INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) WHERE publicaciones.id_usuario != $idSesion";             
                  //$oMysql->query    seria como Objeto.metodo
        $Result = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar(); 
        if($Result!=null){
            while($row =$Result->fetch_array()){                
                
                $inventario=$row["inventario"];
                if($inventario<=0){
                    $inventario="<strong> Agotado por ahora </strong>";
                    echo"
                    <script> 
                        function publicacion".$row["id_publicacion"]."(){
                            var Css = { 'background': 'rgba(116, 113, 113, 0.712)', 'color':'black'};
                            $('#publicacionTA').attr('disabled', true);
                            $('#publicacion".$row["id_publicacion"]." ').css(Css);
                        }
                    </script>
                    ";
                }    
 
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
                                <td>'.$inventario.'</td>
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
                            <input type="submit" class="agregarCarro boton publicpestana'.$valor.'" value="Agregar al carro" name="agregar" id="publicacion'.$row["id_publicacion"].'">
                        </form>   

                        <form method="post" action=""> 
                            <input type="submit" class="verPublicacion boton publicpestana'.$valor.'" value="Ver publicaci&oacute;n" name="ver'.$row["id_publicacion"].'">
                        </form>';
                echo '</div>
                </div>
                <hr> 
                ';
                echo "</section>
                "; 
                $inventario=$row["inventario"];
                if($inventario<=0){
                    echo"
                    <script>
                            var Css = { 'background': 'rgba(116, 113, 113, 0.712)', 'color':'black'};
                            $('#publicacion".$row["id_publicacion"]." ').attr('disabled', true);
                            $('#publicacion".$row["id_publicacion"]." ').css(Css);
                    </script>
                    ";
                }  
            }

        }
        else {
          echo '<h2 class="tituloContenidoVacio">No se encuentra ninguna publicacion en esta categoria</h2>';
        }
    }
?>
