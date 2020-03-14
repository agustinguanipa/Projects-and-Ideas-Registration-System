<?php
	
	session_start();

	require_once ("../../paginas/conexion_bd.php");

  $nombr_proy = mysqli_real_escape_string($con,(strip_tags($_POST["nombr_proy"],ENT_QUOTES)));
	$desco_proy = mysqli_real_escape_string($con,(strip_tags($_POST["desco_proy"],ENT_QUOTES)));
  $descr_proy = mysqli_real_escape_string($con,(strip_tags($_POST["descr_proy"],ENT_QUOTES)));
  $areaa_proy = mysqli_real_escape_string($con,(strip_tags($_POST["areaa_proy"],ENT_QUOTES)));
  $motor_proy = mysqli_real_escape_string($con,(strip_tags($_POST["motor_proy"],ENT_QUOTES)));
	$statu_proy = 1;
	$ident_usua = $_SESSION['ident_usua'];
   $sql = "INSERT INTO tab_proy(nombr_proy, desco_proy, descr_proy, areaa_proy, motor_proy, statu_proy, ident_usua) VALUES ('$nombr_proy','$desco_proy','$descr_proy','$areaa_proy','$motor_proy','$statu_proy','$ident_usua')";
    
    $query = mysqli_query($con,$sql);
   
    if ($query) {
        $messages[] = "El Proyecto ha sido registrado con éxito.";
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