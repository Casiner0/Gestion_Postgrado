<?php 
  session_start();
  ob_start();
  
  //Evitar k pase a páginas k no esten autorizadas
  if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
      case 1:
        header("location: pages/postgrados.php");
        break;
      case 2:
        header("location: pages/reportes.php");
        break;
      default:
        echo "Rol no encontrado";
        break;  
    }
  } 
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>S.C.P.</title>

    <!-- Bootstrap, CSS y jQuery -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"> 
    <link rel="stylesheet" href="css/signin.css" type="text/css" >
    <link rel="stylesheet" href="css/formato.css" type="text/css">
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/jQuery_validation.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>

    <!-- Icono del sitio -->
    <link rel="shortcut icon" href="../vista/img/icon.png">

    <!-- Para la compatibilidad de HTML5 con IE6-8 -->
    <script src="js/html5shiv.js"></script> 

  </head>
  <body>

    <div class="cabecera">
      <div class="container fondo_cabecera">
        <div class="text_cabecera">
          <h1 class="display-4" >Sistema de Control de Postgrado</h1>
        </div>
      </div>
    </div>
    <div class="text-center alerta_login" id="alerta_login"></div>
    
        
    </div>
    <form class="form-signin" name="form_login" id="form_login" method="POST">
        
      <div class="form-row form-group">
        <div class="col-12">
          <label for="user">Usuario</label>
          <input type="text" class="form-control" id="user" name="user">
          <div class="invalid-tooltip" id="alerta_user_vacio"></div>
          
        </div>
      </div>
      <div class="form-row form-group">
        <div class="col-12">
          <label for="pass">Contraseña</label>
          <input type="password" class="form-control" id="pass" name="pass">
          <div class="invalid-tooltip" id="alerta_pass"></div>
        </div>
      </div><br> 
      <button type="submit" name="btn_enviar" id="btn_enviar" class="btn btn-outline-success btn-block align-bottom" >Entrar</button>
      <hr>  
      <h6 class="text-muted">© Dirección de Postgrado | <?php echo date("Y") ?></h6> 
    </form> 
  </body>
</html>
