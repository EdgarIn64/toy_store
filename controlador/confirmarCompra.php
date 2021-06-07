<?php
session_start();
require("../modelo/AccesoDatos.php"); 

    $dba = new AccesoDatos(); 
    $dba->conectar();
    $idSesiona= $_SESSION['datos'][0][0]; 

    $oMysqla = $dba->getConex(); 
    $Querya= "SELECT * FROM usuarios WHERE id_usuario = '".$idSesiona."'";         

    $Resultado = $oMysqla->query( $Querya );  // se lanza la consulta
    $dba->desconectar();
    if($Resultado!=null){
        while($row=$Resultado->fetch_array()){
            $colonia=$row["colonia"];
            $calle=$row["calle"];
            $noExterno=$row["no_externo"];
            $noInterno=$row["no_interno"];
            $cp=$row["cp"];
            $ciudad=$row["ciudad"];
            $estado=$row["estado"];
            $tel_celular=$row["tel_celular"];
            $tel_extra=$row["tel_extra"];
        }
    }

    function obtenerPublicaciones($proProductos,$cantidades, $NoProductos){ //PINTA LOS DATOS DE LA COMPRA

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
            $i = 0;
            while($row =$Result->fetch_array()){
                if($i<$NoProductos[0] && $NoProductos[0]!=0 && $cantidades[0]!=0 && $proProductos[0]!=0){
                    echo '
                    <tr>
                        <td class="nombreColumna">Producto  '.($i+1).': &nbsp; '.$cantidades[$i].'</td>
                        <td class="nombreColumna">'.$row["nombre_producto"].' </td>
                        <td class="nombreColumna">$'.$proProductos[$i].'</td>
                    </tr>
                ';
                }else{
                }
                $i++;
            }
        }
        else{
            echo '
                    <tr>
                        <td class="nombreColumna">No hay productos</td>
                    </tr>
                ';
        }
        
    }

    function update(){ //UPDATE DEL DOMICILIO
        $db1 = new AccesoDatos(); 
        $db1->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 

        $oMysql1 = $db1->getConex(); 
        $Query1= "UPDATE usuarios SET 
                                    colonia ='".$_POST["colonia"]."', calle ='".$_POST["calle"]."', no_externo ='".$_POST["no_externo"]."',
                                    no_interno='".$_POST["no_interno"]."',cp='".$_POST["cp"]."',ciudad='".$_POST["ciudad"]."',
                                    estado='".$_POST["estado"]."',tel_celular='".$_POST["tel_celular"]."',tel_extra='".$_POST["tel_extra"]."' WHERE id_usuario = '".$idSesion."'";         

        $Result1 = $oMysql1->query( $Query1 );  // se lanza la consulta
        $db1->desconectar();
        if($Result1!=null){
//            echo "<script type='text/javascript'>alert('Se actualizaron los datos')</script>";
            
        }
        else{
  //          echo "<script type='text/javascript'>alert('No se realizo la actualizacion de los datos')</script>";
            
        }
        echo "<script> window.location.replace('../vista/carrito.php');</script>";
        
    }

    function domicilio(){
        $db1 = new AccesoDatos(); 
        $db1->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 
        $oMysql1 = $db1->getConex(); 
        $Query1= "SELECT * FROM usuarios WHERE id_usuario = '".$idSesion."'";
                
        $Result1 = $oMysql1->query( $Query1 );  // se lanza la consulta
        $db1->desconectar();
        if($Result1!=null){
            $domicilio=" ";
            $num=0;

            while($row=$Result1->fetch_array()){

                if(($row["cp"]!="" || $row["cp"]!=null) && ($row["ciudad"]!=""|| $row["ciudad"]!=null) && ($row["estado"]!=""|| $row["estado"]!=null) ){
                
                    $domicilio='Domicilio <br>Colonia: '.$row["colonia"].'<br>Calle: '.$row["calle"].'<br>No. Externo: '.$row["no_externo"].'<br>No. Interno: '
                    .$row["no_interno"].'<br>Codigo Postal: '.$row["cp"].'<br>Ciudad: '.$row["ciudad"].'<br>Estado: '.$row["estado"].'<br>Telefono Celular: '
                    .$row["tel_celular"].'<br>Telefono Extra: '.$row["tel_extra"].'';
                    $num=$num+1;

                }else{  //SE DEJO VACIO    

                }
                
            }
            if($num>0){
                return $domicilio;
            }else{
                return "nada";
            }
            
        }
        else{
            
            
        }
        
    }


 
