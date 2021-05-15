<?php
    
        $idPublicacion=$_POST['IdPublicacion'];
        $idUsuario=$_POST['IdSesion'];


        $base = new AccesoDatos();  
        $base->conectar();
        $OMysql1 = $base->getConex(); 

        $Query1= "INSERT INTO `carro_compras`(`id_carro`, `id_publicacion`, `id_usuario`) VALUES ('','".$idPublicacion."','".$idUsuario."')";             
        
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
    
 ?>