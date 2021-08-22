<?php
require_once(__DIR__."/../models/pedido_model.php");


    class Pedido_control{
        public function mostrar_pedido($id_cliente){
            $data = new Pedido_model();
            $list = $data->mostrar_pedido($id_cliente);
            return $list;
        }
    }
?>