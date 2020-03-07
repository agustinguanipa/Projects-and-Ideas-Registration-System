<?php
  session_start();

  $ident_usua = $_SESSION['ident_usua'];
  $imagen = $_SESSION['imagen'];

  require_once ("../../js/funciones.php");
  include_once '../../paginas/conexion_bd.php';

  $query_user = mysqli_query($con,"SELECT * FROM tab_usua r RIGHT JOIN tab_tipo t ON r.ident_tipo = t.ident_tipo WHERE ident_usua = $ident_usua");
    
  $result_user = mysqli_num_rows($query_user);

  $data_user = mysqli_fetch_array($query_user);

    $ident_usua = $data_user['ident_usua'];
    $ident_tipo = $data_user['ident_tipo'];
    $nombr_tipo = $data_user['nombr_tipo'];
    $tipce_usua=$row['tipce_usua'];
    $cedul_usua=$row['cedul_usua'];
    $nombr_usua=$row['nombr_usua'];
    $apeli_usua=$row['apeli_usua'];
    $gener_usua=$row['gener_usua'];
    $civil_usua=$row['civil_usua'];
    $nivel_usua=$row['nivel_usua'];
    $telef_usua=$row['telef_usua'];
    $email_usua=$row['email_usua'];
    $image_usua=$row['image_usua'];
    $estad_usua=$row['estad_usua'];
    $munic_usua=$row['munic_usua'];
    $direc_usua=$row['direc_usua'];
    $usuar_usua=$row['usuar_usua'];
    $fecre_usua=$row['fecre_usua'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
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
  <script>
  function goBack() {
    window.history.back();
  }
  </script>
</head>

<body>

<!-- Header --->

<header class="section-header">
  <section class="section-intro padding-y-0">
    <div class="intro-banner-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img class="banner1 float-left" src="../../imagen/logo-mppct.png" alt="Logo MPPCT">
          </div>
          <div class="col-lg-6">
            <img class="banner2 float-right" src="../../imagen/logo-mincty.png" alt="Logo MINCTY">
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
            <a class="nav-link" href="../../index.php"><i class="fa fa-home"></i> <b>Inicio </b></a>
          </li>
          <?php  if (isset($_SESSION['loggedInUsuario'])) :  ?>
             <?php
                // Session is Set  
                  if ($_SESSION['ident_tipo'] == 3)
                {
                echo "<li class='nav-item'>
                  <a class='nav-link' href='../usuario/usuario_cuenta.php'><i class='fa fa-user'></i> <b>Mi Cuenta </b></a>
                </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='../administrador/admin_panel.php'><i class='fa fa-cogs'></i> <b>Ir al Panel </b></a>
                </li>";
                }
              ?>
          <li class="nav-item">
            <a class="nav-link" href="../sesion/usuario_cerrar.php"><i class="fa fa-sign-out-alt"></i> <b>Cerrar Sesión </b></a>
          </li>
          <?php endif ?>
          <?php  if (!isset($_SESSION['loggedInUsuario'])) :  ?>
          <li class="nav-item">
            <a class="nav-link" href="../sesion/usuario_inicio.php"><i class="fa fa-sign-in-alt"></i> <b>Iniciar Sesión </b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuario/usuario_registro.php"><i class="fa fa-user-plus"></i> <b>Registrarse </b></a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
</header>