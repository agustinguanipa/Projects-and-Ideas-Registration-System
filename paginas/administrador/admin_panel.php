<?php require_once('../includes/admin_header.php'); ?>

<!-- Contenido -->

<div class="container-fluid">
	<div class="card-deck">
		<div class="card" align="center">
    <div class="card-body index-background">
      <h4 class="card-title text-white"><b>FUNDACITE Táchira | Científicos e Innovadores Tecnológicos</b></h4>
      <p class="card-text text-white"><b>Bienvenido al Panel de Control</b></p>
      <a href="../../index.php" class="btn btn-light btn-lg"> <b>Ir al Inicio</b><i class="fa fa-home ml-2"></i></a>
    </div>
  </div>
	</div>
</div>
</br>
<div class="container-fluid">
	<div class="card-deck">
	  <div class="card">
	    <img class="card-img-top" src="../../imagen/adminpanel-1.png" alt="Admin Panel Usuarios">
	    <div class="card-body">
	      <h5 class="card-title text-center"><b>Científicos e Innovadores</b></h5>
	      <p class="card-text text-center">Administrar Usuarios Registrados</p>
	    </div>
	    <div class="card-footer" align="center">
      	<a href="admin_usuarios.php" class="btn btn-sm btn-primary">Ver Usuarios</a>
    	</div>
	  </div>
	  <div class="card">
	    <img class="card-img-top" src="../../imagen/adminpanel-2.png" alt="Admin Panel Proyectos">
	    <div class="card-body">
	      <h5 class="card-title text-center"><b>Proyectos</b></h5>
	      <p class="card-text text-center">Administrar Proyectos y Categorías</p>
	    </div>
	    <div class="card-footer" align="center">
	    	<a href="admin_proyectos.php" class="btn btn-sm btn-primary">Ver Proyectos</a>
	    	<a href="admin_categorias.php" class="btn btn-sm btn-primary">Ver Categorías</a>
    	</div>
	  </div>
	  <div class="card">
	    <img class="card-img-top" src="../../imagen/adminpanel-3.png" alt="Admin Panel Sistema">
	    <div class="card-body">
	      <h5 class="card-title text-center"><b>Sistema</b></h5>
	      <p class="card-text text-center">Administración de Usuarios, Soporte y Mantenimiento</p>
	    </div>
	    <div class="card-footer" align="center">
	    	<a href="admin_admins.php" class="btn btn-sm btn-primary">Ver Usuarios</a>
	    	<a href="admin_soporte.php" class="btn btn-sm btn-primary">Ver Soporte</a>
    	</div>
	  </div>
	</div>
</div>

<?php require_once('../includes/admin_footer.php');  ?>

