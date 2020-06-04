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
<!--- CKEditor --->
<script src="../../libs/ckeditor-basic/ckeditor.js"></script>

<!-- ------ Admin ------ -->

<?php
  $sql1 = "SELECT * FROM tab_usua WHERE statu_usua = 1 AND ident_tipo = 3";
  $result1 = mysqli_query($con, $sql1);
?>

<!-- Modal Add Proyecto Admin -->
  
<div id="addProyectoAdminModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form name="add_proyecto_admin" id="add_proyecto_admin" class="justify-content-center" align="center" action="" enctype="multipart/form-data" method="POST">
        <div class="modal-header">            
          <h4 class="modal-title">Registrar Proyecto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="ident_usua"><b>Innovador: </b></label>
              <select class="form-control" name="ident_usua" id="ident_usua">
                <option disabled selected value>Seleccionar una Opción...</option>
                  <?php
                    while($row1 = mysqli_fetch_array($result1)) {
                      echo '<option value='.$row1['ident_usua'].'>'.$row1['tipce_usua'].'-'.$row1['cedul_usua'].' - '.$row1['nombr_usua'].' '.$row1['apeli_usua'].'</option>';
                    }
                  ?> 
              </select>
            </div>   
          </div>  
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="nombr_proy"><b>Nombre: </b></label>
              <input type="text" class="form-control" name="nombr_proy" autocomplete="off" id="nombr_proy" maxlength="150" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="desco_proy"><b>Descripción Breve: </b></label>
              <input type="text" class="form-control" name="desco_proy" autocomplete="off" id="desco_proy" maxlength="150" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">        
            <div class="col form-group">
              <label class="form-label" for="descr_proy"><b>Descripción: </b></label>
              <textarea class="form-control" name="descr_proy" autocomplete="off" id="descr_proy" maxlength="5000"></textarea>
            </div>
          </div> 
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="areaa_proy"><b>Área: </b></label>
              <select class="form-control" id="areaa_proy" name="areaa_proy">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="ACADEMICO">ACADEMICO</option>
                <option value="INVESTIGADOR">INVESTIGADOR</option>
                <option value="INNOVADOR">INNOVADOR</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="motor_proy"><b>Motor: </b></label>
              <select class="form-control" id="motor_proy" name="motor_proy">
                <option disabled selected value>Seleccionar una Opción...</option>
                <option value="AGROALIMENTARIO">AGROALIMENTARIO</option>
                <option value="FARMACEUTICO">FARMACEUTICO</option>
                <option value="INDUSTRIA">INDUSTRIA</option>
                <option value="EXPORTACIONES">EXPORTACIONES</option>
                <option value="ECONOMIA COMUNAL">ECONOMIA COMUNAL</option>
                <option value="HIDROCARBUROS">HIDROCARBUROS</option>
                <option value="PETROQUIMICO">PETROQUIMICO</option>
                <option value="MINERIA">MINERIA</option>
                <option value="TURISMO">TURISMO</option>
                <option value="CONSTRUCCION">CONSTRUCCION</option>
                <option value="FORESTAL">FORESTAL</option>
                <option value="INDUSTRIA MILITAR">INDUSTRIA MILITAR</option>
                <option value="TELECOMUNICACIONES E INFORMATICA">TELECOMUNICACIONES E INFORMATICA</option>
                <option value="BANCA, SEGUROS, MERCADO DE VALORES">BANCA, SEGUROS, MERCADO DE VALORES</option>
                <option value="INDUSTRIAS BASICAS, ESTRATEGICAS Y SOCIALISTAS">INDUSTRIAS BASICAS, ESTRATEGICAS Y SOCIALISTAS</option>
              </select>
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

<!-- Modal Edit Proyecto Admin -->

<?php
  $sql1 = "SELECT * FROM tab_usua WHERE statu_usua = 1 AND ident_tipo = 3";
  $result1 = mysqli_query($con, $sql1);
?>

