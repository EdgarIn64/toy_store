<?php    
    session_start();
    if(isset($_POST['IdPublicacion'])) {
        $idPublicacion=$_POST['IdPublicacion'];
        $idUsuario=$_POST['IdSesion'];
    }
    else {
        $idPublicacion=$_SESSION['publicacion'][0][0];
        $idUsuario=$_SESSION['datos'][0][0];   
    }

    $verificar=buscarRegistro($idPublicacion,$idUsuario);
    if($verificar){
   
        $base = new AccesoDatos();  
        $base->conectar();
        $OMysql1 = $base->getConex(); 

        $Query1= "INSERT INTO `carro_compras`(`id_publicacion`, `id_usuario`) VALUES ('".$idPublicacion."','".$idUsuario."')";             
        $Result1 = $OMysql1->query( $Query1 ); 
        $base->desconectar();
        if($Result1!=null){
            echo '<a href="../vista/categorias.php" id="refrescar" style="display:none;"> </a>';
        ?>
            <script>alert("Se agrego al carro de compras");
                $(document).ready(function(){
                    $("#refrescar").trigger("click");
                });
            </script> 
        <?php

        }
        else
        {
        ?>
            <script>alert("No se hizo nada");
                $(document).ready(function(){
                    $("#refrescar").trigger("click");
                });
            </script>
        <?php
        }
    


    }
    else{
        echo '<a href="../vista/categorias.php" id="refrescar" style="display:none;"> </a>';
        ?>
            <script>alert("La publicacion ya se encuentra en carrito de compras.");
                $(document).ready(function(){
                    $("#refrescar").trigger("click");
                });
            </script>
        <?php
    }

    function buscarRegistro($publicacion,$usuario){
        $base = new AccesoDatos();  
        $base->conectar();
        $OMysql1 = $base->getConex(); 

        $Query1= "SELECT * FROM carro_compras WHERE id_publicacion='".$publicacion."' AND id_usuario='".$usuario."'";             
        
        $Result1 = $OMysql1->query( $Query1 ); 
        $base->desconectar();
        if($Result1!=null){
            $num=0;
            while($row=$Result1->fetch_array()){
                $num=$num+1;
                
            }

            if($num>0){
                return false;
            }
            else{
                if($num==0){
                    return true;
                }
            }
            
            
        }else{
            
        }
    }    


 ?>