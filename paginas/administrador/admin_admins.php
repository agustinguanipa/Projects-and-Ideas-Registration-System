<?php require_once('../includes/admin_header.php'); ?>

<!-- Contenido -->

<div class="container-fluid">
	<div class="table-wrapper">
	    <div class="table-title">
	        <div class="row">
            <div class="col-sm-6">
							<h2>Administrar <b>Usuarios</b></h2>
						</div>
						<div class="col-sm-6">
						<?php  
							if ($data_user['ident_usua'] == 1) {
						?>
							<a href="admin_admins.php" class="btn btn-light text-dark"><i class="fa fa-users"></i> Usuarios Activos</a>
							<a href="admin_admins_inactivos.php" class="btn btn-light text-dark"><i class="fa fa-trash"></i> Usuarios Inactivos</a>
						<?php	
							}
						?>
						</div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-sm-8">
	    		<?php  
						if ($data_user['ident_usua'] == 1) {
					?>
						<a href="#addAdminModal" class="btn btn-success float-left" data-toggle="modal"><i class="fa fa-plus"></i> Registrar Usuario</a>
					<?php	
						}
					?>
				</div>
	    	<div class="col-sm-4">
					<div id="custom-search-input">
			      <div class="input-group">
			          <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
			          <span class="input-group-btn">
		              <button class="btn btn-primary" type="button" onclick="load(1);">
		                <span class="fa fa-search"></span>
		              </button>
			          </span>
			      </div>
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
<!-- Modal HTML -->
<?php include("modal_admin.php");?>
<script src="../../js/script_admin.js"></script>
</body>
  
<?php require_once('../includes/admin_footer.php');  ?>
                               		                            