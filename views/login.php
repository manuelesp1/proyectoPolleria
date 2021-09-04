<?php
$alert = '';
session_start();
if(empty($_SESSION['usuario'])){
  if(empty($_POST['correo']) || empty($_POST['clave'])){
    $alert = '<div class="alert alert-danger" role="alert">
    Ingrese su usuario y su clave
  </div>';
  }
  else{
    echo "se inicio sesion";
    echo strtolower($_SESSION['usuario']['nombre']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login del cliente</title>

  <!-- Custom fonts for this template-->
  <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  
	<link href="css/prueba1.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="img/logo.png" class="img-thumbnail">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión del CLIENTE</h1>
                  </div>
                  <form class="user" method="POST" action="../controllers/usuario_control.php">
                    <?php echo isset($alert) ? $alert : ""; ?>
                    <div class="form-group">
                      <label for="">Correo</label>
                      <input type="text" class="form-control" placeholder="Usuario" name="correo"></div>
                    <div class="form-group">
                      <label for="">Contraseña</label>
                      <input type="password" class="form-control" placeholder="Contraseña" name="clave">
                      <input type="hidden" name="action" value="verificar_usuario">
                    </div>
                    <input type="submit" value="Iniciar" class="btn btn-primary">
                    <a href="../index.php"><input class="btn btn-primary" value="Regresar"></imput></a>

                    <hr>

                     <nav class="menu">
                        <p>Si no tienes una cuenta, haz click en <a class="enlace" href="RegistrarCliente.php">Registrarse</a></p>
                     </nav>

                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

        
       


      </div>

      

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sistema/vendor/jquery/jquery.min.js"></script>
  <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sistema/js/sb-admin-2.min.js"></script>

</body>

</html>