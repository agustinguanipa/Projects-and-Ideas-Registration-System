<?php
  session_start();

  $ident_usua = $_SESSION['ident_usua'];
  $imagen = $_SESSION['imagen'];

  if (!isset($_SESSION['loggedInUsuario']) || $_SESSION['ident_tipo'] == 3) {
    header('Location: ../../index.php');
    exit();
  }

  require_once ("../../js/funciones.php");
  require_once ("../includes/funcion_fecha.php");
  include_once '../../paginas/conexion_bd.php';

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
  <title>Panel de Control | Innovadores FUNDACITE Táchira</title>
  <meta name="description" content="FUNDACITE Táchira | Innovadores">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--- Favicon --->
  <link rel="shortcut icon" href="../../imagen/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../../imagen/favicon.ico" type="image/x-icon">
  <!--- CSS --->
  <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../../css/estilos_admin.css">
  <link rel="stylesheet" type="text/css" href="../../css/estilos_crud.css">
  <link href="../../libs/startbootstrap-simple-sidebar-gh-pages/css/simple-sidebar.css" rel="stylesheet">
  <link href="../../libs/startbootstrap-simple-sidebar-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../libs/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
  <!--- jQuery --->
  <script src="../../libs/jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
  <!--- jQuery Validation --->
  <script type="text/javascript" src="../../libs/jquery-validation-1.19.0/lib/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="../../libs/jquery-validation-1.19.0/dist/jquery.validate.js"></script>
  <!--- jQuery Mask Plugin --->
  <script type="text/javascript" src="../../libs/jQuery-Mask-Plugin/dist/jquery.mask.js"></script>
  <!--- Bootstrap 4 --->
  <link rel="stylesheet" href="../../libs/bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
  <script src="../../libs/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <!--- Bootstrap 4 UI E-Commerce --->
  <script src="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/bootstrap.css" rel="stylesheet" type="text/css"/>
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
  <script src="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/plugins/owlcarousel/owl.carousel.min.js"></script>
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/ui.css" rel="stylesheet" type="text/css"/>
  <link href="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)"/>
  <script src="../../libs/bootstrap-ecommerce-uikit/ui-ecommerce/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
    $('.telef-mask').mask('(0000) 000 0000');
  </script>
  <!--- Bootstrap 4 File Style 2 --->
  <script type="text/javascript" src="../../libs/bootstrap-filestyle-2.1.0/src/bootstrap-filestyle.min.js"> </script>
  <!--- CKEditor --->
  <script src="../../libs/ckeditor-basic/ckeditor.js"></script>
</head>

<body>

<!-- Header --->

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" align="center">
        <a href="admin_panel.php" style="text-decoration: none;">
          <img src="../../imagen/logo-fundacite.png" width="25" height="25" class="d-inline-block align-top" alt="">
          <span class="menu-collapsed" style="color: #000000; font-size: 0.9rem;"><b>Panel de Control</b></span>
        </a>
      </div>
      <div class="list-group list-group-flush">
        <ul class="list-group">
      <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed justify-content-center">
          <small>Menu Principal</small>
      </li>
      <!-- Menu -->
      <a href="admin_panel.php" aria-expanded="false" class="bg-light text-dark list-group-item list-group-item-action flex-column align-items-start tamano-elemento-sidebar">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-home fa-fw mr-3"></span> 
            <span class="menu-collapsed">Inicio</span>
        </div>
      </a>
      <a href="admin_usuarios.php" aria-expanded="false" class="bg-light text-dark list-group-item list-group-item-action flex-column align-items-start tamano-elemento-sidebar">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-users fa-fw mr-3"></span> 
            <span class="menu-collapsed">Innovadores</span>
        </div>
      </a>
      <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-light text-dark list-group-item list-group-item-action flex-column align-items-start tamano-elemento-sidebar">
          <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-lightbulb fa-fw mr-3"></span> 
            <span class="menu-collapsed">Proyectos</span>
            <span class="fa fa-caret-down ml-auto"></span>
          </div>
      </a>
        <!-- Submenu -->
        <div id='submenu1' class="collapse sidebar-submenu">
          <a href="admin_proyectos.php" class="list-group-item list-group-item-action bg-light text-dark">
            <span class="menu-collapsed">Proyectos</span>
          </a>
          <a href="admin_categorias.php" class="list-group-item list-group-item-action bg-light text-dark">
            <span class="menu-collapsed">Categorías</span>
          </a>
        </div>
      <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-light text-dark list-group-item list-group-item-action flex-column align-items-start tamano-elemento-sidebar">
          <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-cogs fa-fw mr-3"></span> 
            <span class="menu-collapsed">Administración</span>
            <span class="fa fa-caret-down ml-auto"></span>
          </div>
      </a>
        <!-- Submenu -->
        <div id='submenu2' class="collapse sidebar-submenu">
          <a href="admin_admins.php" class="list-group-item list-group-item-action bg-light text-dark">
            <span class="menu-collapsed">Usuarios</span>
          </a>
          <a href="admin_configuracion.php" class="list-group-item list-group-item-action bg-light text-dark">
            <span class="menu-collapsed">Configuración</span>
          </a>
        </div>
      <a href="admin_soporte.php" aria-expanded="false" class="bg-light text-dark list-group-item list-group-item-action flex-column align-items-start tamano-elemento-sidebar">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-tools fa-fw mr-3"></span> 
            <span class="menu-collapsed">Soporte</span>
        </div>
      </a>
    </ul>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
        <button class="btn btn-light" id="menu-toggle"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php  if (isset($_SESSION['loggedInUsuario'])) : ?>
              <li class="nav-item active">
                <a class="nav-link" style="color: #FFFFFF;"><b>San Cristóbal, <?php echo fechaToday(); ?></b></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="admin_panel.php" style="color: #FFFFFF;"><i class="fa fa-home"></i><b> Bienvenido <?php echo $data_user['nombr_usua'];?> <?php echo $data_user['apeli_usua'];?></b></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link"><img class="img-xxs rounded-circle" src="<?php echo $data_user['image_usua']; ?>" alt="Imagen de Perfil"></a> 
              </li>
            <?php endif ?>
          </ul>
        </div>
        <div class="dropdown show" style="padding-left: 10px;">
          <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" data-target="#dropdownMenu" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i><b></b></a>
          <div class="dropdown-menu dropdown-menu-right" id="dropdownMenu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../administrador/admin_cuenta.php"><i class="fa fa-user-circle"></i> <b>Mi Cuenta</b></a>
            <a class="dropdown-item" href="../sesion/usuario_cerrar.php"><i class="fa fa-sign-out-alt"></i> <b>Cerrar Sesión</b></a>
          </div>
        </div>
      </nav>

      <div class="container-fluid panel">