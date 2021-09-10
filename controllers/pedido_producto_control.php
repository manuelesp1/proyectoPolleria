<?php
session_start();
require_once(__DIR__."/../models/pedido_producto_model.php");
require_once(__DIR__."/../models/pedido_model.php");

if(isset($_POST['action'])){ //provisional: action>submit
    $action = $_POST['action'];  
    $id_cliente = $_SESSION['usuario']['id_cliente'];

    if(!$id_cliente == null){
        $data_estado_pedido = new Pedido_modelo();
        $estado_pedido = $data_estado_pedido->estado_pedido($id_cliente);
        $_SESSION['pedido'] = $estado_pedido;


        if($action == 'agregar_carrito'){
            $id_producto = $_POST['id_producto'];
            $id_cliente = $_SESSION['usuario']['id_cliente'];
        
            
                if($_SESSION['pedido']['estado'] == '1'){//corregir array para llamar con get y set
                    
                    //aqui consultar si el producto ya ha sido escogido
                    // $duplicado = new PedidoProducto_modelo();
                    // $list = $duplicado->producto_duplicado($id_producto, $id_cliente);
                    // $_SESSION['duplicado'] = $list;
                    // if(!is_null($_SESSION['duplicado']['estado'])){
                    //     $_SESSION['duplicado'] = $duplicado;
                    // }else{
                    //     $_SESSION['duplicado'] = $duplicado;
                    // }
                   
                    
                    $agregar_producto = new PedidoProducto_modelo();
                    $agregar_producto->agregar_producto($id_producto, $id_cliente);
           
    
                }
                else{
                    $nuevo_pedido = new Pedido_modelo();
                    $nuevo_pedido->nuevo_pedido($id_cliente);
                    $agregar_producto = new PedidoProducto_modelo();
                    $agregar_producto->agregar_producto($id_producto, $id_cliente);
                    
                }
        }
    }
    else{
        header("location: ./../views/login.php");
    }
    

    
}

?>