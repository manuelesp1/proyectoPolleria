<?php
session_start();
require_once(__DIR__."/../models/usuario_model.php");

    class Usuario_control{
        public static function mostrar_usuarios(){
            $data = new Usuario_modelo();
            $list = $data->mostrar_usuarios();
            return $list;
        }

        public static function mostrar_usuario($id_usuario){
            $data = new Usuario_modelo();
            $list = $data->mostrar_usuario($id_usuario);
            return $list;
        }

        public static function verificar_usuario($correo, $clave){
            $data = new Usuario_modelo();
            $list = $data->verificar_usuario($correo, $clave);
            return $list;
        }


    }    


    if(isset($_POST['action'])){ //corregir action>submit
        $action  = $_POST['action'];
        
    
        if($action == "verificar_usuario"){
            session_start();
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];

            $data = new Usuario_modelo();
            $list = $data->verificar_usuario($correo, $clave);
            $_SESSION['usuario'] = $list;

            if($_SESSION['usuario']['rol'] == 'cliente'){
                header("location: ./../index.php");
            } elseif($_SESSION['usuario']['rol'] == 'administracion'){
                header("location: ./administracion.php");
            } elseif($_SESSION['usuario']['rol'] == 'cajero'){
                header("location: ./cajero.php");
            } else{
                header("location: ./../index.php");
            }

            
        }
    }

?>