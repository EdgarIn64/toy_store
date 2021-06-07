<?php
 
require("../modelo/AccesoDatos.php");

    function mostrarConversaciones(){
        $num=0;
        $idSesion= $_SESSION['datos'][0][0];
        
        $dbm = new AccesoDatos(); 
        $dbm->conectar();

        $oMysqlm = $dbm->getConex(); 
        $Querym= "SELECT * FROM conversacion WHERE id_usuario='".$idSesion."' ORDER BY id_conversacion ASC";         

        $Resultado1 = $oMysqlm->query( $Querym );  // se lanza la consulta
        $dbm->desconectar();
        
        if($Resultado1!=null){
            
            while($row1 =$Resultado1->fetch_array()){

                $dbm1 = new AccesoDatos(); 
                $dbm1->conectar();
                $num=$num+1;

                $oMysqlm = $dbm1->getConex(); 
                $Querym= "SELECT * FROM usuarios WHERE id_usuario='".$row1["usuario_receptor"]."'";         
                $Resultado2 = $oMysqlm->query( $Querym );  // se lanza la consulta
                $dbm1->desconectar();
                if($Resultado2!=null){
                    while($row2 =$Resultado2->fetch_array()){
                        
                        echo'
                        <section class="seccionMensajes" style="width: 80%;">
                            <img class="imagenPublicacion" src="../img/logoUsuario.png" alt=""><br>
                            <label id="titutoUsuario"><strong>Usuario:</strong> '.$row2["nombre"].' '.$row2["apellido_paterno"].' '.$row2["apellido_materno"].'</label> <br>
                            <label id="titutoUsuario"><strong>Id usuario:</strong> '.$row2["id_usuario"].'</label>
                            <table class="accionesMensajes">
                                <tr>
                                <form method="post" action="../vista/mensajesChat.php">
                                <input type="hidden" name="idReceptor" value="'.$row2["id_usuario"].'">
                                <input type="hidden" name="idConversacion" value="'.$row1["id_conversacion"].'">
                                <td><input type="submit" value="Contestar mensajes" name="enviarMensaje" class="boton botones"></td>
                                </form>
                                </tr>
                            </table>
                        </section>
                        ';
                    }
                }
                else{

                }
                
            }

        }
        else{
            echo'
            <section class="seccionMensajes" style="width: 80%;">
            <label id="titutoUsuario"><strong>No se encontraron conversaciones</strong></label>
            </section>
            ';

        }
        $dbm->conectar();

            $oMysqlm = $dbm->getConex(); 
            $Querym= "SELECT * FROM conversacion WHERE usuario_receptor='".$idSesion."' ORDER BY id_conversacion ASC";         

            $Resultado3 = $oMysqlm->query( $Querym );  // se lanza la consulta
            $dbm->desconectar();
            if($Resultado3!=null){
                while($row3 =$Resultado3->fetch_array()){
                    $dbm->conectar();
                    $num=$num+1;
                    $oMysqlm = $dbm->getConex(); 
                    $Querym= "SELECT * FROM usuarios WHERE id_usuario='".$row3["id_usuario"]."'";         
                    $Resultado4 = $oMysqlm->query( $Querym );  // se lanza la consulta
                    $dbm->desconectar();
                    if($Resultado4!=null){
                        while($row4=$Resultado4->fetch_array()){

                            echo'
                                <section class="seccionMensajes" style="width: 80%;">
                                    <img class="imagenPublicacion" src="../img/logoUsuario.png" alt=""> <br>
                                    <label id="titutoUsuario"><strong>Usuario: </strong> '.$row4["nombre"].' '.$row4["apellido_paterno"].' '.$row4["apellido_materno"].'</label><br>
                                    <label id="titutoUsuario"><strong>Id usuario: </strong> '.$row4["id_usuario"].'</label>
                                    <table class="accionesMensajes"> 
                                        <tr>
                                            <form method="post" action="../vista/mensajesChat.php">
                                            <input type="hidden" name="idReceptor" value="'.$row4["id_usuario"].'">
                                            <input type="hidden" name="idConversacion" value="'.$row3["id_conversacion"].'">
                                            <td><input type="submit" value="Contestar mensajes" name="enviarMensaje" class="boton botones"></td>
                                            </form>
                                      
                                        </tr>
                                    </table>
                                </section>
                                ';
                        }
                    }
                    else{

                    }
                }

            }
            else{

            }
        if($num==0){
            echo'
            <section class="seccionMensajes" style="width: 80%;">
            <label id="titutoUsuario"><strong>No se encontraron conversaciones</strong></label>
            </section>
            ';
        }     
    }



    function conversacionNueva($idcarrito){
        $db = new AccesoDatos(); 
        $db->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 
        
        $oMysql = $db->getConex(); 
        $Query= "SELECT carro_compras.id_carro, carro_compras.id_publicacion, publicaciones.id_usuario
              FROM (carro_compras
              INNER JOIN publicaciones ON carro_compras.id_publicacion = publicaciones.id_publicacion)
              WHERE carro_compras.id_carro='".$idcarrito."'";         
        // id_carro, id_publicacion, id_publicacion
        $Resultado = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar(); $row1 =$Resultado->fetch_array();
        if($Resultado!=null || $row1>0){
 
                $usuarioCarro=$row1["id_usuario"];
                
                $busqueda=buscar($usuarioCarro);

                if($busqueda==true){

                        $dbc = new AccesoDatos(); 
                        $dbc->conectar();
                        $oMysqlc = $dbc->getConex(); 
                        $Queryc= "INSERT INTO conversacion(id_usuario, mensaje_inicio, usuario_receptor)
                                VALUES ('".$idSesion."','Se comenzo una conversacion','".$usuarioCarro."')";         
        
                        $Resultadoc = $oMysqlc->query( $Queryc );  // se lanza la consulta
                        $dbc->desconectar();
                        if($Resultadoc!=null){
        
                            echo "<script>alert('Se creo la conversacion')</script>";
                        }
                        else{
                            echo "<script>alert('No se creo la conversacion')</script>";
                        }
                }
                else{
                    echo "<script>alert('Se encontro una conversacion ya existente')</script>";
                    
                }     
             
        } else{
            echo "<script>alert('la publicacion no se encontro')</script>";
       }
    }


    function buscar($idUsuarioCarro){
        $dbb = new AccesoDatos(); 
        $dbb->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 
        //echo "<script type='text/javascript'>alert('Entro a buscar con el valor de id del usuario: ".$idUsuarioCarro."')</script>";
        $oMysqlb = $dbb->getConex(); 
        $Queryb= "SELECT * FROM conversacion WHERE conversacion.usuario_receptor='".$idUsuarioCarro."' AND conversacion.id_usuario='".$idSesion."'";         

        $ResultadoB = $oMysqlb->query( $Queryb );  // se lanza la consulta
        $dbb->desconectar();
        $row1a =$ResultadoB->fetch_array();
        if($ResultadoB!=null && $row1a>0 || $row1a!=null){ 
            //echo "<script>alert('Esta como receptor el usuario buscado, el row tiene valor=".$row1a[0]."')</script>";
  /*
            echo'
            <script> alert("Entro a que segun es receptor: .... id usuario receptor:  '.$row1a["usuario_receptor"].' ---- id usuario (yo):  '.$row1a["id_usuario"].'")</script>
            ';*/

            return false;
        }
        else{
            $dbb->conectar();
            $oMysqlb = $dbb->getConex(); 
            $Queryb= "SELECT * FROM conversacion WHERE conversacion.usuario_receptor='".$idSesion."' AND conversacion.id_usuario ='".$idUsuarioCarro."'";         
            $Resultadob = $oMysqlb->query( $Queryb );  // se lanza la consulta
            $dbb->desconectar();
            $row2a =$ResultadoB->fetch_array();
            if($Resultadob!=null && $row2a>0 || $row2a!=null){

                echo'
                <script> alert("Entro a que segun es id el: .... id usuario:  '.$row2a["id_usuario"].' ---- receptor (yo):  '.$row2a["usuario_receptor"].'")</script>
                ';
    
                return false;
            }
            else{
                return true;
            }
        }
    }


    
?>