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
    <script type="text/javascript" src="views/js/carrito.js"></script>
</head>
<body>

    <header class="banner">
		<nav class="menu">
			<ul class="menu-ul">
                <li><img src="views/img/logo.png" alt="" width="80px"></li>
				<li><a href="#">Nosotros</a></li>
				<li><a href="#">Contactos</a></li>
				<?php 
					if(isset($_SESSION['nomb_usuario'])){
				?>
					<li><a href="login/logout.php">Bienvenido, <?php echo $_SESSION['nomb_usuario']; ?></a></li>
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
                            <p class="precio"><?php echo $data['precio']; ?> <span class="u-pull-right"><?php echo $data['precio']; ?></span></p>
                            <div class="boton-compra">
                                <input type="button" onclick="decrementa()" value="-" name="decremento">
                                <p class="cantidad" name="cantidad" id="cantidad">1</p>
                                <input type="button" onclick="incrementa()" value="+" name="incremento">
                            </div>
                            <form action="" class="envio-carrito">
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

    <!-- <a href="loginCliente.php" class="u-full-width button-primary button input agregar-carrito">Comprar</a> -->

    <!-- <footer class="footer"> 
        <div class="container">
            <div class="row">
                <div class="four columns">
                    <nav class="menu">
                        <a class="enlace" href="views/login.php">Iniciar Sesión</a>
                        <a class="enlace" href="RegistrarCliente.php">Registrarse</a>
                    </nav>
                </div>
                <div class="four columns">
                    <nav class="menu">
                        <a class="enlace" href="Pagina_Inicio.php">Inicio</a>
                        <a class="enlace" href="sistema/ubicacion.php">Ubicacion</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer> -->

    
</body>
</html>