function titulo() {	
	var titulo = document.getElementsByTagName("META");
	var ubicacion = document.getElementsByClassName("titulo");
	ubicacion[0].innerHTML = titulo[0].content;
}