function venta(){ //REGISTRO DE LA VENTA
        $idSesion= $_SESSION['datos'][0][0]; 
        
        $valor1=$_POST["arrayCantidades"];
        $array1 = explode(',', $valor1);
        $cantidades1 = array_filter($array1,'is_numeric');
    print_r($cantidades1);
        $valor2=$_POST["arrayPorProducto"];
        $array2 = explode(',', $valor2);
        $proProductos1 = array_filter($array2,'is_numeric');

        $valor3=$_POST['arrayNoProductos'];
        $array3 = explode(',', $valor3);
        $NoProductos1 = array_filter($array3,'is_numeric');
        
        $horaNueva=$_POST["hora"];

        $domicilio=domicilio();
    if($domicilio!="nada"){ //IF NUEVO

        
        $formaPago=$_POST["FormaPago"];

        $noTarjeta=$_POST["noTarjeta"];
        $titular=$_POST["titular"];
        $fechaTitular=$_POST["fechaTitular"];
        $tarjetaCodigo=$_POST["tarjetaCodigo"];

        $paqueteria=$_POST["Paqueteria"];
        
        if($formaPago=="Tarjeta"){
            if($noTarjeta=="" || $titular=="" || $fechaTitular=="" || $tarjetaCodigo==""){
                echo "<script>
                        alert('Datos del formulario de tarjeta de credito o debito se encuentran incompletos.');
                        window.location.replace('../vista/carrito.php');
                        </script>";
            }
        }
       
        $bandera=true;
                

            foreach ($cantidades1 as $actual){
                if($actual==0){
                    $bandera=false;
                }
            }

        if($bandera){ 
//            echo "<script type='text/javascript'>alert('Se encuentran todos los datos llenos')</script>";

            $db = new AccesoDatos(); 
            $db->conectar();
            $oMysql = $db->getConex(); 
            $Query= "SELECT id_carro, carro_compras.id_publicacion, publicaciones.nombre_producto, publicaciones.imagen, publicaciones.precio, publicaciones.medidas, publicaciones.id_categoria,
                    publicaciones.inventario, categorias.descripcion, usuarios.nombre, usuarios.apellido_paterno, usuarios.apellido_materno, usuarios.id_usuario
                    FROM (((carro_compras
                    INNER JOIN publicaciones ON carro_compras.id_publicacion = publicaciones.id_publicacion)
                    INNER JOIN categorias ON publicaciones.id_categoria = categorias.id_categoria) 
                    INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario) WHERE carro_compras.id_usuario=".$idSesion." ORDER BY id_carro DESC";         
                    //SELECCIONA LOS PRODUCTOS DEL CARRO

            $Result = $oMysql->query( $Query );  // se lanza la consulta
            $db->desconectar();
            if($Result!=null){
                
                    $i = 0;
                    while($row =$Result->fetch_array()){ 

                        $mensajeCompra1="Productos de la compra por el usuario con id ".$idSesion.": <br>";
                        $idCarroUsuario= $row["id_carro"];

                        $db1 = new AccesoDatos(); 
                        $db1->conectar(); 
                        $oMysql1 = $db1->getConex(); 
                        $Query1= "INSERT INTO historial_compras (id_publicacion, cantidad, forma_pago, cantidad_pago, id_usuario)
                                VALUES ('".$row["id_publicacion"]."','".$cantidades1[$i]."','".$_POST["FormaPago"]."','".$proProductos1[$i]."','".$idSesion."')";           
                                //REGISTRA LA COMPRA CON RESPECTO AL PRODUCTO
                        print_r($Query1);
                        $Result1 = $oMysql1->query( $Query1 );  // se lanza la consulta
                        $db1->desconectar();
                        if($Result1!=null){

                            $mensajeCompra1=$mensajeCompra1."
                            Id publicacion: ".$row["id_publicacion"]."<br>Cantidad de productos:  ".$cantidades1[$i]."<br>Precio a pagar: 
                            ".$proProductos1[$i]."";


                            if($formaPago=="Tarjeta"){
                                $mensajeCompra2="Forma de pago: ".$_POST["FormaPago"]."<br>Titular de la tarjeta: ".$titular."<br>Numero de tarjeta: ".$noTarjeta."<br>Paqueteria: ".$paqueteria."";

                            }else{
                                if($formaPago=="Deposito oxxo"){
                                    $mensajeCompra2="Forma de pago: ".$_POST["FormaPago"]."<br>Paqueteria: ".$paqueteria."";
                                }
                                else{
                                    if($formaPago=="En persona"){
                                        $mensajeCompra2="Forma de pago: ".$_POST["FormaPago"]."<br>";
                                    }
                                }
                            }
                            
                            buscarCompra();
    //                        echo "<script type='text/javascript'>alert('Entrara a conversacion Nueva')</script>";
                            conversacionNueva($idCarroUsuario,$mensajeCompra1,$horaNueva);
                            conversacionNueva($idCarroUsuario,$mensajeCompra2,$horaNueva);
                            conversacionNueva($idCarroUsuario,$domicilio,$horaNueva);

                            
                        }  
                
                        $inventarioNuevo=($row["inventario"])-($cantidades1[$i]);
        print_r($row["inventario"]);
                        $base = new AccesoDatos(); 
                        $base->conectar(); 
                        $oMysql = $base->getConex(); 
                        $Query= "UPDATE publicaciones SET inventario='".$inventarioNuevo."' WHERE id_publicacion='".$row["id_publicacion"]."'";          
                                //ACTUALIZAR INVENTARIO
                        $Resultado = $oMysql->query( $Query );  // se lanza la consulta
                        $base->desconectar();
                        if($Resultado!=null){
                            
                        }
                        $i++;
                    }

                    procesoFinal();
                if($i>0){
                    echo "<script>
                    alert('Proceso exitoso, se realizo la compra.');
                    window.location.replace('../vista/carrito.php');
                    </script>";
                }
                
            }
            else{
                echo "<script type='text/javascript'>alert('Error, no registro la compra')</script>";
            } 
        }else{
            echo "<script type='text/javascript'>alert('Error, asegurese de tener agregados todos los datos correspondientes a los productos del carro de compras.')</script>";
        } 
    
    }else{ //else NUEVO
        echo "<script>
            alert('Los datos de su domicilio se encuentran incompletos');
            window.location.replace('../vista/carrito.php');
            </script>";
    } //se cierra el IF NUEVO
}

    function buscarCompra(){

        $db2 = new AccesoDatos(); 
        $db2->conectar(); 
        $oMysql2 = $db2->getConex(); 
        $Query2= "SELECT MAX(id_compra) AS id_compra FROM historial_compras";
                    //SELECCIONA LA COMPRA REALIZADA PARA HACER LA VENTA
        $Result2 = $oMysql2->query( $Query2 ); 
        $db2->desconectar();
        if($Result2!=null){
        
            while($row3 =$Result2->fetch_array()){
            
                registrarVenta($row3['id_compra']);
                
            }   
        }
        else{
 
        }

    }

    function registrarVenta($idCompra){
        $db3 = new AccesoDatos(); 
        $db3->conectar(); 
        $oMysql3 = $db3->getConex(); 
        $Query3= "INSERT INTO historial_ventas(id_compra) VALUES ('".$idCompra."')";
                    //REGISTRA LA VENTA CON EL ID DE LA COMPRA SELECIONADA ANTERIORMENTE
        print_r($Query3);
        $Result3 = $oMysql3->query( $Query3 );  // se lanza la consulta
        $db3->desconectar();
        if($Result3!=null){
            
        }
        else{
//            echo "<script type='text/javascript'>alert('No se realizo la venta')</script>";
        }        
    }

    function procesoFinal(){
            $idSesiona= $_SESSION['datos'][0][0]; 
            $db3 = new AccesoDatos(); 
            $db3->conectar(); 
            $oMysql3 = $db3->getConex(); 
            $Query3= "DELETE FROM carro_compras WHERE id_usuario='".$idSesiona."'";
                        //ELIMINA REGISTROS DEL CARRO DE COMPRAS
            $Result31 = $oMysql3->query( $Query3 );  // se lanza la consulta
            $db3->desconectar();
            if($Result31!=null){
                
            }
    }
    

    function conversacionNueva($idcarrito,$mensaje,$hora){
//        echo "<script type='text/javascript'>alert('Entro a conversacion nueva')</script>";
        
        $db = new AccesoDatos(); 
        $db->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 
        $m=$mensaje;
        
        $oMysql = $db->getConex(); 
        $Query= "SELECT carro_compras.id_carro, carro_compras.id_publicacion, publicaciones.id_usuario
              FROM (carro_compras
              INNER JOIN publicaciones ON carro_compras.id_publicacion = publicaciones.id_publicacion)
              WHERE carro_compras.id_carro='".$idcarrito."'";         
        // id_carro, id_publicacion, id_publicacion
        $Resultado = $oMysql->query( $Query );  // se lanza la consulta
 //       echo "<script type='text/javascript'>alert('Se lanza la query para buscar el id del usuario con el id del carro pasado')</script>";
        $db->desconectar(); $row1 =$Resultado->fetch_array();
        if($Resultado!=null || $row1>0){
    
                $usuarioCarro=$row1["id_usuario"];
   //             echo "<script type='text/javascript'>alert('Buscara si hay una conversacion ya creada')</script>";//SE CORTA AQUI---
                $busqueda=buscar($usuarioCarro,$m,$hora);

                if($busqueda==true){
     //           echo "<script>alert('La conversacion no existe, la creara')</script>";
                        $dbc = new AccesoDatos(); 
                        $dbc->conectar();
                        $oMysqlc = $dbc->getConex(); 
                        $Queryc= "INSERT INTO conversacion(id_usuario, mensaje_inicio, usuario_receptor)
                                VALUES ('".$idSesion."','Se comenzo una conversacion','".$usuarioCarro."')";         
        
                        $Resultadoc = $oMysqlc->query( $Queryc );  // se lanza la consulta
                        $dbc->desconectar();
                        if($Resultadoc!=null){
                                

                            $busqueda=buscar($usuarioCarro,$m,$hora);
                            if($busqueda==false){
        //                        echo "<script>alert('Busca la conversacion nueva y envia el mensaje')</script>";
                            }

                        }
                        else{
       //                     echo "<script>alert('No se creo la conversacion')</script>";
                        }
                }
                else{
                    
                    
                }     
             
        } else{
   //         echo "<script>alert('La publicacion no se encontro')</script>";
       }
    }


    function buscar($idUsuarioCarro,$m,$horario){ 
   //     echo "<script>alert('Entro a la funcion buscar')</script>";
        $base = new AccesoDatos(); 
        $base->conectar();
        $idSesion= $_SESSION['datos'][0][0]; 
        $mensaje=$m; //MENSAJE A ENVIAR
    //    echo "<script>alert('Realiza la query para buscar la conversacion si el es receptor')</script>";
        $sql=$base->getConex(); 
        $Query="SELECT * FROM conversacion WHERE conversacion.usuario_receptor='".$idUsuarioCarro."' AND conversacion.id_usuario='".$idSesion."'";         

        $Resultadob = $sql->query( $Query );  // se lanza la consulta
        $base->desconectar();
        $row1a =$Resultadob->fetch_array();
        if($Resultadob!=null && $row1a>0 || $row1a!=null){  //SI SE REALIZA LA CONSULTA Y ENTRA AL IF (ENCONTRO LA CONVERSACION)
 //           echo "<script>alert('Saaaaaaaaaaaaaaaaaaaae ejecuta la query y tiene valores, el es receptor')</script>";

            $db1 = new AccesoDatos(); 
            $db1->conectar();
            $oMysql1 = $db1->getConex(); 
            date_default_timezone_set("America/Monterrey"); 
            $horario=date("Y/d/m h:i");
 //           echo "<script>alert('hora: ".$horario."')</script>";
            
            $Query1="INSERT INTO mensajes(id_conversacion, mensaje, dia_creacion, id_usuario_mensaje) VALUES ('".$row1a["id_conversacion"]."','".$mensaje."','".$horario."','".$idSesion."')";

            /*
            $Query1= "INSERT INTO mensajes(id_conversacion, mensaje, dia_creacion, id_usuario_mensaje) 
                    VALUES ('".$row1a["id_conversacion"]."','".$mensaje."','".$horario."','".$idSesion."')";         
            */
            $Resultado1 = $oMysql1->query( $Query1 );  // se lanza la consulta
            $db1->desconectar();
            if($Resultado1!=null){ //NO ENTRA
   //             echo "<script>alert('Envia el mensaje')</script>";
            }else{
     //           echo "<script>alert('No se envio el mensaje')</script>";
            }

            return false; //SE MANDA EL FALSE SI SE ENCONTRO LA CONVERSACION Y COMO SI HUBIERA MANDANDO EL MENSAJE 
        }
        else{ 
//            echo "<script>alert('Yo no soy id_usuario, realiza la query para buscar la conversacion si yo soy receptor')</script>";
            $dbb = new AccesoDatos(); 
            $dbb->conectar();
            $oMysql = $dbb->getConex(); 
            $Queryb= "SELECT * FROM conversacion WHERE conversacion.usuario_receptor='".$idSesion."' AND conversacion.id_usuario ='".$idUsuarioCarro."'";         
            $Resultadob = $oMysql->query( $Queryb );  // se lanza la consulta
            $dbb->desconectar();
            $row2a =$Resultadob->fetch_array();
            if($Resultadob!=null && $row2a>0 || $row2a!=null){ //SI SE REALIZA LA CONSULTA Y ENTRA AL IF (ENCONTRO LA CONVERSACION)
  //          echo "<script>alert('zzzSe ejecuta la query y tiene valores, yo soy receptor')</script>";

                $db1 = new AccesoDatos(); 
                $db1->conectar();
                $oMysql1 = $db1->getConex(); 
                
  //              echo "<script>alert('cacid de conversacion: ".$row2a["id_conversacion"]."')</script>";
                
            date_default_timezone_set("America/Monterrey"); 
            $horario=date("Y/d/m h:i");
    //        echo "<script>alert('hora: ".$horario."')</script>";
            
            $Query1="INSERT INTO mensajes(id_conversacion, mensaje, dia_creacion, id_usuario_mensaje) VALUES ('".$row1a["id_conversacion"]."','".$mensaje."','".$horario."','".$idSesion."')";
                /*
                $Query1= "INSERT INTO mensajes(id_conversacion, mensaje, dia_creacion, id_usuario_mensaje) 
                        VALUES ('".$row2a["id_conversacion"]."','".$mensaje."','".$horario."','".$idSesion."')";
                */        
                $Resultado1 = $oMysql1->query( $Query1 );  // se lanza la consulta
                $db1->desconectar();
                if($Resultado1!=null){ //NO ENTRA
          //          echo "<script>alert('Envia el mensaje')</script>";
                }else{
        //        echo "<script>alert('No se envio el mensaje')</script>";
                }
    
                return false; //SE MANDA EL FALSE SI SE ENCONTRO LA CONVERSACION Y COMO SI HUBIERA MANDANDO EL MENSAJE 
            }
            else{
      //          echo "<script>alert('no se encontro en ninguno de los dos casos')</script>"; //NO ENTRA YA QUE ENCONTRO LA CONVERSACION
                return true;
            } 
        } 
    }



?>