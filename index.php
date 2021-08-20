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

    <header class="header">
        <div class="container">
            <div class="row">
                
                <div class="four columns">
                    <h1>Carbon Chicken</h1>
                    <h1>
                        <?php
                            if(isset($_SESSION['usuario'])){
                                echo strtolower($_SESSION['usuario']['nombre']);
                            }
                            else{
                                echo "no hay sesion";
                            }
                        ?>
                    </h1>
                </div>
                <div class="two columns u-pull-right">
                    <ul>
                        <li class="submenu">
                            <img src="img/logo.png" alt="" width="80px">
                            <div id="carrito">
                                <!--    <a href="#" class="button u-full-width">Nosotros</a>
                                        <a href="#" class="button u-full-width">Comprar</a>
                                        <a href="#" class="button u-full-width">Ubícanos</a>-->
                                <a href="index.php" class="button u-full-width">Trabajadores</a>
                                <a href="loginCliente.php" class="button u-full-width">Clientes</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="hero">
        <div class="container"> 
            <div class="row">  
                <div class="six columns">
                    <div class="contenido-hero">
                        <h2>Acompañándote<br />en tu mesa</h2>
                        <p>CON EL MEJOR POLLO</p>
                        <form>
                            <input class="u-full-width" type="text" placeholder="¿Que te gustaria probar?" id="buscador">
                            <input type="submit" class="submit-buscador">
                        </form>
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
                        </div>

                    </div>

                </div>
            <?php
                endforeach;
            ?>
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo1.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1 Pollo + Papas + Ensalada + Cremas</h4>
                        <p>+ 1/4 de Pollo Solo</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$80.00 <span class="u-pull-right">$50.00</span> </p>
                        
                    </div>
                </div>
            </div>

            <!-- <div class="four columns">
                <div class="card">
                    <img src="img/platillo1.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1 Pollo + Papas + Ensalada + Cremas</h4>
                        <p>+ 1/4 de Pollo Solo</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$80.00 <span class="u-pull-right">$50.00</span> </p>
                        
                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo2.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1/4 de Pollo + Papas + Ensalada</h4>
                        <p>+ Inka Kola de 1/2 L</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$25.00 <span class="u-pull-right">$18.00</span> </p>

                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo3.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1 Pollo + Papas + Ensalada + Cremas</h4>
                        <p>+1 Pollo Solo</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$80.00 <span class="u-pull-right">$60.00</span> </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo4.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1 Pollo + Papas + Ensalada</h4>
                        <p>+ Inka Kola de 1 1/2 L</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$70.00 <span class="u-pull-right">$48.00</span> </p>

                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo5.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>1 Pollo + Papas + Ensalada</h4>
                        <p>Incluido Delivery</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$60.00 <span class="u-pull-right">$43.00</span> </p>

                    </div>
                </div>
            </div>
            <div class="four columns">
                <div class="card">
                    <img src="img/platillo6.jpg" class="imagen-platillo u-full-width">
                    <div class="info-card">
                        <h4>Tallarín Criollo</h4>
                        <p>+ Vaso de Chicha</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$25.00 <span class="u-pull-right">$15.00</span> </p>

                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <a href="loginCliente.php" class="u-full-width button-primary button input agregar-carrito">Comprar</a>

    <footer class="footer"> 
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
    </footer>

    
</body>
</html>