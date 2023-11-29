<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S.C.P</title>

    <!-- Bootstrap y CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet"> 
    <link href="../css/formato.css" rel="stylesheet" type="text/css">
    <link href="../css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery y AJAX-->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/jQuery_validation.js"></script> 
    <script type="text/javascript" src="../js/ajax.js"></script> 
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script> 
       
    <!-- Menú personalizado -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Icono del sitio -->
    <link rel="shortcut icon" href="../../vista/img/icon.png">

    <!-- Para la compatibilidad de HTML5 con IE6-8 -->
    <script src="../vista/js/html5shiv.js"></script>
    

  </head>
  <body>
    <?php 
      session_start();
      
      $usuario = $_SESSION['username'];
      $rol = $_SESSION['rol'];

      // Pasando el rol a JS para mostrar las tablas correspondientes
      echo '<script>
      var roles = '.$rol.';
      </script>>';

      if (!isset($usuario) || !isset($rol)) {
        header("location: ../index.php");
      }
    ?>
    
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-11 col-md-2 mr-0" href="#">Sistema de Control de Postgrados</a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse separacion" id="navbarCollapse">
          <?php if ($rol == 1) { ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> 
              <a class="nav-link" href="postgrados.php"><span  data-feather="book"></span> Postgrados </a> 
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> 
              <a class="nav-link" href="profesores.php"><span data-feather="users"></span>Profesores </a> 
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> 
              <a class="nav-link" href="reportes.php"><span  data-feather="bar-chart-2"></span>Reportes </a> 
            </li>
          </ul>
          <?php 
            }else{
          ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item text-muted"> 
              <span  data-feather="book"></span> Postgrados 
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item text-muted"> 
              <span data-feather="users"></span>Profesores 
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item text-muted"> 
              <span  data-feather="bar-chart-2"></span>Reportes 
            </li>
          </ul>
          <?php } ?>
          <div class="text-right" id="salir">
          <form class="form-inline mt-2 mt-md-0">
            <div class="row">
              <div class="col-1 my-2">
                <img src="../img/user.png" width="24px">
              </div>
              <div class="col-md-7 col-sm-7">
                <?php echo utf8_encode ("<h6 class=\"text-white my-2\">$usuario</h6>" ) ?>
              </div>
              <div class="col-3 my-2">
                <a class="btn btn-sm btn-outline-success btn-block " href="../../vista/pages/salir.php" role="button">Salir</a>
              </div>
            </div>
          </form>
          </div>
        </div>
        
      </nav>
    </header>
    
    <?php 
      
	  include '../../vista/pages/menuLateral.php';
    ?>

    