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
$ident_proy = $_REQUEST['ident_proy'];

include_once '../../paginas/conexion_bd.php';

$query_user = mysqli_query($con,"SELECT * FROM tab_proy u INNER JOIN tab_usua t ON u.ident_usua = t.ident_usua WHERE ident_proy = $ident_proy");
    
$result_user = mysqli_num_rows($query_user);

$data_user = mysqli_fetch_array($query_user);

	$ident_proy = $data_user['ident_proy'];
  $nombr_proy = $data_user['nombr_proy'];
  $desco_proy = $data_user['desco_proy'];
  $descr_proy = $data_user['descr_proy'];
  $areaa_proy = $data_user['areaa_proy'];
  $motor_proy = $data_user['motor_proy'];
  $fecre_proy = $data_user['fecre_proy'];
  $ident_usua = $data_user['ident_usua'];
  $cedul_usua = $data_user['cedul_usua'];
  $nombr_usua = $data_user['nombr_usua'];
  $apeli_usua = $data_user['apeli_usua'];
?>

<!-- Modal Look Proyecto -->

<div class="modal fade" id="lookProyectoModal" aria-labelledby="lookProyectoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="lookProyectoModal">Ver Proyecto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Nombre: </label><br>
            <label><?php echo $nombr_proy; ?></label>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Innovador: </label><br>
            <label><?php echo $cedul_usua; ?> - <?php echo $nombr_usua; ?> <?php echo $apeli_usua; ?></label>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Descripción Breve: </label><br>
            <label><?php echo $desco_proy; ?></label>
          </div>
        </div>
        <div class="form-row">
          <div class="col form-group">
            <label class="form-label">Descripción: </label><br>
            <label><?php echo $descr_proy; ?></label>
          </div>
        </div>
        <hr>
        <div class="form-row">
           <div class="col form-group">
            <label class="form-label">Área: </label><br>
            <label><?php echo $areaa_proy; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Motor: </label><br>
            <label><?php echo $motor_proy; ?></label>
          </div>
          <div class="col form-group">
            <label class="form-label">Fecha de Registro: </label><br>
            <label><?php echo $fecre_proy; ?></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" data-dismiss="modal" value="OK">
    </div>
    </div>
  </div>
</div>