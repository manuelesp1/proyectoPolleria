<?php

require_once(__DIR__."/../models/usuario_model.php");

    class Usuario_control{
        public function mostrar_usuarios(){
            $data = new Usuario_model();
            $list = $data->mostrar_usuarios();
            return $list;
        }

        public function mostrar_usuario($id_usuario){
            $data = new Usuario_model();
            $list = $data->mostrar_usuario($id_usuario);
            return $list;
        }

        public function verificar_usuario($correo, $clave){
            $data = new Usuario_model();
            $list = $data->verificar_usuario($correo, $clave);
            return $list;
        }

    }    


    if(isset($_POST['action'])){ //corregir action>submit
        session_start();
        $action  = $_POST['action'];
        
    
        if($action == "verificar_usuario"){
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];

            $data = new Usuario_modelo();
            $list = $data->verificar_usuario($correo, $clave);
            $_SESSION['usuario'] = $list;

            header("location: ./../index.php");
        }
    }

?>