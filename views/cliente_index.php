<?php 
    include_once (__DIR__."/includes/header_cliente.php"); 
    require_once(__DIR__."/../controllers/producto_control.php");
    $list = Producto_control::mostrar_productos();
    include_once(__DIR__."/../index.php");
?>
<h2>aqhi</h2>