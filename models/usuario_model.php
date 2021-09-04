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

    public static function mostrar_usuario($id_usuario){
        $query = $this->db->query("SELECT * FROM usuarios where id_usuario = '$id_usuario'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list[] = $data;
        }
        return $list;
    }

    public function verificar_usuario($correo, $clave){
        //$query = $this->db->query("SELECT t1.id_usuario, t3.rol, t1.id_cliente, t1.nombre, t1.dni, t1.telefono, t1.direccion from cliente t1 inner join usuario t2 inner join rol t3 where t2.correo = '$correo' and t2.clave = '$clave'");
        $query = $this->db->query("SELECT t1.id_usuario, t3.rol, t1.id_cliente, t1.nombre, t1.dni, t1.telefono, t1.direccion from cliente t1 inner join usuario t2 on t1.id_usuario = t2.id_usuario inner join rol t3 on t2.id_rol = t3.id_rol where t2.correo = '$correo' and t2.clave = '$clave'");
        $list = null;
        while($data = mysqli_fetch_assoc($query)){
            $list = $data;
        }
        return $list;
    }

   
}

?>