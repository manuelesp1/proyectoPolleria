<?php
    session_start();
    $id_cliente = $_SESSION['usuario']['id_cliente'];

    require_once(__DIR__."/../controllers/pedido_control.php");
    $list = Pedido_control::mostrar_pedido($id_cliente);

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
    <meta name="viewport" content="width=<div class="container">
    <h1>Carrito de Compra</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <!-- <th>Cantidad</th> -->
            <th>Subtotal</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($list as $data):
        ?>
        <tr>
            <td><?php echo $data['nombre']; ?></td>
            <td><?php echo 'S/'.$data['precio']; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php 
            endforeach;
        ?>
        
    </tbody>
   
    </table>
</body>
</html>