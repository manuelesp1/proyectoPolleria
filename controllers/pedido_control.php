<?php
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
            $id_cliente = $_SESSION['usuario']['id_cliente'];
        }
    }
?>