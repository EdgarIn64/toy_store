<?php  
require("../modelo/AccesoDatos.php");

function verMensajes($usuario,$conversacion){ //MUESTRA LOS MENSAJES DE LA CONVERSACION (NO MUESTRA NADA PORQUE NO HAY REGISTROS)
   
    if($usuario!=" "|| $conversacion!=" "){
        $idSesion= $_SESSION['datos'][0][0];
 
        $db = new AccesoDatos(); 
        $db->conectar();
        $oMysql = $db->getConex(); 
       
        $Query= "SELECT * FROM mensajes WHERE id_conversacion='".$conversacion."' ORDER BY id_mensaje ASC";         
        $Resultado = $oMysql->query( $Query );  // se lanza la consulta
        $db->desconectar();
        
         if($Resultado!=null){
            
            while($row=$Resultado->fetch_array()){

                if($row["id_usuario_mensaje"]==$idSesion){
                    $mensajesChat=$mensajesChat.'
	                <div id="mensajeEnviado">'.$row["mensaje"].'</div>\n';
                }
               
                if($row["id_usuario_mensaje"]==$usuario){
                    $mensajesChat=$mensajesChat.'
	                <div id="mensajeRecibido">'.$row["mensaje"].'</div>\n';
                }
                
            }
        }
        else{
            echo "<script>alert('No se encontro la conversacion')</script>";
        }
    }else{
        $mensajesChat=" ";
    } 
    $real=explode("\n", $mensajesChat);
    return $real; 
}


    function enviarMensaje(){ //FUNCION ENCARGADA DE REGISTRAR MENSAJES
        
        $conversacion=$_POST["idConversacionMensaje"];
        
        $receptor=$_POST["receptor"]; //ID DEL USUARIO A MANDARLE EL MENSAJE 
        
        $mensaje=$_POST["mensajeNuevo"];
       
        $idSesion= $_SESSION['datos'][0][0];
        
        $hora=$_POST["hora"];
        
 
        $db1 = new AccesoDatos(); 
        $db1->conectar();
        $oMysql1 = $db1->getConex(); 
        $Query1= "INSERT INTO mensajes(id_conversacion, mensaje, dia_creacion, id_usuario_mensaje) 
                  VALUES ('".$conversacion."','".$mensaje."','".$hora."','".$idSesion."')";         
        $Resultado1 = $oMysql1->query( $Query1 );  // se lanza la consulta
        $db1->desconectar();
        if($Resultado1!=null){
            echo'  
                <form action="mensajesChat.php" method="post">
			<input type="hidden" name="idReceptor" value="'.$receptor.'">
			<input type="hidden" name="idConversacion" value="'.$conversacion.'">
			<input type="submit" value="refrescarBoton" id="refrescar" style="display:none;">
		        </form>
            <script>
            refrescar();
            </script> '; //REFRESCA PAGINA
        }else{
            echo'
                <form action="mensajesChat.php" method="post">
			<input type="hidden" name="idReceptor" value="'.$receptor.'">
			<input type="hidden" name="idConversacion" value="'.$conversacion.'">
			<input type="submit" value="refrescarBoton" id="refrescar" style="display:none;">
		        </form>
            <script>
            alert("No se registro el mensaje");
            refrescar();
            </script> '; //REFRESCA PAGINA Y MANDA MENSAJE DE QUE NO SE ENVIO (FALLO DE LA CONSULTA)
        }
    }
?>