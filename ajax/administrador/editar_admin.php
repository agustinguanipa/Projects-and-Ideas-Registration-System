<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){

	require_once ("../../paginas/conexion_bd.php");
	
  $nombr_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombr_usua"],ENT_QUOTES)));
  $apeli_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_apeli_usua"],ENT_QUOTES)));
  $gener_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_gener_usua"],ENT_QUOTES)));
  $civil_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_civil_usua"],ENT_QUOTES)));
  $nivel_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nivel_usua"],ENT_QUOTES)));
  $telef_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_telef_usua"],ENT_QUOTES)));
  $email_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_email_usua"],ENT_QUOTES)));
	$estad_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_estad_usua"],ENT_QUOTES)));
	$munic_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_munic_usua"],ENT_QUOTES)));
	$direc_usua = mysqli_real_escape_string($con,(strip_tags($_POST["edit_direc_usua"],ENT_QUOTES)));
	$ident_usua=intval($_POST['edit_id']);

    $sql = "UPDATE tab_usua SET nombr_usua='".$nombr_usua."', apeli_usua='".$apeli_usua."', gener_usua='".$gener_usua."', civil_usua='".$civil_usua."', nivel_usua='".$nivel_usua."', telef_usua='".$telef_usua."', email_usua='".$email_usua."', estad_usua='".$estad_usua."', munic_usua='".$munic_usua."', direc_usua='".$direc_usua."' WHERE ident_usua='".$ident_usua."' ";
    $query = mysqli_query($con,$sql);
    
    if ($query) {
        $messages[] = "El Usuario ha sido actualizado con éxito.";
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