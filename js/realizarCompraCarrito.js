/*
$("#botonRealizarCompra").hover(function() {
  sumar();
  console.log("esta sobre el boton de de realizar compra");
});*/

$(document).ready(function(){
  sumar();
})



function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 

 
function sumar() {
  //console.log("entro a sumar()");
  var total = 0;

  $(".sumar").each(function() {
    
    if (isNaN(parseFloat($(this).val()))) {
      total += 0;
    } else {

      total += (parseFloat($(this).val()));
    }
  });

  $("#cantidadTotal").val(total);
  document.getElementById('total').innerHTML=total;

  var suma=$("#cantidadTotal").val();
 // console.log(suma); 

  

  $("#array_cantidades").val(arrayCantidad());
  $("#array_porProducto").val(arrayPorProducto());

}

function arrayCantidad() {
  var num=0;
  var contenido = 0;
  var cantidadProductos=new Array();
  //console.log("entro arrayCantidad()");
 
  $(".cantidad").each(function() {
        
    if(isNaN($(this).val())) {
      contenido= 0;
    } else {
    
      contenido= $(this).val();
    }
      cantidadProductos[num]=contenido;
      num++;
    });
    return cantidadProductos;
}

  function arrayPorProducto() {
      var num=0;
      var contenido = 0;
      var porProductos=new Array();

   //   console.log("entro arrayPorProducto()");

      $(".sumar").each(function() {
         
        if (isNaN($(this).val())) {
          contenido= 0;
        } else {
    
          contenido= $(this).val();
        }
        porProductos[num]=contenido;
        num++;
      });
      return porProductos;
  }
 
 
 //FUNCION NUEVA
function verifica(){
  
  let bandera=true;
  let mensaje="";
  let contenido= $("#array_cantidades").val();
  //console.log(contenido);
  //console.log("------");

  let arrayCantidades=contenido.split(',');
  console.log(arrayCantidades);
  
  let inventarioProd=obtenerInventario();


  console.log(inventarioProd);
  console.log("------");
  for(var num=0; num<inventarioProd.length;num++){
    var cantidad=parseInt(arrayCantidades[num]);
    var inventario=parseInt(inventarioProd[num]);
    //console.log("Cantidad: "+cantidad+" y Inventario: "+inventario);
    if(cantidad>inventario){
      mensaje=mensaje+"El producto "+(num+1)+" no cuenta con la cantidad de "+cantidad+" productos solicitados.\n";
      console.log(arrayCantidades[num]+" es mayor a "+inventarioProd[num])
      bandera=false;
    }
    //console.log("-----");
    //console.log("Poducto "+(num+1)+" pidio "+arrayCantidades[num]+" y cuenta con el inventario de "+inventarioProd[num]);
    
  }

if(bandera==false){
  //console.log("-----");
  console.log("Se encontro un mensaje")
  alert(mensaje);
}
else{
  if(bandera==true){
    $("#botonRealizarCompra").trigger("click");
  }
}



}


function obtenerInventario() {
  var num=0;
  var contenido = 0;
  var porProductos=new Array();

  $(".obtenerInventario").each(function() {
     
    if (isNaN($(this).val())) {
      contenido= 0;
    } else {

      contenido= $(this).val();
    }
    porProductos[num]=contenido;
    num++;
  });
  return porProductos;
}
 
 
