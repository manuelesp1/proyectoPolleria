<?php
class Pedido_modelo{
    private $db;

    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
    }

    public function nuevo_pedido($id_cliente){
        $this->db->query("INSERT INTO pedido (id_cliente, estado) values ('$id_cliente', '1')");
    }

    public function estado_pedido($id_cliente){
        $query = $this->db->query("SELECT estado FROM pedido WHERE id_cliente = '$id_cliente' and id_pedido = (SELECT MAX(id_pedido) from pedido where id_cliente = '$id_cliente')");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list = $data;
        }
        return $list;
    }

    public function mostrar_pedido($id_cliente){
        $query = $this->db->query("SELECT t1.nombre, t1.precio, t2.cantidad from producto t1 inner join pedido_producto t2 on t1.id_producto = t2.id_producto inner join pedido t3 on t2.id_pedido = t3.id_pedido where t3.id_cliente = '$id_cliente' and t3.estado = '1'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list[] = $data;
        }
        return $list;
    }
}


?>