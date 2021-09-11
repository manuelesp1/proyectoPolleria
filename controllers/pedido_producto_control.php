<?php
session_start();
require_once(__DIR__."/../models/pedido_producto_model.php");
require_once(__DIR__."/../models/pedido_model.php");

if(isset($_POST['action'])){ //provisional: action>submit
    $action = $_POST['action'];  
    //$id_cliente = $_SESSION['usuario']['id_cliente'];//aqui no es necesario

    if($action == 'agregar_carrito'){

        $_SESSION['estado_carrito'] = 'abierto';
        if(isset($_SESSION['productos_carrito'])){

            $array_productos = array( // falta verificacion de pedido duplicado
                "id_producto" => $_POST['id_producto'],
                "cantidad" => '1'
            );
            $_SESSION['productos_carrito'][] = $array_productos;

        }else{

            $array_productos = array(
                "id_producto" => $_POST['id_producto'],
                "cantidad" => '1'
            );
            $_SESSION['productos_carrito'][] = $array_productos;
            $_SESSION['estado_carrito'] = 'abierto';

        }
    } 
}

?>