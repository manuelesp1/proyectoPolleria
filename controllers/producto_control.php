<?php

    require_once(__DIR__."/../models/producto_model.php");

    class Producto_control{
        
        public static function mostrar_productos(){
            $data = new Producto_modelo();
            $list = $data->mostrar_productos();
            return $list;
        }

        public function mostrar_producto($id_producto){
            $data = new Producto_modelo();
            $list = $data->mostrar_producto($id_producto);
            return $list;
        }
    }



?>