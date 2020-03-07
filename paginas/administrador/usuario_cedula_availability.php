<?php
  include_once("../conexion_bd.php");

  $cedul_usua = urldecode($_POST['cedul_usua']);
  $result = mysqli_query($con, "SELECT * FROM tab_usua WHERE cedul_usua = '$cedul_usua' LIMIT 1;");
  $num = mysqli_num_rows($result);

  if($num == 0){
      echo "true";
  } else {
      echo "false";
  }
  mysqli_close($con);
?>