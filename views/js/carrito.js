function no_session(){
  'use strict';
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'No ha iniciado sesión',
    timer: 1500,
    showConfirmButton: false,
  })
}


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


