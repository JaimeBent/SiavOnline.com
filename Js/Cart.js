function show(){
    //vaciar el div en RedCart.php de Metodos de pago
   $("#PayCart").html('');
    
    $.ajax({
        url: "PaymentMethods.php"
        
    })
    .done(function(data){
        $("#PayCart").append(data);  
    })
   .fail(function(){

    console.log('fallo');
   });
}
