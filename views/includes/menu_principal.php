<nav class="navbar navbar-dark bg-black navbar-expand-md">
        <div class="container">
            <a href="#" class="navbar-brand"><img src="img/logo.png" class="img-fluid" alt="logo de carbon chicken" width="75px"></a>
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