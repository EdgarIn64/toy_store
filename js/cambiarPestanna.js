// Dadas la division que contiene todas las pestañas y la de la pestaña que se 
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
function cambiarPestanna(pestannas,pestanna) { 
    
    // Obtiene los elementos con los identificadores pasados.

    pestanna = document.getElementById(pestanna.id);
   // console.log("que es pestanna: "+pestanna+" ......"); //li

    listaPestannas = document.getElementById(pestannas.id);
    //console.log("que es listaPestannas: "+listaPestannas+" ......"); //div 
    
    // Obtiene las divisiones que tienen el contenido de las pestañas.

    cpestanna = document.getElementById('c'+pestanna.id);
    //console.log("que es cpestanna: "+cpestanna+" ......"); //div

    listacPestannas = document.getElementById('contenido'+pestannas.id);
    //console.log("que es listacPestannas: "+listacPestannas+" ......"); //div

    i=0;
    // Recorre la lista ocultando todas las pestañas y restaurando el fondo 
    // y el padding de las pestañas.
    while (typeof listacPestannas.getElementsByTagName('div')[i] != 'undefined' ){
        $(document).ready(function(){
            $(listacPestannas.getElementsByTagName('div')[i]).css('display','none');
            $(listaPestannas.getElementsByTagName('li')[i]).css('background','');
            $(listaPestannas.getElementsByTagName('li')[i]).css('padding-bottom','');
        });
        i += 1;
    }
    
    var marcados=document.getElementsByClassName('public'+pestanna.id);
    x=0;
    while (typeof marcados[x] != 'undefined'){
        $(document).ready(function(){
            $(marcados[x]).css('display','block');
        });
        x += 1;
        console.log("entro a while marcados "+x);
        console.log(marcados[x]);
    }

    $(document).ready(function(){
        // Muestra el contenido de la pestaña pasada como parametro a la funcion,
        // cambia el color de la pestaña y aumenta el padding para que tape el  
        // borde superior del contenido que esta juesto debajo y se vea de este 
        // modo que esta seleccionada.
        $(cpestanna).css('display','');
        $(pestanna).css('background','rgba(0, 17, 253, 0.301)');
        $(pestanna).css('padding-bottom','2px'); 
    });

}