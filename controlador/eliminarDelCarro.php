<?php  
		
        $idUsuario=$_POST['sesion'];
        $idCarro=$_POST['id'];
?>

<?php 
require("../modelo/AccesoDatos.php"); 
        $baseD = new AccesoDatos();  
        $baseD->conectar();
        $OMysqlD = $baseD->getConex(); 

        $QueryD= "DELETE FROM carro_compras WHERE id_carro ='".$idCarro."' AND id_usuario='".$idUsuario."'";           
        
        $ResultD = $OMysqlD->query( $QueryD ); 
        $baseD->desconectar();
        if($ResultD!=null){
        ?>
            <script>alert("Se elimino al carro de compras");</script> 
        <?php 
        }
        else
        {
        ?>
            <script>alert("No se hizo nada");</script>
        <?php 
        }
    ?>
        <script> window.location.replace('../vista/carrito.php');</script> 
    <?php 
            
?>