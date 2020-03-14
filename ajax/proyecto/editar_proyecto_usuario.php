<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){

	require_once ("../../paginas/conexion_bd.php");
	
  $nombr_proy = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombr_proy"],ENT_QUOTES)));
	$desco_proy = mysqli_real_escape_string($con,(strip_tags($_POST["edit_desco_proy"],ENT_QUOTES)));
  $descr_proy = mysqli_real_escape_string($con,(strip_tags($_POST["edit_descr_proy"],ENT_QUOTES)));
  $areaa_proy = mysqli_real_escape_string($con,(strip_tags($_POST["edit_areaa_proy"],ENT_QUOTES)));
  $motor_proy = mysqli_real_escape_string($con,(strip_tags($_POST["edit_motor_proy"],ENT_QUOTES)));
	$ident_proy=intval($_POST['edit_id']);

    $sql = "UPDATE tab_proy SET nombr_proy='".$nombr_proy."', desco_proy='".$desco_proy."', descr_proy='".$descr_proy."', areaa_proy='".$areaa_proy."', motor_proy='".$motor_proy."' WHERE ident_proy='".$ident_proy."' ";
    $query = mysqli_query($con,$sql);
    
    if ($query) {
        $messages[] = "El Proyecto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){		
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
				foreach ($errors as $error) {
						echo $error;
					}
				?>
	</div>
	<?php
	}
	if (isset($messages)){
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					foreach ($messages as $message) {
							echo $message;
						}
					?>
		</div>
		<script type="text/javascript">
			$(".alert").delay(2000).slideUp(200, function() {
      $(this).alert('close');
    });
		</script>
		<?php
	}
?>			