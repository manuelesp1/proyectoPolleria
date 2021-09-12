<?php

class Cliente_modelo{
    private $db;

    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
    }

    public function nuevo_cliente($nombre, $dni, $telefono, $direccion){
        $this->db->query("INSERT into cliente (nombre, dni, telefono, direccion) values ('$nombre', '$dni', '$telefono', '$direccion')");
        $query = $this->db->query("SELECT last_insert_id() as id_cliente");
        while($data = mysqli_fetch_assoc($query)){
            $id = $data;
        }
        return $id; //ultimo id insertado
    }
}


?>