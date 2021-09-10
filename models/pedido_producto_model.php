<?php
class PedidoProducto_modelo{
    private $db;

    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
    }

    public function agregar_producto($id_producto, $id_cliente){ //corregir consulta: el cliente es parte de la restriccion
        $this->db->query("INSERT into pedido_producto (id_pedido, id_producto, cantidad) VALUES ((SELECT max(id_pedido) from pedido where id_cliente = '$id_cliente'), '$id_producto', '1')");
    }

    public function producto_duplicado($id_producto, $id_cliente){
        $query = $this->db->query("SELECT estado from pedido_producto t1 inner join pedido t2 on t1.id_pedido = t2.id_pedido where t1.id_producto = '$id_producto' and t2.id_cliente = '$id_cliente' and t2.estado = '1'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list[] = $data;
        }
        // if(mysqli_num_rows($data) != 0){
        //     $result = true;
        // }else{
        //     $result = false;
        // }
        // return $result;
        return $list;
    }

    // public function consultar_producto($id_producto){
    //     $this->db->query("SELECT  from pedido_producto")
    // }
}


?>