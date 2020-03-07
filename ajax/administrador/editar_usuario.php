<?php
session_start();

include_once '../../paginas/conexion_bd.php';

	$ident_usua = $_SESSION["ident_usua"];
  $ident_tipo = $_SESSION["ident_tipo"];
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
  

  if ($image_usua == '') {
     $sql = "UPDATE tab_usua SET nombr_usua='$nombr_usua', apeli_usua='$apeli_usua', gener_usua='$gener_usua', civil_usua='$civil_usua', nivel_usua='$nivel_usua', telef_usua='$telef_usua', email_usua='$email_usua', estad_usua='$estad_usua', munic_usua='$munic_usua', direc_usua='$direc_usua' WHERE ident_usua='$ident_usua'";
  }else
    $sql = "UPDATE tab_usua SET nombr_usua='$nombr_usua', apeli_usua='$apeli_usua', gener_usua='$gener_usua', civil_usua='$civil_usua', nivel_usua='$nivel_usua', telef_usua='$telef_usua', email_usua='$email_usua', image_usua='$destino1', estad_usua='$estad_usua', munic_usua='$munic_usua', direc_usua='$direc_usua' WHERE ident_usua='$ident_usua'";

    $query = mysqli_query($con,$sql);

    $_SESSION['message'] = '<b>¡Bien Hecho!</b> El Usuario ha sido Actualizado con Éxito';
  
	if ($ident_tipo == 3) {
    header('location: ../../paginas/usuario/usuario_configuracion.php');
  }else
    header('location: ../../paginas/administrador/admin_cuenta.php');
?>