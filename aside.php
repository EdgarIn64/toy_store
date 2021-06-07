<?php
	session_start();
?>
<div class="accesibilidad">
	<br><br>
	<h2>Modo oscuro</h2>
	<label class="switch">
		<input type="checkbox" name="color" onclick="color()" required="true" checked>
		<span class="slider round"></span>
	</label>
	<br><br>
	<h2>Tamaño de letra</h2>
	<form method="post" action="">
		<select name="letra" id="letra" style="font-size: 1.4rem;">
			<option value="1.3rem">Normal</option>
			<option value="1.61rem" style="font-size: 1.61rem;">Grande</option>
		</select>
		<input type="submit" name="aceptar" value="Aceptar">
		<input type="txt" name="fondo" id="fondo" style="display: none;" value="">
		<input type="txt" name="let_color" id="let_color" style="display: none;" value="">
	<p style="text-align: center;">Se debe dar clic al boton "Aceptar"<br>para que se guarden los cambios</p>
</div>

<?php  
	session_start();
	if(isset($_POST['fondo'])){
		$_SESSION['color_fondo']=$_POST['fondo'];
		$_SESSION['color_letra']=$_POST['let_color'];
		echo "
		<script type='text/javascript'>
			document.body.style.backgroundColor= '".$_SESSION['color_fondo']."';
			document.body.style.color= '".$_SESSION['color_letra']."';
		</script>
		";
	}
	if(isset($_POST['letra'])) {
		$_SESSION['letra'] = $_POST['letra'];
		echo "<script type='text/javascript'>
			letra('".$_SESSION['letra']."');
			</script>";			
	}
	else if(isset($_SESSION['letra'])) {
		echo "<script type='text/javascript'>
			letra('".$_SESSION['letra']."');
		</script>";
		$_SESSION['letra'] = $_SESSION['letra'];
	}
	else {
		$_SESSION['letra'] = "1.28rem";
	}

?>
