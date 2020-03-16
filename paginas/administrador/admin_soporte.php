<?php 

	require_once('../includes/admin_header.php'); 
	include_once '../../paginas/conexion_bd.php';
	include_once 'admin_import_controller.php';

	$importCtrl      =    	new ImportController($con);

?>

<!-- Contenido -->

<?php  
	if ($data_user['ident_usua'] == 1) {
?>
<div class="container-fluid">
	<div class="card-deck">
	  <div class="card" align="center">
	  	<form method="post" enctype="multipart/form-data">
		    <div class="card-body">
		      <h5 class="card-title text-center"><b>Importación</b></h5>
		      <p class="card-subtitle text-center">Transferencia de Datos desde Archivos .TXT y .CSV</p>
		      <br>
		      <div class="col-lg-4" align="center">					
						<input type="file" class="filestyle" id="file" name="file" alt="Archvio de Importacion" data-btnClass="btn-primary" data-text="Subir" data-placeholder="Seleccione un Archivo..." accept=".csv,text/csv">
					</div>
		    </div>
		    <div class="card-footer" align="center">
					<button type="submit" name="import" class="btn btn-success"><i class="fa fa-file-import"></i> Importar Datos</button>	
	    	</div>
	    </form>
	  </div>		
	</div>
	<div class="container" align="center">
		<div class="row mt-4">
			<div class="col-md-12 m-auto">
				<?php
					$importResult   =  $importCtrl->index(); 						
				?>
			</div>
		</div>	
	</div>
</div>
<?php	
	}else{
		?>
		<div class="container-fluid">
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading"><b>Acceso Restringido</b></h4>
			  <p>Esta sección esta restringida para el Administrador del Sistema.</p>
			  <hr>
			  <p class="mb-0">Contactarse con el Administrador del Sistema para más información.</p>
			</div>
		</div>
	<?php
	}
?>

<?php require_once('../includes/admin_footer.php');  ?>

