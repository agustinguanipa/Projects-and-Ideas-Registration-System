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
$ident_usua = $_REQUEST['ident_usua'];

include_once '../../paginas/conexion_bd.php';

$query_user = mysqli_query($con,"SELECT * FROM tab_usua WHERE ident_usua = $ident_usua");
    
$result_user = mysqli_num_rows($query_user);

$data_user = mysqli_fetch_array($query_user);

	$ident_usua = $data_user['ident_usua'];
  $tipce_usua = $data_user['tipce_usua'];
  $cedul_usua = $data_user['cedul_usua'];
	$nombr_usua = $data_user['nombr_usua'];
  $apeli_usua = $data_user['apeli_usua'];
  $gener_usua = $data_user['gener_usua'];
  $civil_usua = $data_user['civil_usua'];
  $nivel_usua = $data_user['nivel_usua'];
  $telef_usua = $data_user['telef_usua'];
  $email_usua = $data_user['email_usua'];
  $image_usua = $data_user['image_usua'];
  $estad_usua = $data_user['estad_usua'];
  $munic_usua = $data_user['munic_usua'];
  $direc_usua = $data_user['direc_usua'];
  $fecre_usua = $data_user['fecre_usua'];
?>

<!-- Modal Look Usuario -->

<div class="modal fade" id="lookUsuarioModal" aria-labelledby="lookUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="lookUsuarioModal">Ver Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <div class="form-row" align="center">
          <div class="col form-group">
            <img class="img-md rounded-circle" align="center" src="<?php echo $image_usua; ?>" alt="Imagen Perfil">
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Cédula de Identidad: </label>
            <label><?php echo $tipce_usua; ?>-<?php echo $cedul_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Nombre: </label>
            <label><?php echo $nombr_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Apellido: </label>
            <label><?php echo $apeli_usua; ?></label>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Genero: </label>
            <label><?php echo $gener_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Estado Civil: </label>
            <label><?php echo $civil_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Nivel de Instrucción: </label>
            <label><?php echo $nivel_usua; ?></label>
          </div>
        </div>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Teléfono: </label>
            <label><?php echo $telef_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">E-Mail: </label>
            <label><?php echo $email_usua; ?></label>
          </div>
        </div>
        <hr>
        <div class="form-row">
           <div class="col form-group">
            <label class="form-label">Estado: </label>
            <label><?php echo $estad_usua; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Municipio: </label>
            <label><?php echo $munic_usua; ?></label>
          </div>
        </div>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Dirección: </label>
            <label><?php echo $direc_usua; ?></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" data-dismiss="modal" value="OK">
    </div>
    </div>
  </div>
</div>
