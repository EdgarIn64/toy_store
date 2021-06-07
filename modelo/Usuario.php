<?php 
session_start();
include_once("modelo/AccesoDatos.php");

class Usuario {
	protected $nombre="";
	protected $apellido_paterno="";
	protected $apellido_materno="";
	protected $correo="";
	protected $contrasena="";
	protected $bandera=false;

	public function getBandera(){
		return $this->bandera;
	}	

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($valor){
		$this->nombre = $valor;
	}

	public function getPaterno(){
		return $this->apellido_paterno;
	}
	public function setPaterno($valor){
		$this->apellido_paterno = $valor;
	}

	public function getMaterno(){
		return $this->apellido_materno;
	}
	public function setMaterno($valor){
		$this->apellido_materno = $valor;
	}

	public function getCorreo(){
		return $this->correo;
	}
	public function setCorreo($valor){
		$this->correo = $valor;
	}

	public function getContrasena(){
		return $this->contrasena;
	}
	public function setContrasena($valor){
		$this->contrasena = $valor;
	}

	public function validarUsuario(){
		$bandera = false;
		$sQuery = "";
		$pubQuery = "";
		$arrRS = null;
		$arr = null;
		$sQuery = "SELECT * FROM usuarios WHERE correo = '".$this->correo."' AND contrasena = '".$this->contrasena."'";
		//Crear, conectar, ejecutar, desconectar
		$conexion = new AccesoDatos();
		if ($conexion->conectar()){
			$arrRS = $conexion->ejecutarConsulta($sQuery);
			$_SESSION["datos"]=$arrRS;
			$pubQuery = "SELECT * FROM publicaciones WHERE id_usuario = '".$_SESSION["datos"][0][0]."'";
			$arr = $conexion->ejecutarConsulta($pubQuery);
			$_SESSION["publicacion"]=$arr;
			$conexion->desconectar();
			if ($arrRS != null){
				$this->bandera = true;
			}
		}
		return $this->bandera;
	}

}

?>