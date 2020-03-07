<?php
	
	require_once ("../../paginas/conexion_bd.php");

  $tipce_usua = mysqli_real_escape_string($con,(strip_tags($_POST["tipce_usua"],ENT_QUOTES)));
	$cedul_usua = mysqli_real_escape_string($con,(strip_tags($_POST["cedul_usua"],ENT_QUOTES)));
  $nombr_usua = mysqli_real_escape_string($con,(strip_tags($_POST["nombr_usua"],ENT_QUOTES)));
  $apeli_usua = mysqli_real_escape_string($con,(strip_tags($_POST["apeli_usua"],ENT_QUOTES)));
  $gener_usua = mysqli_real_escape_string($con,(strip_tags($_POST["gener_usua"],ENT_QUOTES)));
  $civil_usua = mysqli_real_escape_string($con,(strip_tags($_POST["civil_usua"],ENT_QUOTES)));
  $nivel_usua = mysqli_real_escape_string($con,(strip_tags($_POST["nivel_usua"],ENT_QUOTES)));
  $telef_usua = mysqli_real_escape_string($con,(strip_tags($_POST["telef_usua"],ENT_QUOTES)));
  $email_usua = mysqli_real_escape_string($con,(strip_tags($_POST["email_usua"],ENT_QUOTES)));
  $image_usua = $_FILES['image_usua']['name'];
	$ruta1 = $_FILES['image_usua']['tmp_name'];
	$destino1 = "../../imagen/perfil/".$image_usua;
	move_uploaded_file($ruta1,$destino1);
	$estad_usua = mysqli_real_escape_string($con,(strip_tags($_POST["estad_usua"],ENT_QUOTES)));
	$munic_usua = mysqli_real_escape_string($con,(strip_tags($_POST["munic_usua"],ENT_QUOTES)));
	$direc_usua = mysqli_real_escape_string($con,(strip_tags($_POST["direc_usua"],ENT_QUOTES)));
  $usuar_usua = mysqli_real_escape_string($con,(strip_tags($_POST["usuar_usua"],ENT_QUOTES)));
  $contr_usua = md5(mysqli_real_escape_string($con,(strip_tags($_POST["contr_usua"],ENT_QUOTES))));
	$statu_usua = 1;
	$ident_tipo = 3;

	if ($image_usua == '')
	{
		$destino1 = "../../imagen/perfil/user.png";
	}
	
    $sql = "INSERT INTO tab_usua(tipce_usua, cedul_usua, nombr_usua, apeli_usua, gener_usua, civil_usua, nivel_usua, telef_usua, email_usua, image_usua, estad_usua, munic_usua, direc_usua, usuar_usua, contr_usua, statu_usua, ident_tipo) VALUES ('$tipce_usua','$cedul_usua','$nombr_usua','$apeli_usua','$gener_usua','$civil_usua','$nivel_usua','$telef_usua','$email_usua','$destino1','$estad_usua','$munic_usua','$direc_usua','$usuar_usua','$contr_usua','$statu_usua','$ident_tipo')";
    
    $query = mysqli_query($con,$sql);
   
    if ($query) {
        $messages[] = "El Usuario ha sido registrado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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