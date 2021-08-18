<?php
class Usuario_modelo{
    private $db;

    public function __construct(){
        require_once(__DIR__."/../config/conexion.php");
        $this->db = Connect::connection();
    }

    public function mostrar_usuarios(){
        $query = $this->db->query("SELECT * FROM usuarios");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list = $data;
        }
        return $list;
    }

    public function verificar_usuario($correo, $clave){
        $query = $this->db->query("SELECT t1.id_usuario, t2.id_rol, t1.id_cliente, t1.nombre, t1.dni, t1.telefono, t1.direccion from cliente t1 inner join usuario t2 where t2.correo = '$correo' and t2.clave = '$clave'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list = $data;
        }
        return $list;
    }
}

?>