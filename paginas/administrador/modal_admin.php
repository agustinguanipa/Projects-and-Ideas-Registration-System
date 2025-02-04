<!--- CSS --->
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" type="text/css" href="../../css/estilos_admin.css">
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
<script type="text/javascript" src="../../libs/jquery-validation-1.19.0/dist/jquery.validate.js"></script>
<!--- jQuery Mask Plugin --->
<script type="text/javascript" src="../../libs/jQuery-Mask-Plugin/dist/jquery.mask.js"></script>
<!--- JS --->
<script src="../../js/validacion.js" type="text/javascript"></script>

<?php
  $sql = "SELECT * FROM tab_tipo WHERE ident_tipo != 1 AND ident_tipo != 3";
  $result = mysqli_query($con, $sql);
?>

<!-- Modal Add Admin -->
  
<div id="addAdminModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form name="add_admin" id="add_admin" class="justify-content-center" align="center" action="" enctype="multipart/form-data" method="POST">
        <div class="modal-header">            
          <h4 class="modal-title">Registrar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          
          <div class="form-row">
            <div class="col-4 form-group">
              <label class="form-label" for="cedul_usua"><b>Cédula de Identidad: </b></label>
              <input type="text" class="form-control cedul-mask" name="cedul_usua" autocomplete="off" id="cedul_usua" placeholder="V-12345678" maxlength="10" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col-4 form-group">
              <label class="form-label" for="nombr_usua"><b>Nombre: </b></label>
              <input type="text" class="form-control" name="nombr_usua" autocomplete="off" id="nombr_usua" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col-4 form-group">
              <label class="form-label" for="apeli_usua"><b>Apellido: </b></label>
              <input type="text" class="form-control" name="apeli_usua" autocomplete="off" id="apeli_usua" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="gener_usua"><b>Genero: </b></label>
              <select class="form-control" id="gener_usua" name="gener_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="civil_usua"><b>Estado Civil: </b></label>
              <select class="form-control" id="civil_usua" name="civil_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="SOLTERO">SOLTERO(A)</option>
                <option value="CASADO">CASADO(A)</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="nivel_usua"><b>Nivel de Instrucción: </b></label>
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
              <label class="form-label" for="telef_usua"><b>Telefono: </b></label>
              <input type="text" class="form-control telef-mask" name="telef_usua" autocomplete="off" id="telef_usua" placeholder="(0000) 000 0000" maxlength="15">
            </div>
            <div class="col form-group">
              <label class="form-label" for="email_usua"><b>E-Mail: </b></label>
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
              <label class="form-label" for="estad_usua"><b>Estado: </b></label>
              <select class="form-control" id="estad_usua" name="estad_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="TACHIRA">TACHIRA</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="munic_usua"><b>Municipio: </b></label>
              <select class="form-control" id="munic_usua" name="munic_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
                <option value="CARDENAS">CARDENAS</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="direc_usua"><b>Dirección: </b></label>
              <input type="text" class="form-control" name="direc_usua" autocomplete="off" id="direc_usua" maxlength="150">
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="ident_tipo"><b>Tipo de Usuario: </b></label>
              <select class="form-control" name="ident_tipo" id="ident_tipo">
                <option disabled selected value>Seleccionar una Opción...</option>
                  <?php
                    while($row = mysqli_fetch_array($result)) {
                      echo '<option value='.$row['ident_tipo'].'>'.$row['nombr_tipo'].'</option>';
                    }
                  ?> 
              </select>
            </div>
          </div> 
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="usuar_usua"><b>Usuario: </b></label>
              <input type="text" class="form-control" name="usuar_usua" autocomplete="off" id="usuar_usua" placeholder="miusuario" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="col form-group">
              <label class="form-label" for="contr_usua"><b>Contraseña: </b></label>
              <input type="password" class="form-control" name="contr_usua" autocomplete="off" id="contr_usua" placeholder="********" maxlength="20">
            </div>
            <div class="col form-group">
              <label class="form-label" for="confirm_password"><b>Confirmar Contraseña: </b></label>
              <input type="password" class="form-control" name="confirm_password" autocomplete="off" id="confirm_password" placeholder="********" maxlength="20">
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-primary" value="Registrar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Admin -->

<div id="editAdminModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form name="edit_admin" id="edit_admin" class="justify-content-center" align="center" enctype="multipart/form-data" method="POST">
        <div class="modal-header">            
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label"><b>Nombre: </b></label>
              <input type="text" name="edit_nombr_usua"  id="edit_nombr_usua" class="form-control" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
              <input type="hidden" name="edit_id" id="edit_id">
            </div>
            <div class="col form-group">
              <label class="form-label"><b>Apellido: </b></label>
              <input type="text" name="edit_apeli_usua"  id="edit_apeli_usua" class="form-control" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label"><b>Genero: </b></label>
              <select class="form-control" id="edit_gener_usua" name="edit_gener_usua">
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label"><b>Estado Civil: </b></label>
              <select class="form-control" id="edit_civil_usua" name="edit_civil_usua">
                <option value="SOLTERO">SOLTERO(A)</option>
                <option value="CASADO">CASADO(A)</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label"><b>Nivel de Instrucción: </b></label>
              <select class="form-control" id="edit_nivel_usua" name="edit_nivel_usua">
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
              <label class="form-label"><b>Telefono: </b></label>
              <input type="text" name="edit_telef_usua"  id="edit_telef_usua" class="form-control telef-mask" maxlength="15">
            </div>
            <div class="col form-group">
              <label class="form-label"><b>E-Mail: </b></label>
              <input type="email" name="edit_email_usua"  id="edit_email_usua" class="form-control" maxlength="100" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_estad_usua"><b>Estado: </b></label>
              <select class="form-control" id="edit_estad_usua" name="edit_estad_usua">
                <option value="TACHIRA">TACHIRA</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="edit_munic_usua"><b>Municipio: </b></label>
              <select class="form-control" id="edit_munic_usua" name="edit_munic_usua">
                <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
                <option value="CARDENAS">CARDENAS</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_direc_usua"><b>Dirección: </b></label>
              <input type="text" class="form-control" name="edit_direc_usua" id="edit_direc_usua" maxlength="150">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete Usuario-->

<div id="deleteAdminModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="delete_usuario" id="delete_admin">
        <div class="modal-header">            
          <h4 class="modal-title">Desactivar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          
          <p>¿Seguro que quieres desactivar este registro?</p>
          <p class="text-danger"><small>Se desactivará el Usuario.</small></p>
          <input type="hidden" name="delete_id" id="delete_id">
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-danger" value="Desactivar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Restaurar Usuario-->

<div id="restaurarAdminModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="restaurar_admin" id="restaurar_admin">
        <div class="modal-header">            
          <h4 class="modal-title">Restaurar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          
          <p>¿Seguro que quieres restaurar este registro?</p>
          <p class="text-success"><small>Se restaurará el Usuario.</small></p>
          <input type="hidden" name="restaurar_id" id="restaurar_id">
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-dismiss="modal" value="Cancelar">
          <input type="submit" class="btn btn-success" value="Restaurar">
        </div>
      </form>
    </div>
  </div>
</div>

