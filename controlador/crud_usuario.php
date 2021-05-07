<?php 
/* Inhabilitado para la primera revision
  require("../modelo/AccesoDatos.php");

  function create() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "INSERT INTO usuarios(nombre, apellido_paterno, apellido_materno, correo, contrasena) VALUES ('".$_POST["nombre"]."','".$_POST["apellido_paterno"]."','".$_POST["apellido_materno"]."','".$_POST["correo"]."','".$_POST["contra"]."')";             
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta
    $db->desconectar();
    if($Result!=null){
      echo "<script type='text/javascript'>limpiar();</script>";
      echo "<div class='formulario'>";
      echo "<h1>Se registro correctamente su cuenta</h1>";
      echo "<div class='cancelar'>";
      echo "<a href='../vista/principal.php' class='boton'>Comenzar</a>";
      echo  "</div>";
      echo "</div>";
    }
    else {
      echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
    }
  }

  function read() {
    session_start();
    $arr = ['id_usuario', 'nombre', 'paterno', 'materno', 'correo', 'contrasena'];

    echo "<script type='text/javascript'>";
    for ($i=0; $i<6; $i++)
      echo "document.getElementById('".$arr[$i]."').innerHTML ='".$_SESSION["datos"][0][$i]."';";
    echo "</script>";
  }

  function update() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "UPDATE usuarios SET nombre = '".$_POST["nombre"]."', apellido_paterno = '".$_POST["paterno"]."', apellido_materno = '".$_POST["materno"]."', contrasena = '".$_POST["contrasena"]."' WHERE correo = '".$_SESSION["datos"][0][4]."'";
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta
    if($Result!=null){
      $sQuery = "SELECT * FROM usuarios WHERE correo = '".$_SESSION['datos'][0][4]."'";
      $arrRS = $db->ejecutarConsulta($sQuery);
      $_SESSION["datos"]=$arrRS;
      echo "<div class='formulario'>";
      echo "<h1>Se registraron correctamente los cambios</h1>";
      echo "<div class='cancelar'>";
      echo "<a href='../vista/cuenta.php' class='boton'>Regresar</a>";
      echo  "</div>";
      echo "</div>";
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
    $Query= "DELETE FROM usuarios WHERE correo='".$_SESSION["datos"][0][4]."';";
    print($Query);
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta
    if($Result!=null) {
      header("Location: index.php");
      echo "<script type='text/javascript'>";
      echo "alert(Se elimino su cuenta);";
      echo "</script>";
    }
    else {
      echo "<script type='text/javascript'>alert('No se lleno pudo eliminar la cuenta')</script>";
    }
    $db->desconectar();
  }
*/ 
?>