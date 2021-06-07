<?php 
  session_start();
  require("../../modelo/AccesoDatos.php");
  
  function create() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $img="Auxiliar.jpg";
    $Query= "INSERT INTO publicaciones VALUES (0,'".$_POST["nombre"]."','".$img."','".$_POST["categoria"]."','".$_POST["precio"]."','".$_POST["medidas"]."','".$_POST["inventario"]."','".$_SESSION["datos"][0][0]."')";             
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta
    if($Result!=null) {
      echo "<h1>".$_POST["nombre"]." Se registro correctamente</h1>";
      $pubQuery = "SELECT * FROM publicaciones WHERE id_usuario = '".$_SESSION["datos"][0][0]."'";
      $arrRS = $db->ejecutarConsulta($pubQuery);
      $_SESSION["publicacion"]=$arrRS;
    }
    else {
      echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
    }
//    foto();
    $db->desconectar();
  }

  function read() {
//    session_start();
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $sQuery = "SELECT * FROM publicaciones WHERE id_publicacion = '".$_SESSION["publicacion"][0][0]."'";
    $arrRS = $db->ejecutarConsulta($sQuery);
    $_SESSION["publicacion"]=$arrRS;
    $_SESSION["img"]="../../img/publicaciones/".$_SESSION["publicacion"][0][2];

    $arr = ['id_publicacion', 'nombre', 'img', 'categoria', 'precio', 'medidas', 'inventario'];
    if($_SESSION["publicacion"][0]!=null){
      $cat=['Papel','Tela','Segunda mano','Pedido'];
      echo "<script type='text/javascript'>";
      for ($i=0; $i<7; $i++){
          if($i!=2)
            echo "document.getElementById('".$arr[$i]."').innerHTML ='".$_SESSION["publicacion"][0][$i]."';";
          if($i==3)
            echo "document.getElementById('".$arr[$i]."').innerHTML ='".$cat[$_SESSION["publicacion"][0][3]-1]."';";
        }
      echo "</script>";
    }
    /*
    if(file_exists('../img/publicaciones/'.$_SESSION['publicacion'][0][0].'.png'))
      $_SESSION['imagen']='../img/publicaciones/'.$_SESSION['publicacion'][0][0].'.png';
    else
      $_SESSION['imagen']='../img/Auxiliar.jpg';
    */
  }

  function update() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "UPDATE publicaciones SET nombre_producto = '".$_POST["nombre"]."', id_categoria = '".$_POST["categoria"]."', precio = '".$_POST["precio"]."', medidas = '".$_POST["medidas"]."', inventario = '".$_POST["inventario"]."' WHERE id_publicacion = '".$_SESSION["publicacion"][0][0]."'";
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta 
    if($Result!=null) {
      $sQuery = "SELECT * FROM publicaciones WHERE id_publicacion = '".$_SESSION['publicacion'][0][0]."'";
      $arrRS = $db->ejecutarConsulta($sQuery);
      $_SESSION["publicacion"]=$arrRS;
      echo "<script type='text/javascript'>
            window.location.replace('ver.php');
        </script>";
    }
    else {
      echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
    }
    $db->desconectar();
  }

  function delete() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "DELETE FROM publicaciones WHERE id_publicacion='".$_SESSION["publicacion"][0][0]."';";
    print($Query);
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta
    if($Result!=null) {
      echo "<script type='text/javascript'>alert('No se pudo eliminar la cuenta')</script>";
      header("Location: lista.php");
    }
    else {
      echo "<script type='text/javascript'>alert('No se pudo eliminar la cuenta')</script>";
    }
    $db->desconectar();
  }

  function foto() {
    $nombre = $_FILES['img']['name'].$_SESSION['publicacion'][0][0];
    $nombre = str_replace(".jpg", "", $nombre);
    $nombre = str_replace(".png", "", $nombre);
    $nombre = $nombre.'.png';
    $guardado = $_FILES['img']['tmp_name'];

    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "UPDATE publicaciones SET imagen = '".$nombre."' WHERE id_publicacion = '".$_SESSION["publicacion"][0][0]."'";
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta 
    if($Result!=null) {
      $sQuery = "SELECT imagen FROM publicaciones WHERE id_publicacion = '".$_SESSION['publicacion'][0][0]."'";
      $rs = $db->ejecutarConsulta($sQuery);
      $_SESSION["img"]="../../img/publicaciones/".$rs[0][0];
    }
    if(move_uploaded_file($guardado, '../../img/publicaciones/'.$nombre))
      echo "";
    else
      $_SESSION["img"]="../../img/publicaciones/Auxiliar.jpg";
  }

?>