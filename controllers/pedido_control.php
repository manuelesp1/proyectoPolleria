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

        if($action == 'pagar_pedido'){
            $total = $_POST['total'];
            $id_cliente = $_POST['id_cliente'];

            $data = new Pedido_modelo();
            $data->pagar_pedido($total, $id_cliente);
            echo $total;
            header("location: ./../index.php");
        }
        
    }
?>