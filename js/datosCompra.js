
  window.addEventListener("load",function(){
   
    validarProductos();
  });

  function validarProductos(){
    var nota1="lleno";
    nota2=document.getElementById("cuantosProductos").value;
    var css = { "background": 'rgba(116, 113, 113, 0.712)', "color":'black'};
    var result = nota1.localeCompare(nota2);
      if(result==0){ //0 si son iguales

        $("#botonConfirmarCompra").attr('disabled', false);
        $("#botonConfirmarDomicilio").attr('disabled', false);
        $("#noProductos").hide();
        
      }else{
        $("#botonConfirmarCompra").attr('disabled', true);
        $("#botonConfirmarDomicilio").attr('disabled', true);
        $("#botonConfirmarCompra").css(css);
        $("#botonConfirmarDomicilio").css(css);
        $("#noProductos").show();
        document.getElementById("noProductos").innerHTML="Datos incompletos";


      }

  }


  $(function() {

    $("#formas_paqueteria").attr('disabled', false);
    $(".seccionTarjeta").hide();

    $("#formas_pago").change(function() {
      var selector = $("#formas_pago").val();

      switch(selector){
        case "Deposito oxxo":
          $("#formas_paqueteria").attr('disabled', false);
          $(".seccionTarjeta").hide();
          break;

        case "Tarjeta":
          $("#formas_paqueteria").attr('disabled', false);
          $('.seccionTarjeta').show(2000);
          break;

        case "En persona":
          $("#formas_paqueteria").attr('disabled', true);
          $(".seccionTarjeta").hide();
          break;
      }

  });

});





   