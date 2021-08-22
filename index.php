<?php
    session_start();
    require_once(__DIR__."/controllers/producto_control.php");
    $list = Producto_control::mostrar_productos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Chicken</title>
    <link rel="stylesheet" href="views/css/normalize.css">
    <link rel="stylesheet" href="views/css/skeleton.css">
    <link rel="stylesheet" href="views/css/style.css">
</head>
<body>
    
    <header class="banner">
		<nav class="menu">
			<ul class="menu-ul">
                <li><img src="views/img/logo.png" alt="" width="80px"></li>
				<li><a href="#">Nosotros</a></li>
				<li><a href="#">Contactos</a></li>
				<?php 
					if(isset($_SESSION['usuario']['nombre'])){
				?>
					<li><a href="login/logout.php">Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?></a></li>
				<?php				
					}
					else{
				 ?>
				 	<li><a href="views/login.php">Login</a></li>
				 <?php 
				 	}
				  ?>
			</ul>
		</nav>
	</header>
    <div class="hero">
        <div class="container"> 
            <div class="row">  
                <div class="six columns">
                    <div class="contenido-hero">
                        <h2>Acompañándote<br />en tu mesa</h2>
                        <p>CON EL MEJOR POLLO</p>
                        <!-- <form>
                            <input class="u-full-width" type="text" placeholder="¿Que te gustaria probar?" id="buscador">
                            <input type="submit" class="submit-buscador">
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="barra">
        <div class="container">
            <div class="row">
                <div class="four columns icono icono1">
                    <p>Con todos los protocolos<br>
                    De Bioseguridad</p>
                </div>
                <div class="four columns icono icono2">
                    <p>Pollos & Parrillas<br>
                    Platos Criollos & Bebidas</p>
                </div>
                <div class="four columns icono icono3">
                    <p>Delivery<br>
                    Todo Puente Piedra</p>
                </div>
            </div>
        </div>
    </div>

    <div class="lista-platillos" class="container">
        <h1 class="encabezado">Nuestra Carta</h1>

        <div class="row">
            <?php
                $i = 0;
                foreach($list as $data):
                    $i++;
            ?>

                <div class="four columns">
                    <div class="card">
                        <img src="views/img/<?php echo $data['imagen'].$i.".jpg"; ?>" class="imagen-platillo u-full-width">
                        <div class="info-card">
                            <h4><?php echo $data['nombre']; ?></h4>
                            <p><?php echo $data['descripcion']; ?></p>
                            <img src="views/img/estrellas.png">
                            <p class="precio">S/. <?php echo $data['precio']; ?> <span class="u-pull-right">S/. <?php echo $data['precio']; ?></span></p>
                            <div class="boton-compra">
                                <input type="button" onclick="decrementa()" value="-" name="decremento">
                                <p class="cantidad" name="cantidad" id="cantidad">1</p>
                                <input type="button" onclick="incrementa()" value="+" name="incremento">
                            </div>
                            <form  id="envio-carrito" class="envio-carrito">
                                <input type="hidden" name="id_producto" value="<?php echo $data['id_producto']; ?>" id="id_producto">
                                <input type="hidden" name="action" value="agregar_carrito" id="action">
                                <input type="submit" value="Enviar al carrito" class="u-full-width button-primary button input agregar-carrito">
                            </form>
                        </div>

                    </div>

                </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>

    <script src="views/js/jquery-3.5.1.js"></script>
    <script src="views/js/carrito.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
  
    
</body>
</html>