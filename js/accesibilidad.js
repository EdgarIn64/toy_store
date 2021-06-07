function color() {
	let element = document.getElementsByTagName('body')[0];
	let elementStyle = window.getComputedStyle(element);
	let elementColor = elementStyle.getPropertyValue('background-color');
	var fondo;
	var letra;
	if(elementColor=="rgba(0, 0, 0, 0)"){
		fondo = "rgb(37,37,37)";
		letra = "#fbfbfb";
	}
	else {
		fondo = "rgba(0, 0, 0, 0)";
		letra = "black";
	}
	document.body.style.backgroundColor= fondo;
	document.body.style.color= letra;
	document.getElementById("fondo").value = fondo;
	document.getElementById("let_color").value = letra;
}
function letra(valor){
	document.body.style.fontSize = valor;
}

function getFondo(){
	let element = document.getElementsByTagName('body')[0];
	let elementStyle = window.getComputedStyle(element);
	let elementColor = elementStyle.getPropertyValue('background-color');
	return elementColor;
}

function getLetra(){
	let element = document.getElementsByTagName('body')[0];
	let elementStyle = window.getComputedStyle(element);
	let elementColor = elementStyle.getPropertyValue('color');
	return elementColor;
}