var incrementa = function(){
    let valor = document.getElementById("cantidad");
    
    if(valor.value < 10)valor.value++;

    var txt = document.createTextNode(Math.round(valor));
        document.getElementById("cantidad").appendChild(txt);
}

var decrementa = function(){
    let valor = document.getElementById("cantidad");

    if(valor.value > 1)valor.value--;
 
    var txt = document.createTextNode(Math.round(valor));
        document.getElementById("cantidad").appendChild(txt);
}

$(document).ready(function(){

    $('#envio-carrito').submit(e => {
        e.preventDefault();
        const postData = {
          id_producto: $('#id_producto').val(),
          action: $('#action').val(),
        };
        const url = 'controllers/pedido_producto_control.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
          console.log(response);
          console.log("llega");
        });
      });

})

