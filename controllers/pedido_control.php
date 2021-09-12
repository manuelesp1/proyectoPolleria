<?php
session_start();
require_once(__DIR__."/../models/pedido_model.php");


    class Pedido_control{
        public static function mostrar_pedido($id_cliente){
            $data = new Pedido_modelo();
            $list = $data->mostrar_pedido($id_cliente);
            return $list;
        }
  
    }

    if(isset($_POST['submit'])){
        $action = $_POST['action'];

        // if($action == 'pagar_pedido'){
        //     $total = $_POST['total'];
        //     $id_cliente = $_POST['id_cliente'];

        //     $data = new Pedido_modelo();
        //     $data->pagar_pedido($total, $id_cliente);
        //     header("location: ./../index.php");
        // }

        if($action == 'pagar_pedido'){
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $total = $_POST['total'];
            
            require_once(__DIR__."/../models/cliente_model.php");
            $nuevo_cliente = new Cliente_modelo();//mvc cruzado
            $list = $nuevo_cliente -> nuevo_cliente($nombre, $dni, $telefono, $direccion);
            $_SESSION['id_cliente_ns'] = $list; //provisional
            echo $_SESSION['id_cliente_ns']['id_cliente'];
            $id_cliente = $_SESSION['id_cliente_ns']['id_cliente'];
            require_once(__DIR__."/../models/pedido_model.php");
            $nuevo_pedido = new Pedido_modelo();
            $nuevo_pedido -> nuevo_pedido($id_cliente);
            require_once(__DIR__."/../models/pedido_producto_model.php");
            foreach($_SESSION['productos_carrito'] as $key=>$data){
                $agregar_producto = new PedidoProducto_modelo();
                $agregar_producto->agregar_producto($data['id_producto'], $id_cliente);
            }
            $pagar_pedido = new Pedido_modelo();
            $pagar_pedido->pagar_pedido($total, $id_cliente);
        }  
    }
?>