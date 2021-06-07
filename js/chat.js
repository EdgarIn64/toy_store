/*
$("#imagenEnviar").click(function() {
    alert( "Hola" ); 
  });
  */
 
  function muestraReloj() {
    var fechaHora = new Date();
    var horas = fechaHora.getHours();
    var minutos = fechaHora.getMinutes();
    var segundos = fechaHora.getSeconds();
  
    if(horas < 10) { horas = '0' + horas; }
    if(minutos < 10) { minutos = '0' + minutos; }
    if(segundos < 10) { segundos = '0' + segundos; }
  
    var anio=fechaHora.getFullYear();
    var mes=(fechaHora.getMonth())+1;
    var dia=fechaHora.getDate();

    if(mes < 10) { mes = '0' + mes; }
    if(dia < 10) { dia = '0' + dia; }

    document.getElementById("reloj").value = anio+"-"+mes+"-"+dia+" "+horas+':'+minutos+':'+segundos;

  }
  $(document).ready(function(){
    setInterval(muestraReloj, 1000);
 }) 
  
function refrescar(){
  $("#refrescar").trigger( "click" );
} 