<div id="editProyectoAdminModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form name="edit_proyecto_admin" id="edit_proyecto_admin" class="justify-content-center" align="center" enctype="multipart/form-data" method="POST">
        <div class="modal-header">            
          <h4 class="modal-title">Editar Proyecto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_ident_usua"><b>Innovador: </b></label>
              <input type="hidden" name="edit_id" id="edit_id">
              <select class="form-control" name="edit_ident_usua" id="edit_ident_usua">
                  <?php
                    while($row1 = mysqli_fetch_array($result1)) {
                      echo '<option value='.$row1['ident_usua'].'>'.$row1['tipce_usua'].'-'.$row1['cedul_usua'].' - '.$row1['nombr_usua'].' '.$row1['apeli_usua'].'</option>';
                    }
                  ?> 
              </select>
            </div>   
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_nombr_proy"><b>Nombre: </b></label>
              <input type="text" class="form-control" name="edit_nombr_proy" autocomplete="off" id="edit_nombr_proy" maxlength="150" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_desco_proy"><b>Descripción Breve: </b></label>
              <input type="text" class="form-control" name="edit_desco_proy" autocomplete="off" id="edit_desco_proy" maxlength="150" onkeyup="this.value = this.value.toUpperCase();">
            </div>
          </div>
          <div class="form-row">        
            <div class="col form-group">
              <label class="form-label" for="edit_descr_proy"><b>Descripción: </b></label>
              <textarea class="form-control" name="edit_descr_proy" autocomplete="off" id="edit_descr_proy" maxlength="5000"></textarea>
            </div>
          </div> 
          <div class="form-row">
            <div class="col form-group">
              <label class="form-label" for="edit_areaa_proy"><b>Área: </b></label>
              <select class="form-control" id="edit_areaa_proy" name="edit_areaa_proy">
                <option value="ACADEMICO">ACADEMICO</option>
                <option value="INVESTIGADOR">INVESTIGADOR</option>
                <option value="INNOVADOR">INNOVADOR</option>
              </select>
            </div>
            <div class="col form-group">
              <label class="form-label" for="edit_motor_proy"><b>Motor: </b></label>
              <select class="form-control" id="edit_motor_proy" name="edit_motor_proy">
                <option value="AGROALIMENTARIO">AGROALIMENTARIO</option>
                <option value="FARMACEUTICO">FARMACEUTICO</option>
                <option value="INDUSTRIA">INDUSTRIA</option>
                <option value="EXPORTACIONES">EXPORTACIONES</option>
                <option value="ECONOMIA COMUNAL">ECONOMIA COMUNAL</option>
                <option value="HIDROCARBUROS">HIDROCARBUROS</option>
                <option value="PETROQUIMICO">PETROQUIMICO</option>
                <option value="MINERIA">MINERIA</option>
                <option value="TURISMO">TURISMO</option>
                <option value="CONSTRUCCION">CONSTRUCCION</option>
                <option value="FORESTAL">FORESTAL</option>
                <option value="INDUSTRIA MILITAR">INDUSTRIA MILITAR</option>
                <option value="TELECOMUNICACIONES E INFORMATICA">TELECOMUNICACIONES E INFORMATICA</option>
                <option value="BANCA, SEGUROS, MERCADO DE VALORES">BANCA, SEGUROS, MERCADO DE VALORES</option>
                <option value="INDUSTRIAS BASICAS, ESTRATEGICAS Y SOCIALISTAS">INDUSTRIAS BASICAS, ESTRATEGICAS Y SOCIALISTAS</option>
              </select>
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

<!-- Modal Delete Proyecto Admin -->

<div id="deleteProyectoAdminModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="delete_proyecto_admin" id="delete_proyecto_admin">
        <div class="modal-header">            
          <h4 class="modal-title">Desactivar Proyecto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          
          <p>¿Seguro que quieres desactivar este registro?</p>
          <p class="text-danger"><small>Se desactivará el Proyecto.</small></p>
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

<!-- Modal Restaurar Proyecto Admin -->

<div id="restaurarProyectoAdminModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="restaurar_proyecto_admin" id="restaurar_proyecto_admin">
        <div class="modal-header">            
          <h4 class="modal-title">Restaurar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          
          <p>¿Seguro que quieres restaurar este registro?</p>
          <p class="text-success"><small>Se restaurará el Proyecto.</small></p>
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

