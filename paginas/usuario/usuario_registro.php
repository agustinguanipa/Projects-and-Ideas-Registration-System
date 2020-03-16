<?php require_once('../includes/logreg_header.php'); ?>

<head>
  <title>Registrarse | Innovadores FUNDACITE Táchira</title>
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
      <div class="formulario-registro">
        <form role="form" id="usuario_registro" class="justify-content-center" align="center" action="usuario_registro_guardar.php" enctype="multipart/form-data" method="post">
          <h3>Registrarse</h3>
          <hr class="my-4">
          <div class="form-row">
            <div class="col-4 form-group">
              <label class="form-label" for="cedul_usua">Cédula de Identidad: </label>
              <input type="text" class="form-control cedul-mask" name="cedul_usua" autocomplete="off" id="cedul_usua" placeholder="V-12345678" maxlength="10" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col-4 form-group">
              <label class="form-label" for="nombr_usua">Nombre: </label>
              <input type="text" class="form-control" name="nombr_usua" autocomplete="off" id="nombr_usua" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col-4 form-group">
              <label class="form-label" for="apeli_usua">Apellido</label>
              <input type="text" class="form-control" name="apeli_usua" autocomplete="off" id="apeli_usua" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="gener_usua">Genero: </label>
              <select class="form-control" id="gener_usua" name="gener_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="civil_usua">Estado Civil: </label>
              <select class="form-control" id="civil_usua" name="civil_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="SOLTERO">SOLTERO(A)</option>
                <option value="CASADO">CASADO(A)</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="nivel_usua">Nivel de Instrucción: </label>
              <select class="form-control" id="nivel_usua" name="nivel_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="PRIMARIA">PRIMARIA</option>
                <option value="BACHILLERATO">BACHILLERATO</option>
                <option value="TÉCNICO MEDIO">TÉCNICO MEDIO</option>
                <option value="TÉCNICO SUPERIOR">TÉCNICO SUPERIOR</option>
                <option value="UNIVERSITARIO">UNIVERSITARIO</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="telef_usua">Telefono: </label>
              <input type="text" class="form-control telef-mask" name="telef_usua" autocomplete="off" id="telef_usua" placeholder="(0000) 000 0000" maxlength="15">
            </div>
            <div class="col form-group">
              <label class="form-label" for="email_usua">E-Mail: </label>
              <input type="email" class="form-control" name="email_usua" autocomplete="off" id="email_usua" placeholder="correo@mail.com" maxlength="100" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="image_usua"><b>Imagen de Perfil: </b></label>
              <input type="file" class="filestyle" id="image_usua" name="image_usua" alt="Imagen de Perfil" data-btnClass="btn-primary" data-text="Subir" data-placeholder="Seleccione una Imagen..." accept="image/*">
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="estad_usua">Estado: </label>
              <select class="form-control" id="estad_usua" name="estad_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="TACHIRA">TACHIRA</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="munic_usua">Municipio: </label>
              <select class="form-control" id="munic_usua" name="munic_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
                <option value="CARDENAS">CARDENAS</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="direc_usua">Dirección: </label>
              <input type="text" class="form-control" name="direc_usua" autocomplete="off" id="direc_usua" maxlength="150">
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="usuar_usua">Usuario: </label>
              <input type="text" class="form-control" name="usuar_usua" autocomplete="off" id="usuar_usua" placeholder="miusuario" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col form-group">
              <label class="form-label" for="contr_usua">Contraseña: </label>
              <input type="password" class="form-control" name="contr_usua" autocomplete="off" id="contr_usua" placeholder="********" maxlength="20">
            </div>
            <div class="col form-group">
              <label class="form-label" for="confirm_password">Confirmar Contraseña: </label>
              <input type="password" class="form-control" name="confirm_password" autocomplete="off" id="confirm_password" placeholder="********" maxlength="20">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <button type="submit" class="btn btn-primary btn-block" name="add"><i class="fa fa-user"></i> Registrarse</button>
              <button type="reset" class="btn btn-secondary btn-block" data-dismiss="modal"><i class="fa fa-undo"></i> Limpiar</button>
            </div>
          </div>
          <p class="text-center">Estás Registrado? <a href="../sesion/usuario_inicio.php">Iniciar Sesión</a> </p>
        </form>
      </div> 
    </div>
  </div>
</body>

<?php require_once('../includes/logreg_footer.php'); ?>


