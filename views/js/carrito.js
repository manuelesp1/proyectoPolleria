function agregar_carrito(id){
  'use strict';
  var dataForm = document.forms[id],
    params = {
      "id_producto": dataForm.id_producto.value,
      "action": dataForm.action.value,
    };
    console.log(params);
    
    $.ajax({
      data: params,
      url: 'controllers/pedido_producto_control.php',
      type: 'post',
      success: function(data){
        console.log("se guardó el producto");
        Swal.fire({
          position: 'bottom-end',
          icon: 'success',         
          title: 'Se envió al carrito',
          showConfirmButton: false,
          timer: 1500
      },)
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert(errorThrown);
     }
    });  
}


// var incrementa = function(){
//   let valor = document.getElementById("cantidad");
  
//   if(valor.value < 10)valor.value++;

//   var txt = document.createTextNode(Math.round(valor));
//       document.getElementById("cantidad").appendChild(txt);
// }

// var decrementa = function(){
//   let valor = document.getElementById("cantidad");

//   if(valor.value > 1)valor.value--;

//   var txt = document.createTextNode(Math.round(valor));
//       document.getElementById("cantidad").appendChild(txt);
// }


