<?php

	echo " <script src='../../libs/bootbox/bootbox.min.js'></script>
    <script src='../../libs/bootbox/bootbox.locales.min.js'></script>";
	
	session_start();

	require_once ("../conexion_bd.php");

	// Try and connect using the info above.

	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

	// Now we check if the data from the login form was submitted, isset() will check if the data exists.
	if ( !isset($_POST['usuar_usua'], $_POST['contr_usua']) ) {
		// Could not get the data that should have been sent.
		die ('Please fill both the username and password field!');
	}

	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	if ($stmt = $con->prepare('SELECT u.ident_usua, u.contr_usua, u.nombr_usua, u.apeli_usua, u.gener_usua, u.telef_usua, u.email_usua, u.image_usua, u.statu_usua, u.ident_tipo, r.ident_tipo, r.nombr_tipo FROM tab_usua u INNER JOIN tab_tipo r ON u.ident_tipo = r.ident_tipo WHERE u.usuar_usua = ? AND u.statu_usua  = 1')) {
		// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
		$stmt->bind_param('s', $_POST['usuar_usua']);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
	}

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($ident_usua, $contr_usua, $nombr_usua, $apeli_usua, $gener_usua, $telef_usua, $email_usua, $image_usua, $statu_usua, $ident_tipo, $ident_tipo, $nombr_tipo);
		$stmt->fetch();
		// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
		if (md5($_POST['contr_usua']) === $contr_usua) {
			// Verification success! User has loggedin!
			// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedInUsuario'] = TRUE;
			$_SESSION['nombr'] = $nombr_usua;
			$_SESSION['apeli'] = $apeli_usua;
			$_SESSION['gener'] = $gener_usua;
			$_SESSION['telef'] = $telef_usua;
			$_SESSION['email'] = $email_usua;
			$_SESSION['imagen'] = $image_usua;
			$_SESSION['user'] = $_POST['usuar_usua'];
			$_SESSION['statu_usua'] = $statu_usua;
			$_SESSION['ident_usua'] = $ident_usua;
			$_SESSION['ident_tipo'] = $ident_tipo;
			$_SESSION['ident_tipo'] = $ident_tipo;
			$_SESSION['nombr_tipo'] = $nombr_tipo;

		 if ($_SESSION['ident_tipo'] == 1 || $_SESSION['ident_tipo'] == 2) {
        header('location: ../administrador/admin_panel.php');
      }else{
        header('location: ../usuario/usuario_cuenta.php');
      }

		} else {
			$_SESSION['message'] = '<b>¡Ocurrió un Error!</b> El Usuario y/o la Contraseña ingresados son incorrectos';
			header('location: ../sesion/usuario_inicio.php');
		}
	} else {
		$_SESSION['message'] = '<b>¡Ocurrió un Error!</b> El Usuario y/o la Contraseña ingresados son incorrectos';
		header('location: ../sesion/usuario_inicio.php');
	}
	$stmt->close();

?>