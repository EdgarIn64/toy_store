<?php
session_start();
 require("../modelo/AccesoDatos.php");
    function carrito() {  
     
        $db = new AccesoDatos(); 
        $db->conectar();

        $idSesion= $_SESSION['datos'][0][0]; 

        $oMysql = $db->getConex(); 
        $Query= "SELECT id_carro, carro_compras.id_publicacion, publicaciones.nombre_producto, publicaciones.imagen, publicaciones.precio, publicaciones.medidas, publicaciones.id_categoria,
                publicaciones.inventario, categorias.descripcion, usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno, carro_compras.id_usuario
                FROM (((carro_compras
                INNER JOIN publicaciones ON carro_compras.id_publicacion = publicaciones.id_publicacion)
                INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria) 
                INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) WHERE carro_compras.id_usuario=".$idSesion." ORDER BY id_carro DESC";         

        $Result = $oMysql->query( $Query );  // se lanza la consulta 
        $db->desconectar();
        if($Result!=null){
    
            $evento="'return validaNumericos(event)'"; 
            $num=0;
            $publicaciones=array();
            $datosPublicacion=array();
            
            while($row =$Result->fetch_array()){                
                $publicaciones[$num]=$row["id_carro"];
                $num=$num+1;

                echo ' 
                <section id="listaPublicacionesDelCarro" style="font-size: 1.3rem;">

                    <div class="publicacionDelCarro">
                        <img src="../img/publicaciones/'.$row["imagen"].'" alt="'.$row["imagen"].'" class="imagenPublicacion" width="250" style="float:left;">
                        
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
                        <input type="text" style="display: none"; class="obtenerInventario" value="'.$row["inventario"].'">
                            <div class="imputsFormulario "><label class="tituloImput">Cantidad: </label>
                                <input type="text" id="numeroCantidad'.$row["id_carro"].'" value="0" class="inputformulario pagar cantidad" onkeypress='.$evento.' onkeyup="multiplicar'.$row["id_carro"].'();">
                            </div>
                            <input type="text" id="mult'.$row["id_carro"].'" class="inputformulario sumar" style="display:none;" value="0">

                            <form method="post" action="../controlador/eliminarDelCarro.php">  
                            <input type="text" style="display: none"; name="sesion" value="'.$idSesion.'">
                            <input type="text" style="display: none"; name="id" value="'.$row["id_carro"].'">
                            <input type="submit" id="eliminar'.$row["id_carro"].'" class="botonEliminar boton" name="Eliminar" value="Borrar del carro de compras" style="display:none;"> 
                            </form>
                            <br>
                            <div style="float:right;">
                                <input type="button" id="borrar'.$row["id_carro"].'" class="botonEliminar boton" value="Borrar del carro de compras">
                                
                                <form method="post" action="../vista/mensajes.php">
                                <input type="text" style="display: none"; name="carroContacto" value="'.$row["id_carro"].'">
                                <input type="submit" class="botonContactarVendedor boton"  value="Contactar vendedor" name="contactar">
                                </form>
                            </div>
                        </div> 
                    </div>
                    <hr>               
                       
                    <script>
                     
                        function multiplicar'.$row["id_carro"].'(){
                            console.log("entro a multiplicar");
                            var cantidad=$("#numeroCantidad'.$row["id_carro"].'").val();
                            var precio="'.$row["precio"].'";
                            if (isNaN(cantidad)) {
                                $("#numeroCantidad'.$row["id_carro"].'").val(0);
                            } else {
                                var res=precio*(parseFloat($("#numeroCantidad'.$row["id_carro"].'").val()));
                                $("#mult'.$row["id_carro"].'").val(res);
                                sumar();
                            }
                        }
                        $("#borrar'.$row["id_carro"].'").click(function() {
                            var opcion = confirm("¿Borrar del carro de compras?");
                            if(opcion==true){
                                $("#eliminar'.$row["id_carro"].'").trigger("click");
                            
                            }
                          
                          });


                    </script>

                </section>
                ';
            }  
            $productos=count($publicaciones);
            echo '
            <script>
                $("#cantidadProductos").val('.$productos.');
                var p=$("#cantidadProductos").val();
              
            </script>
            '; 
            if($productos==0){
                echo '<h2 class="tituloContenidoVacio" style="margin-bottom: 25%;">No se encuentra ninguna publicacion</h2>';
            }  
        }
        else {
          echo '<h2 class="tituloContenidoVacio" style="margin-bottom: 25%;">No se encuentra ninguna publicacion</h2>
          ';
        }
    }



/* INSERT INTO `carro_compras`(`id_carro`, `id_publicacion`, `id_usuario`) VALUES ('','1','4'); */

?>