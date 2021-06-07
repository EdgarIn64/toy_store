
$( "#botonRealizarCompra" ).hover(function() {
  sumar();
});


function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 


function sumar() {

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
  console.log(suma); 

  

  $("#array_cantidades").val(arrayCantidad());
  $("#array_porProducto").val(arrayPorProducto());

}

function arrayCantidad() {
  var num=0;
  var contenido = 0;
  var cantidadProductos=new Array();

 
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
 
