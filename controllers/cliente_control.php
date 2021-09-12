<?php
class Cliente_control{
    







    
}

if(isset($_POST['submit'])){
    $action = $_POST['action'];

    if($action == 'nuevo_cliente'){
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        //extraer pk sin credenciales para realizar compra
    }
}

?>