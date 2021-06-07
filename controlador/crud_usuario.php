<?php  
  session_start();
  require("../../modelo/AccesoDatos.php");
  function create() {
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
      echo "<script type='text/javascript'>
            window.location.replace('../principal.php');
        </script>";
    }
    else {
      $sQ = "SELECT correo FROM usuarios WHERE correo = '".$_POST["correo"]."'";
      $arr = $oMysql->query($sQ);
      if($arr != null) {
        echo "<script type='text/javascript'>alert('Correo electronico ya ocupado')</script>";
      }
      else {
        echo "<script type='text/javascript'>alert('No se lleno correctamente el formulario')</script>";
      }
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

  function readImage() {
//    session_start();
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
              //$oMysql->query    seria como Objeto.metodo
    $Result = $oMysql->query($Query);  // se lanza la consulta
    if($Result!=null) {
      $_SESSION['usuario']=null;
      session_destroy();
      header("Location: ../principal.php");
    }
    else {
      echo "<script type='text/javascript'>alert('No se pudo eliminar la cuenta')</script>";
    }
    $db->desconectar();
  }

  function foto() {
    $nombre = $_SESSION['datos'][0][0].'.png';
    $guardado = $_FILES['foto']['tmp_name'];
    if(move_uploaded_file($guardado, '../../img/perfil/'.$nombre))
      $_SESSION['imagen'] = '../../img/perfil/'.$nombre;
    else
      echo "";
  }

?>