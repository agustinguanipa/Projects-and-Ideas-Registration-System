<?php
  session_start();

  if (!isset($_SESSION['loggedInUsuario']) || $_SESSION['ident_tipo'] != 3) {
    header('Location: ../sesion/usuario_inicio.php');
    exit();
  }
?>

<?php require_once('../includes/principal_header.php'); ?>

<head>
	<title>Mi Cuenta | Innovadores FUNDACITE Táchira</title>
</head>

<body>

  <section class="section-pagetop bg" style="padding: 15px;">
      <div class="container" align="center">
        <div class="row">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
            <h2 class="" style="color: #000000;"><b>Mi Cuenta</b></h2>
          </div>
          <div class="col-sm-4">
          </div>
        </div>
      </div>
    </section>

    <section class="section-content padding-y">
      <div class="container">
        <div class="row">
          <aside class="col-md-3">
            <ul class="list-group">
              <a class="list-group-item active" href="usuario_cuenta.php"><i class="fa fa-user-circle"></i> Mi Cuenta</a>
              <a class="list-group-item" href="usuario_proyectos.php"><i class="fa fa-lightbulb"></i> Proyectos</a>
              <a class="list-group-item" href="usuario_configuracion.php"><i class="fa fa-cogs"></i> Configuración</a>
            </ul>
          </aside>
          <main class="col-md-9">
            <article class="card mb-3">
              <div class="card-body">
                <figure class="icontext">
                    <div class="icon" style="padding-right: 20px; ">
                      <img class="rounded-circle img-sm border" src="<?php echo $data_user['image_usua']; ?>">
                    </div>
                    <div class="text">
                      <strong> Bienvenido! <?php echo $data_user['nombr_usua'];?> <?php echo $data_user['apeli_usua'];?></strong> <br> 
                      <?php echo $data_user['email_usua'];?> <br> 
                    </div>
                </figure>
                <hr>
                <article class="card-group">
                  <div class="card-deck justify-content-center" align="center">
                    <div class="card card-lg">
                      <img src="../../imagen/micuenta-5.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><b>Proyectos</b></h5>
                        <p class="card-text">Mira, Publica y Haz Seguimiento a tus Proyectos</p>
                      </div>
                      <div class="card-footer">
                        <a href="usuario_proyectos.php" class="btn btn-primary stretched-link">Ver Proyectos</a>
                      </div>
                    </div>
                    <div class="card card-lg">
                      <img src="../../imagen/micuenta-6.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><b>Configuración</b></h5>
                        <p class="card-text">Edita tus Datos Personales</p>
                      </div>
                      <div class="card-footer">
                        <a href="usuario_configuracion.php" class="btn btn-primary stretched-link">Ver Configuración</a>
                      </div>
                    </div>
                  </div>
                </article>
              </div> 
            </article>
          </main>
        </div>
      </div> 
    </section>
</body>

<?php require_once('../includes/principal_footer.php');  ?>


