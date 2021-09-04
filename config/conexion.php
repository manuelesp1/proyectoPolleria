<?php

    class Connect{

        
        public static function connection(){
            $conexion = new mysqli("127.0.0.1:3307", "root", "", "polleria");
            return $conexion;
            if(mysqli_connect_errno()){
                echo "conexion fallida";
                exit();
            }
        }
    }
   

    // $conexion = mysqli_connect($host, $user, $clave, $bd);
    // if(mysqli_connect_errno()){
    //     echo "conexion fallida";
    //     exit();
    // }
    // mysqli_select_db($conexion, $bd) or die("conexion fallida");

?>