<?php
class PedidoProducto_model{
    private $db;

    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
    }

    public function agregar_producto($id_producto, $id_cliente){ //corregir consulta: el cliente es parte de la restriccion
        $this->db->query("INSERT into pedido_producto (id_pedido, id_producto, cantidad) VALUES ((SELECT max(id_pedido) from pedido where id_cliente = '$id_cliente'), '$id_producto', '1')");
    }

    // public function consultar_producto($id_producto){
    //     $this->db->query("SELECT  from pedido_producto")
    // }
}


?>