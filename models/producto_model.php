<?php
class Producto_modelo{
    private $id_producto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $existencia;
    private $imagen;


    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
        $this->producto = array();
    }

    public function mostrar_productos(){
        $query = $this->db->query("SELECT * FROM producto");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list[] = $data;
        }
        return $list;
    }

    public function mostrar_producto($id_producto){
        $query = $this->db->query("select * from producto where id_producto = '$id_producto'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list[] = $data;
        }
        return $list;

    }
}



?>