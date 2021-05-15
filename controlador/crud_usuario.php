<?php 
  require("../../modelo/AccesoDatos.php");
  function create() {
    session_start();
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query= "INSERT INTO usuarios(nombre, apellido_paterno, apellido_materno, correo, contrasena) VALUES ('".$_POST["nombre"]."','".$_POST["apellido_paterno"]."','".$_POST["apellido_materno"]."','".$_POST["correo"]."','".$_POST["contra"]."')";             
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query( $Query );  // se lanza la consulta

    if($Result!=null){
      $sQuery = "SELECT * FROM usuarios WHERE correo = '".$_POST["correo"]."' AND contrasena = '".$_POST["contra"]."'";
      $arrRS = $db->ejecutarConsulta($sQuery);
      $_SESSION["datos"]=$arrRS;

      $_SESSION["usuario"] = true;
      header("Location: ../principal.php");
//      require('../../controlador/login.php');
    }
    else {
      echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
    }
    $db->desconectar();
  }

  function read() {
//    session_start();
    $arr = ['id_usuario', 'nombre', 'paterno', 'materno', 'correo', 'contrasena', 'colonia', 'calle', 'no_externo', 'no_interno', 'cp', 'ciudad', 'estado', 'tel_celular', 'tel_extra'];

    echo "<script type='text/javascript'>";
    for ($i=0; $i<15; $i++)
      echo "document.getElementById('".$arr[$i]."').innerHTML ='".$_SESSION["datos"][0][$i]."';";
    echo "</script>";
    if(file_exists('../../img/perfil/'.$_SESSION['datos'][0][0].'.png'))
      $_SESSION['imagen']='../../img/perfil/'.$_SESSION['datos'][0][0].'.png';
    else
      $_SESSION['imagen']='../../img/perfil.png';
  }

  function update() {
    $db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $Query="";
    if(isset($_POST['guardar']))
      $Query= "UPDATE usuarios SET nombre = '".$_POST["nombre"]."', apellido_paterno = '".$_POST["paterno"]."', apellido_materno = '".$_POST["materno"]."', contrasena = '".$_POST["contrasena"]."' WHERE correo = '".$_SESSION["datos"][0][4]."'";
    if(isset($_POST['guardar_direccion']))
      $Query= "UPDATE usuarios SET colonia = '".$_POST["colonia"]."', calle = '".$_POST["calle"]."', no_externo = '".$_POST["no_externo"]."', no_interno = '".$_POST["no_interno"]."', cp = '".$_POST["cp"]."', ciudad = '".$_POST["ciudad"]."', estado = '".$_POST["estado"]."', tel_celular = '".$_POST["tel_celular"]."', tel_extra = '".$_POST["tel_extra"]."' WHERE correo = '".$_SESSION["datos"][0][4]."'";
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query($Query);  // se lanza la consulta
    if($Result!=null){
      $sQuery = "SELECT * FROM usuarios WHERE correo = '".$_SESSION['datos'][0][4]."'";
      $arrRS = $db->ejecutarConsulta($sQuery);
      $_SESSION["datos"]=$arrRS;
      header("Location: cuenta.php");
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
    $Query= "DELETE FROM usuarios WHERE id_usuario='".$_SESSION["datos"][0][0]."'";
    $Query= "DELETE FROM publicaciones WHERE id_usuario='".$_SESSION["datos"][0][0]."'";
    print($Query);
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query($Query);  // se lanza la consulta
    if($Result!=null) {
      header("Location: ../principal.php");
      echo "<script type='text/javascript'>";
      echo "alert(Se elimino su cuenta);";
      echo "</script>";
    }
    else {
      echo "<script type='text/javascript'>alert('No se pudo eliminar la cuenta')</script>";
    }
    $db->desconectar();
  }

  function foto() {
    $nombre = $_SESSION['datos'][0][0].'.png';
    $guardado = $_FILES['foto']['tmp_name'];
    if(!file_exists('foto')){
      mkdir('foto',0777,true);
      if(file_exists('foto')){
        if(move_uploaded_file($guardado, '../../img/perfil/'.$nombre))
          echo "";
        else
          echo "";
      }
    }
    else {
      if(move_uploaded_file($guardado, '../../img/perfil/'.$nombre))
        echo "";
      else
        echo "";
    }
//    read();
  }

?>