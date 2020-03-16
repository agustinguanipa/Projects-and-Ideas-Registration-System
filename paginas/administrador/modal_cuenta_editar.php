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
<!--- jQuery --->
<script src="../../libs/jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
<!--- jQuery Mask Plugin --->
<script type="text/javascript" src="../../libs/jQuery-Mask-Plugin/dist/jquery.mask.js"></script>
<!--- jQuery Validation --->
<script type="text/javascript" src="../../libs/jquery-validation-1.19.0/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../../libs/jquery-validation-1.19.0/dist/jquery.validate.js"></script>
<!--- JS --->
<script src="../../js/validacion.js" type="text/javascript"></script>
<!--- Bootstrap 4 File Style 2 --->
<script type="text/javascript" src="../../libs/bootstrap-filestyle-2.1.0/src/bootstrap-filestyle.min.js"> </script>

<?php
include_once '../../paginas/conexion_bd.php';

$query_user = mysqli_query($con,"SELECT * FROM tab_usua WHERE ident_usua = $ident_usua");
    
$result_user = mysqli_num_rows($query_user);

$data_user = mysqli_fetch_array($query_user);

	$ident_usua = $data_user['ident_usua'];
  $cedul_usua=$data_user['cedul_usua'];
  $nombr_usua=$data_user['nombr_usua'];
  $apeli_usua=$data_user['apeli_usua'];
  $gener_usua=$data_user['gener_usua'];
  $civil_usua=$data_user['civil_usua'];
  $nivel_usua=$data_user['nivel_usua'];
  $telef_usua=$data_user['telef_usua'];
  $email_usua=$data_user['email_usua'];
  $image_usua=$data_user['image_usua'];
  $estad_usua=$data_user['estad_usua'];
  $munic_usua=$data_user['munic_usua'];
  $direc_usua=$data_user['direc_usua'];
  $usuar_usua=$data_user['usuar_usua'];
  $fecre_usua=$data_user['fecre_usua'];
?>

<!-- Modal Edit Usuario -->

<div class="modal fade" id="edit_<?php echo $ident_usua; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="edit" class="justify-content-center" align="center" method="post" action="../../ajax/administrador/editar_usuario.php?id=<?php echo $ident_usua; ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>     
          </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
              <div class="col form-group text-center" style="position: relative;" >
                <label class="form-label" for="image_usua"><b>Imagen de Perfil: </b></label>
                <span class="img-div">
                  <div class="text-center img-placeholder"  onClick="triggerClick()">
                    <h4>Actualizar Imagen</h4>
                  </div>
                  <img src="<?php echo $image_usua; ?>" onClick="triggerClick()" id="profileDisplay">
                </span>
                <input type="file" name="image_usua" onChange="displayImage(this)" id="image_usua" class="form-control" style="display: none;">
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <input type="hidden" name="ident_usua" id="ident_usua">
                <label class="form-label"><b>Nombre: </b></label>
                <input type="text" name="nombr_usua"  id="nombr_usua" class="form-control" value="<?php echo $nombr_usua; ?>" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
              </div>
              <div class="col form-group">
                <label class="form-label"><b>Apellido</b></label>
                <input type="text" name="apeli_usua"  id="apeli_usua" class="form-control" value="<?php echo $apeli_usua; ?>" maxlength="20" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <label class="form-label" for="gener_usua"><b>Genero: </b></label>
                <select class="form-control notItemOne" id="gener_usua" name="gener_usua">
                  <option value="<?php echo $gener_usua; ?>"><?php echo $gener_usua; ?></option>
                  <option value="MASCULINO">MASCULINO</option>
                  <option value="FEMENINO">FEMENINO</option>
                </select>
              </div>
              <div class="col form-group">
                <label class="form-label" for="civil_usua"><b>Estado Civil: </b></label>
                <select class="form-control notItemOne" id="civil_usua" name="civil_usua">
                  <option value="<?php echo $civil_usua; ?>"><?php echo $civil_usua; ?></option>
                  <option value="SOLTERO">SOLTERO(A)</option>
                  <option value="CASADO">CASADO(A)</option>
                </select>
              </div>
              <div class="col form-group">
                <label class="form-label" for="nivel_usua"><b>Nivel de Inst.: </b></label>
                <select class="form-control notItemOne" id="nivel_usua" name="nivel_usua">
                  <option value="<?php echo $nivel_usua; ?>"><?php echo $nivel_usua; ?></option>
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
                <input type="text" class="form-control telef-mask" name="telef_usua" autocomplete="off" id="telef_usua" placeholder="(0000) 000 0000" maxlength="15" value="<?php echo $telef_usua; ?>">
              </div>
              <div class="col form-group">
                <label class="form-label" for="email_usua"><b>E-Mail: </b></label>
                <input type="email" class="form-control" name="email_usua" autocomplete="off" id="email_usua" placeholder="correo@mail.com" maxlength="100" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $email_usua; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <label class="form-label" for="estad_usua"><b>Estado: </b></label>
                <select class="form-control" id="estad_usua" name="estad_usua">
                  <option value="<?php echo $estad_usua; ?>"><?php echo $estad_usua; ?></option>
                  <option value="TACHIRA">TACHIRA</option>
                </select>
              </div>
              <div class="col form-group">
                <label class="form-label" for="munic_usua"><b>Municipio: </b></label>
                <select class="form-control" id="munic_usua" name="munic_usua">
                  <option value="<?php echo $munic_usua; ?>"><?php echo $munic_usua; ?></option>
                  <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
                  <option value="CARDENAS">CARDENAS</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group">
                <label class="form-label" for="direc_usua"><b>Dirección: </b></label>
                <input type="text" class="form-control" name="direc_usua" autocomplete="off" id="direc_usua" maxlength="150" value="<?php echo $direc_usua; ?>">
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

