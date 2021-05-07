function limpiar(){
	lista=document.querySelectorAll("div");
	if(lista.length!=0){
	    i=lista.length-1;
	    lista[i].parentNode.removeChild(lista[i--]);
	    while(i>-1)
	    lista[i].parentNode.removeChild(lista[i--]);
	}
}