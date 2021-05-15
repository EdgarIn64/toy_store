<?php
class AccesoDatosCarrito{
	private $server = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'toy_store';
 	private $oConexion=null; 
 	public function getConex (){
 		return $this->oConexion; 
 	}
	function conectar(){
		$bandera = false;
		try {
		  $this->oConexion = new mysqli("localhost", "root", "", "toy_store");
		  $bandera = true;
		} catch (PDOException $e) {
		  die('Connection Failed: ' . $e->getMessage());
		}
		return $bandera;
	}
	/*Realiza la desconexión de la base de datos*/
 	function desconectar(){
	$bandera = true;
		if ($this->oConexion != null){
			$this->oConexion=null;
		}
		return $bandera;
	}
	
	/*Ejecuta en la base de datos la consulta que recibió por parámetro.
	Regresa
		Nulo si no hubo datos
		Un arreglo bidimensional de n filas y tantas columnas como campos se hayan
		solicitado en la consulta*/
  	function ejecutarConsulta($psConsulta){
		$arrRS = null;
		$rst = null;
		$oLinea = null;
		$sValCol = "";
		$i=0;
		$j=0;

		if ($psConsulta == ""){
	       throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
		}
		try{
			$rst = $this->oConexion->query($psConsulta); //un objeto PDOStatement o falso en caso de error
		}catch(Exception $e){
			throw $e;
		}
		if ($rst){
			foreach($rst as $oLinea){ 
				foreach($oLinea as $llave=>$sValCol){
					if (is_string($llave)){
						$arrRS[$i][$j] = $sValCol;
						$j++;
					}
				}
				$j=0;
				$i++;
			}
		}
		return $arrRS;
	}
	
	/*Ejecuta en la base de datos el comando que recibió por parámetro
	Regresa
		el número de registros afectados por el comando*/
  	function ejecutarComando($psComando){
	$nAfectados = -1;
       if ($psComando == ""){
	       throw new Exception("AccesoDatos->ejecutarComando: falta indicar el comando");
		}
		if ($this->oConexion == null){
			throw new Exception("AccesoDatos->ejecutarComando: falta conectar la base");
		}
		try{
       	   $nAfectados =$this->oConexion->exec($psComando);
		}catch(Exception $e){
			throw $e;
		}
		return $nAfectados;
	}
}

?>
