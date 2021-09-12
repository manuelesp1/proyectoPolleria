


<?php
    session_start();
    require_once(__DIR__."/../controllers/producto_control.php");

    if(isset($_SESSION['productos_carrito'])){
        
        $lista_productos = $_SESSION['productos_carrito'];
       
    }else{
       
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  class="container">
    <h1>Carrito de Compra</h1>

    <?php
        if($lista_productos != null){
    ?>

    <table class="table">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Precio</th>
            
            <th>Subtotal</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total = 0;
            foreach($_SESSION['productos_carrito'] as $key => $data):
                $id_producto = $data['id_producto'];
                $datos_producto = Producto_control::mostrar_producto($id_producto);
                foreach($datos_producto as $data_prod):
                 
                    $subtotal = $data_prod['precio'] * $data['cantidad'];
        ?>
        <tr>
            <td><?php echo $data['cantidad']; ?></td>  
            <td><?php echo $data_prod['nombre']; ?></td>
            <td><?php echo $data_prod['precio']; ?></td>
            <td><?php echo $subtotal ?></td>
                
        </tr>
        <?php 
            $total = $total + $data_prod['precio'];
            endforeach;
        endforeach;
        ?>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><?php echo $total ?></td>
        
    </tbody>
   
    </table>
    <section>
        <form method="post" action="../controllers/pedido_control.php">
            <input type="text" name="nombre" id="" placeholder="ingrese su nombre">
            <input type="text" name="dni" id="" placeholder="ingrese su dni">
            <input type="text" name="telefono" id="" placeholder="ingrese su telefono">
            <input type="text" name="direccion" id="" placeholder="ingrese su direccion">
            <input type="hidden" name="total" value="<?php echo $total ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">
            <input type="hidden" name="action" value="pagar_pedido">
            <input type="submit" name="submit" value="Realizar compra">
        </form>    
    </section>

    <?php }else{ ?>
        <h4>No hay productos en el carrito</h4>
    <?php } ?>
        
    

</body>
</html>