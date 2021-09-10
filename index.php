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
    <script type="text/javascript" src="views/js/sweetalert2@10.js"></script>
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
					<li><a href="views/logout.php">Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?></a></li>
                    <li><a href="views/carrito.php"><img src="views/img/cart.png" alt=""></a></li>
                    <li><a href="views/logout.php">Cerrar sesion</a></li>
                   
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


                            <form  class="envio-carrito" name="envio-carrito<?php echo $i ?>" method="post" action="">
                                <input type="hidden" name="id_producto" value="<?php echo $data['id_producto']; ?>" id="id_producto<?php echo $i ?>">  
                                <input type="hidden" name="action" value="agregar_carrito" id="action<?php echo $i ?>">
                                <?php
                                    if(isset($_SESSION['usuario'])){
                                ?>
                                    <button type="button" id="envio-carrito<?php echo $i ?>" onclick="agregar_carrito(this.id)" value="Enviar al carrito" class="u-full-width button-primary button input agregar-carrito">Enviar al carrito</button>
                                <?php
                                    }else{
                                ?>
                                    <button type="button" id="no-session<?php echo $i ?>" onclick="no_session()" value="Enviar al carrito" class="u-full-width button-primary button input agregar-carrito">Enviar al carrito</button>
                                <?php
                                    }
                                ?>
                                
                            </form>
                        </div>

                    </div>

                </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
    <?php require_once("views/includes/footer.html"); ?>

    <script src="views/js/jquery-3.5.1.js"></script>
    <script src="views/js/carrito.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
  
    
</body>
</html>