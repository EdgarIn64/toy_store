<?php  
	function ejemplo() {
		echo "<table>";
			echo "<td>";
				echo "<h1 class='nombre_toy'>Nombre publicacion</h1>";
				echo "<h2 class='id_publicacion'>ID</h2>";
				echo "<img src='../../img/Auxiliar.jpg' width='200'>";
			echo "</td>";
			echo "<td>";
				echo "<form method='post' action=''>";
					echo "<input type='submit' class='boton' name='ver' value='Ver publicaci&oacute;n'>";
				echo "</form>";
			echo "</td>";
		echo "</table>";
		echo "<hr>";
	}
	/*
	require("../../modelo/AccesoDatos.php");
	$db = new AccesoDatos();
    $db->conectar();
    $oMysql = $db->getConex();
    $sQuery = "SELECT * FROM publicaciones WHERE id_usuario = '".$_SESSION['datos'][0][0]."'";
    $arrRS = $db->ejecutarConsulta($sQuery);

	if($arrRS!=null) {
		$longitud=count($arrRS);
		for($i=0; $i<$longitud; $i++){
			echo "<table>";
				echo "<td>";
					echo "<h1 class='nombre_toy'>".$arrRS[$i][1]."</h1>";
					echo "<h2 class='id_publicacion'>ID: ".$arrRS[$i][0]."</h2>";
					echo "<img src='../../img/publicaciones/".$arrRS[$i][2]."' width='200'>";
				echo "</td>";
				echo "<td>";
					echo "<form method='post' action=''>";
						echo "<input type='submit' class='boton' name='ver".$arrRS[$i][0]."' value='Ver publicaci&oacute;n'>";
					echo "</form>";
				echo "</td>";
			echo "</table>";
			echo "<hr>";
			if(isset($_POST['ver'.$arrRS[$i][0]])){
				$_SESSION["img"]="../../img/publicaciones/".$arrRS[$i][2];
				$_SESSION["publicacion"][0][0]=$arrRS[$i][0];
				header("Location: ver.php");
			}
		}
	}	
	else
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	*/
?>