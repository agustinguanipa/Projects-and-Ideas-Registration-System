<?php
  session_start();
  if (isset($_SESSION['loggedInUsuario'])) {
    header('Location: ../../index.php');
    exit();
  }
?>

<?php require_once('../includes/logreg_header.php'); ?>

<head>
  <title>Iniciar Sesión | Innovadores FUNDACITE Táchira</title>
  <style type="text/css">
    .chover, a:hover{
  color:#333
}
  </style>
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
  <nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <div class="navbar-collapse" id="navbarTop">
        <ul class="nav navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../index.php" style="font-style: italic; font-weight: bold;">Científicos e Innovadores Tecnológicos FUNDACITE Táchira</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
  <div class="container">
    <div class="form-group text-center">
      <div class="formulario-inicio">
        <form role="form" id="usuario_inicio" class=" justify-content-center" align="center" action="../sesion/usuario_autenticacion.php" method="post">
          <h3>Iniciar Sesión</h3>
          <hr class="my-4">
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="usuar_usua">Usuario: </label>
              <input type="text" class="form-control" name="usuar_usua" autocomplete="off" id="usuar_usua" placeholder="miusuario" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="contr_usua">Contraseña: </label>
              <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control" name="contr_usua" autocomplete="off" id="contr_usua" placeholder="********" maxlength="20">
                <div class="input-group-append">
                  <span class="input-group-text"><a href=""><i class="fa fa-eye-slash chover" aria-hidden="true"></i></a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Iniciar Sesión</button>
              <button type="reset" class="btn btn-secondary btn-block"><i class="fa fa-undo"></i> Limpiar</button>
            </div>
          </div>
          <p class="text-center">No estás Registrado? <a href="../usuario/usuario_registro.php">Registrarse</a> </p>
        </form>
      </div> 
    </div>
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>

<?php require_once('../includes/logreg_footer.php'); ?>


