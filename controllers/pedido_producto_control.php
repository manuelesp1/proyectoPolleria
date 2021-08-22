<?php
session_start();
require_once(__DIR__."/../models/pedido_producto_model.php");
require_once(__DIR__."/../models/pedido_model.php");

if(isset($_POST['action'])){ //provisional: action>submit
    $action = $_POST['action'];  
    $id_cliente = $_SESSION['usuario']['id_cliente'];
    $data_estado_pedido = new Pedido_model();
    $estado_pedido = $data_estado_pedido->estado_pedido($id_cliente);
    $_SESSION['pedido'] = $estado_pedido;

    if($action == 'agregar_carrito'){
        $id_producto = $_POST['id_producto'];
        $id_cliente = $_SESSION['usuario']['id_cliente'];
     
            if($_SESSION['pedido']['estado'] == '1'){//corregir array para llamar con get y set
                $agregar_producto = new PedidoProducto_model();
                $agregar_producto->agregar_producto($id_producto, $id_cliente);
            }
            else{
                $nuevo_pedido = new Pedido_model();
                $nuevo_pedido->nuevo_pedido($id_cliente);
                $agregar_producto = new PedidoProducto_model();
                $agregar_producto->agregar_producto($id_producto, $id_cliente);
            }
    }
}

?>