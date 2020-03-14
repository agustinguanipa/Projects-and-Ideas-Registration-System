<?php
  session_start();

  if (!isset($_SESSION['loggedInUsuario']) || $_SESSION['ident_tipo'] != 3) {
    header('Location: ../sesion/usuario_inicio.php');
    exit();
  }
?>

<?php require_once('../includes/principal_header.php'); ?>

<head>
	<title>Proyectos | Innovadores FUNDACITE Táchira</title>
</head>

<body>
  <section class="section-pagetop bg" style="padding: 15px;">
    <div class="container" align="center">
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <h2 class="" style="color: #000000;"><b>Mi Cuenta / Proyectos</b></h2>
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
            <div class="container">
                <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                        <div class="col-sm-12" align="left">
                          <h2><b>Proyectos</b></h2>
                        </div>
                      </div>
                  </div>
                  <div class="col-sm-8">
                    <a href="#addProyectoUsuarioModal" class="btn btn-success float-left" data-toggle="modal"><i class="fa fa-plus"></i> Registrar Proyecto</a>
                  </div>
                  <div class='col-sm-4 float-right'>
                    <div id="custom-search-input">
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" onclick="load(1);">
                              <span class="fa fa-search"></span>
                            </button>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class='clearfix'></div>
                  <hr>
                  <div id="loader"></div><!-- Carga de datos ajax aqui -->
                  <div id="resultados"></div><!-- Carga de datos ajax aqui -->
                  <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
                </div>
              </div>
          </main>
        </div>
      </div> 
    </section>
<!-- Modal HTML -->
<?php include("../administrador/modal_proyecto_usuario.php");?>
<script src="../../js/script_proyecto_usuario.js"></script>
</body>

<?php require_once('../includes/principal_footer.php');  ?>