<script type="text/javascript">
  $( "#edit" ).validate( {

    rules: {
      nombr_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      apeli_usua: {
        required: true,
        lettersonly: true,
        minlength: 2
      },
      gener_usua: {
        required: true
      },
      civil_usua: {
        required: true
      },
      nivel_usua: {
        required: true
      },
      telef_usua: {
        required: true,
        number: false,
        minlength: 15
      },
      email_usua: {
        required: true,
        email: true
      },
      estad_usua: {
        required: true
      },
      munic_usua: {
        required: true
      },
      direc_usua: {
        required: true,
        minlength: 10
      },
    },

    messages: {
      nombr_usua: {
        required: "Ingrese su Nombre",
        lettersonly: "Tu Nombre solo debe contener letras sin espacios",
        minlength: "Tu Nombre debe contener al menos 2 caracteres"
      },
      apeli_usua: {
        required: "Ingrese su Apellido",
        lettersonly: "Tu Apellido solo debe contener letras sin espacios",
        minlength: "Tu Apellido debe contener al menos 2 caracteres"
      },
      gener_usua: {
        required: "Seleccione una Opción"
      },
      civil_usua: {
        required: "Seleccione una Opción"
      },
      nivel_usua: {
        required: "Seleccione una Opción"
      },
      telef_usua: {
        required: "Seleccione una Opción"
      },
      telef_usua: {
        required: "Ingrese un Número de Teléfono Valido",
        number: "Ingrese un Número de Teléfono Valido",
        minlength: "Ingrese un Número de Teléfono Valido"
      },
      email_usua: {
        required: "Ingrese una Dirección de Correo Electrónico Válida",
        email: "Ingrese una Dirección de Correo Electrónico Válida"
      },
      estad_usua: {
        required: "Seleccione una Opción"
      },
      munic_usua: {
        required: "Seleccione una Opción"
      },
      direc_usua: {
        required: "Ingrese su Dirección",
        minlength: "Tu Dirección debe contener al menos 10 caracteres"
      },
    },

    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `invalid-feedback` class to the error element
      error.addClass( "invalid-feedback" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.next( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
});

// Imagen de Perfil

function triggerClick(e) {
  document.querySelector('#image_usua').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>


