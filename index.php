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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="views/css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="views/css/skeleton.css"> -->
    <!-- <link rel="stylesheet" href="views/css/style.css"> -->
    <link rel="stylesheet" href="views/css/style-index.css">
    <script type="text/javascript" src="views/js/sweetalert2@10.js"></script>
   
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand"><img src="views/img/logo.png" class="img-fluid" alt="logo de carbon chicken" width="75px"></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-principal"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menu-principal">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Nosotros</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contactos</a></li>
                    <?php if(isset($_SESSION['estado_carrito'])){ 
                        if($_SESSION['estado_carrito'] == 'abierto'){ ?>

                            <li class="nav-item"><a href="views/carrito.php" class="nav-link">Carrito</a></li>

                <?php } 
                        } ?>
				
                <?php if(isset($_SESSION['usuario']['nombre'])){ ?>

					<li class="nav-item"><a href="views/logout.php" class="nav-link">Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?></a></li>
                    
                    <li class="nav-item"><a href="views/logout.php" class="nav-link">Cerrar sesion</a></li>
                   
				<?php }else{ ?>

				 	<li class="nav-item"><a href="views/login.php" class="nav-link">Login</a></li>

                <?php } ?>
                </ul>
            </div>
        </div> 
    </nav>
    <section class="imagen">
        <img src="views/img/pollo1.jpg" class="img-fluid" alt="pollos-carbon-chicken">
        <!-- <p><span>Acompañándote en tu mesa</span> con el mejor pollo a la brasa</p> -->
    </section>
    
    <section class="container">
        <div class="row">
            <div class="col-12 pt-3">
                    <p>Con todos los protocolos de bioseguridad</p>
            </div>
            <div class="col-12 pt-3">
                    <p>Pollos, parrillas, platos criollos y bebidas</p>
            </div>
            <div class="col-12 pt-3">
                    <p>Delivery a todo puente piedra</p>
            </div>
        </div>
    </section>
    <section class="carta">
        <div class="container">
            <h3 class="text-center">Nuestra Carta</h3>
            <div class="row">
                <?php
                    $i = 0;
                    foreach($list as $data):
                        $i++;
                ?>
                <div class="card-group col-sm-12 col-md-6 col-xl-4 mt-4">
                    <div class="card">
                        <img src="views/img/<?php echo $data['imagen'].$i.".jpg"; ?>" class="card-img-top img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-title my-4"><?php echo $data['nombre']; ?></h5>
                            <div class="container card-text d-flex justify-content-between">
                                <p>S/. <?php echo $data['precio']; ?></p>
                                <p>S/. <?php echo $data['precio']; ?></p>
                            </div>
                            <p class="text-center">
                                <input type="button" value="Enviar al carrito" class="btn btn-primary btn-xl">
                            </p>
                            
                        </div>
                    </div>  
                </div>
                <?php endforeach; ?>  
            </div>
        </div>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="views/js/carrito.js"></script>

  
    
</body>
</html>