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
    <meta name="viewport"  class="container">
    <h1>Carrito de Compra</h1>

    <?php
        if($list != null){
    ?>

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
            $total = 0;
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
            $total = $total + $data['precio']; //falta multiplicar cantidades
            endforeach;
        ?>
        
    </tbody>
   
    </table>
    <section>
        <form method="post" action="../controllers/pedido_control.php">
            <input type="hidden" name="total" value="<?php echo $total ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">
            <input type="hidden" name="action" value="pagar_pedido">
            <input type="submit" name="submit" value="pagar" >

        </form>
        
    </section>
    <?php
        }else{
    ?>
        <h4>No hay productos en el carrito</h4>
    <?php
        }
    ?>
</body>
</html>