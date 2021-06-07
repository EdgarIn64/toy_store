

function cambiarPestanna(pestannas,pestanna) { 
    
    console.log("entro a la funcion de cambiarPestana");
    pestanna = document.getElementById(pestanna.id);

    listaPestannas = document.getElementById(pestannas.id);
    

    cpestanna = document.getElementById('c'+pestanna.id);

    listacPestannas = document.getElementById('contenido'+pestannas.id);

    i=0;
   
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
         
    }

    $(document).ready(function(){

        $(cpestanna).css('display','');
        $(pestanna).css('background','rgba(0, 17, 253, 0.301)');
        $(pestanna).css('padding-bottom','2px'); 
    });

}