<?php 
include_once("../modelo/AccesoDatos.php");
session_start();

class Publicacion {
	protected $nombre_prod="";
	protected $imagen="";
	protected $id_categoria=0;
	protected $precio=0;
	protected $medidas="";	
	protected $inventario=0;
	protected $id_usuario=0;

	public function getNombre(){
		return $this->nombre_prod;
	}
	public function setNombre($valor){
		$this->nombre_prod = $valor;
	}

	public function getImagen(){
		return $this->imagen;
	}
	public function setImagen($valor){
		$this->imagen = $valor;
	}

	public function getCategoria(){
		return $this->id_categoria;
	}
	public function setCategoria($valor){
		$this->id_categoria = $valor;
	}

	public function getPrecio(){
		return $this->precio;
	}
	public function setPrecio($valor){
		$this->precio = $valor;
	}

	public function getMedidas(){
		return $this->medidas;
	}
	public function setMedidas($valor){
		$this->medidas = $valor;
	}

	public function getInventario(){
		return $this->inventario;
	}
	public function setInventario($valor){
		$this->inventario = $valor;
	}
	
	public function getUsuario(){
		return $this->id_usuario;
	}
	public function setUsuario($valor){
		$this->id_usuario = $valor;
	}

}

?>