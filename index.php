<?php
  session_start();

  $ident_usua = $_SESSION['ident_usua'];

  include_once 'paginas/conexion_bd.php';

  $query_user = mysqli_query($con,"SELECT * FROM tab_usua WHERE ident_usua = $ident_usua");
      
  $result_user = mysqli_num_rows($query_user);

  $data_user = mysqli_fetch_array($query_user);

    $ident_usua = $data_user['ident_usua'];
    $nombr_usua = $data_user['nombr_usua'];
    $apeli_usua = $data_user['apeli_usua'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio | Innovadores FUNDACITE Táchira</title>
  <meta name="description" content="FUNDACITE Táchira | Innovadores">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--- Favicon --->
  <link rel="shortcut icon" href="imagen/favicon.ico" type="image/x-icon">
  <link rel="icon" href="imagen/favicon.ico" type="image/x-icon">
  <!--- CSS --->
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="css/estilos_admin.css">
  <!--- jQuery --->
  <script src="libs/jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
  <!--- jQuery Validation --->
  <script type="text/javascript" src="libs/jquery-validation-1.19.0/lib/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="libs/jquery-validation-1.19.0/dist/jquery.validate.js"></script>
  <!--- jQuery Mask Plugin --->
  <script type="text/javascript" src="libs/jQuery-Mask-Plugin/dist/jquery.mask.js"></script>
  <!--- JS --->
  <script src="js/validacion.js" type="text/javascript"></script>
  <script src="js/admin_sidebar.js" type="text/javascript"></script>
  <!--- Bootstrap 4 --->
  <link rel="stylesheet" href="libs/bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
  <script src="libs/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <!--- Bootstrap 4 UI E-Commerce --->
  <script src="libs/bootstrap-ecommerce-uikit/ui-ecommerce/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="libs/bootstrap-ecommerce-uikit/ui-ecommerce/js/jquery-2.0.0.min.js" type="text/javascript"></script>
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/bootstrap.css" rel="stylesheet" type="text/css"/>
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
  <script src="libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/owl.carousel.min.js"></script>
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/ui.css" rel="stylesheet" type="text/css"/>
  <link href="libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)"/>
  <script src="libs/bootstrap-ecommerce-uikit/ui-ecommerce/js/script.js" type="text/javascript"></script>
</head>

<body>

<!-- Header --->

<header class="section-header">
  <section class="section-intro padding-y-0">
    <div class="intro-banner-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img class="banner1 float-left" src="imagen/logo-mppct.png" alt="Logo MPPCT">
          </div>
          <div class="col-lg-6">
            <img class="banner2 float-right" src="imagen/logo-mincty.png" alt="Logo MINCTY">
          </div>
        </div>
      </div>
    </div>
    </section>
  <!-- Barra 1 --->
  <nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTop">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php" style="font-style: italic; font-weight: bold;">FUNDACITE Táchira</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> <b>Inicio </b></a>
          </li>
          <?php  if (isset($_SESSION['loggedInUsuario'])) :  ?>
             <?php
                // Session is Set  
                  if ($_SESSION['ident_tipo'] == 3)
                {
                echo "<li class='nav-item'>
                  <a class='nav-link' href='paginas/usuario/usuario_cuenta.php'><i class='fa fa-user'></i> <b>Mi Cuenta </b></a>
                </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='paginas/administrador/admin_panel.php'><i class='fa fa-cogs'></i> <b>Ir al Panel </b></a>
                </li>";
                }
              ?>
          <li class="nav-item">
            <a class="nav-link" href="paginas/sesion/usuario_cerrar.php"><i class="fa fa-sign-out-alt"></i> <b>Cerrar Sesión </b></a>
          </li>
          <?php endif ?>
          <?php  if (!isset($_SESSION['loggedInUsuario'])) :  ?>
          <li class="nav-item">
            <a class="nav-link" href="paginas/sesion/usuario_inicio.php"><i class="fa fa-sign-in-alt"></i> <b>Iniciar Sesión </b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="paginas/usuario/usuario_registro.php"><i class="fa fa-user-plus"></i> <b>Registrarse </b></a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<section class="section-intro padding-y-sm">
<div class="container">
  <div class="intro-banner-wrap">
    <div class="card-deck">
      <div class="card" align="center">
        <div class="card-body index-background" style="padding: 40px;">
          <h2 class="card-title text-white" style="font-size: 35px;"><b>Científicos e Innovadores del Estado Táchira</b></h2>
          <p class="card-text text-white"><b>Registro de Científicos e Innovadores Tecnológicos </b></p>
          <?php  if (isset($_SESSION['loggedInUsuario'])) :  ?>
            <p class="card-text text-white"><b>Bienvenido <?php echo $data_user['nombr_usua'];?> <?php echo $data_user['apeli_usua'];?></b></p>
          <?php endif ?>
          <?php  if (!isset($_SESSION['loggedInUsuario'])) :  ?>
            <a href="paginas/sesion/usuario_inicio.php" class="btn btn-light btn-lg"> <b>Iniciar Sesión</b><i class="fa fa-sign-in-alt ml-2"></i></a>
            <a href="paginas/usuario/usuario_registro.php" class="btn btn-light btn-lg"> <b>Registrarse</b><i class="fa fa-user-plus ml-2"></i></a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section class="section-content padding-y-sm">
  <div class="container">
    <article class="card card-body">
      <div class="row">
        <div class="col-md-4">  
          <figure class="item-feature">
            <span class="text-primary"><i class="fa fa-2x fa-flag"></i></span>
            <figcaption class="pt-3">
              <h5 class="title"><b>Propuestas y Soluciones</b></h5>
              <p>Búsqueda de Propuestas Innovadoras y Soluciones Productivas para Impulsar la Economía del País</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-md-4">
          <figure  class="item-feature">
            <span class="text-primary"><i class="fa fa-2x fas fa-globe"></i></span>  
            <figcaption class="pt-3">
              <h5 class="title"><b>Herramienta Estratégica del Gobierno Nacional</b></h5>
              <p>Una Forma de Atender los Retos que tiene el País, especialmente en las Áreas de Agroalimentación, Agua Potable y Energía Eléctrica
               </p>
            </figcaption>
          </figure>
        </div>
          <div class="col-md-4">
          <figure  class="item-feature">
            <span class="text-primary"><i class="fa fa-2x fa-book"></i></span>
            <figcaption class="pt-3">
              <h5 class="title"><b>Defensa de la Soberanía del Conocimiento </b></h5>
              <p>Oportunidad para Reconocer y Activar Nuestras Capacidades como Pueblo y Nuestras Ideas para Vencer
               </p>
            </figcaption>
          </figure>
        </div>
      </div>
    </article>
  </div>
</section>
<br>

<!-- Footer --->

<footer class="section-footer bg2">
  <div class="container">
    <section class="footer-bottom row">
      <div class="col-sm-4" align="left"> 
        <p><b>Ministerio del Poder Popular para Ciencia y Tecnología </b></p>
      </div>
      <div class="col-sm-4 form-group" align="center">
          <p class="text-sm"><b>Redes Sociales</b></p>
          <a href="https://facebook.com/agustin.guanipa" class="icono fab fa-facebook"></a>
          <a href="https://twitter.com/AgustinGuanipa" class="icono fab fa-twitter"></a>
          <a href="https://instagram.com/agustinguanipa/" class="icono fab fa-instagram"></a>
        </div>
      <div class="col-sm-4" align="right">
        <p class="text-sm-right"><b>FUNDACITE Táchira</b></p>
        <p class="text-sm-right">Copyright &copy 2020<br>
        </p>
      </div>
    </section>
  </div>
</footer>

</body>
</html>

