<?php

session_start();

require_once ("../../paginas/conexion_bd.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tab_usua";
	$tables2="tab_tipo";
	$campos="*";
	$on="tab_usua.ident_tipo = tab_tipo.ident_tipo";
	$sWhere=" (tab_usua.nombr_usua LIKE '%".$query."%' OR tab_usua.apeli_usua LIKE '%".$query."%') AND tab_usua.statu_usua = 1 AND tab_usua.ident_tipo != 3";
	$sWhere.=" order by tab_usua.ident_usua";
	
	// Paginacion
	
	include '../pagination.php';

	// Variables de la Paginación

	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); // Cuantos Registros para Mostrar
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Contador del Total de Registros en la Tabla
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//Query de los Datos
	$query = mysqli_query($con,"SELECT $campos FROM $tables INNER JOIN $tables2 ON $on where $sWhere LIMIT $offset,$per_page");
	//Loop del Query de los Datos
	
	if ($numrows>0){		
?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class='text-center'>#</th>
					<th class='text-center'>Cédula</th>
					<th class='text-center'>Nombres</th>
					<th class='text-center'>Apellidos</th>
					<th class='text-center'>Tipo</th>
					<th class='text-center'>Usuario</th>
					<th class='text-center'>Ver</th>
					<th class='text-center'>Editar</th>
					<th class='text-center'>Borrar</th>
				</tr>
			</thead>
			<tbody>	
					<?php
					$i = 0;
					$finales=0;
					while($row = mysqli_fetch_array($query)){
						$ident_admin=$row['ident_usua'];
						$cedul_usua=$row['cedul_usua'];
						$nombr_usua=$row['nombr_usua'];
						$apeli_usua=$row['apeli_usua'];
						$gener_usua=$row['gener_usua'];
						$civil_usua=$row['civil_usua'];
						$nivel_usua=$row['nivel_usua'];
						$telef_usua=$row['telef_usua'];
						$email_usua=$row['email_usua'];
						$image_usua=$row['image_usua'];
						$estad_usua=$row['estad_usua'];
						$munic_usua=$row['munic_usua'];
						$direc_usua=$row['direc_usua'];
						$usuar_usua=$row['usuar_usua'];
						$fecre_usua=$row['fecre_usua'];
						$ident_tipo=$row['ident_tipo'];
						$nombr_tipo=$row['nombr_tipo'];
						$i++;			
						$finales++;
					?>	
					<tr class="">
						<td class='text-center'><?php echo $i;?></td>
						<td class='text-center'><?php echo $cedul_usua;?></td>
						<td class='text-center'><?php echo $nombr_usua;?></td>
						<td class='text-center'><?php echo $apeli_usua;?></td>
						<td class='text-center'><?php echo $nombr_tipo;?></td>
						<td class='text-center'><?php echo $usuar_usua;?></td>
	          <td class='text-center'>
							<a href="javascript:void(0)" onclick="lookAdministrador('<?php echo $row['ident_usua']; ?>')"  class="look" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Ver"></i></a>
	          </td>
						<td class='text-center'>
							<?php  
								if ($ident_admin != 1 && $_SESSION['ident_tipo'] == 1) {
							?>
								<a href="#"  data-target="#editAdminModal" class="edit" data-toggle="modal" data-nombr_usua="<?php echo $nombr_usua?>" data-apeli_usua="<?php echo $apeli_usua?>" data-gener_usua="<?php echo $gener_usua?>" data-civil_usua="<?php echo $civil_usua?>" data-nivel_usua="<?php echo $nivel_usua?>" data-telef_usua="<?php echo $telef_usua?>" data-email_usua="<?php echo $email_usua?>" data-estad_usua="<?php echo $estad_usua?>" data-munic_usua="<?php echo $munic_usua?>" data-direc_usua="<?php echo $direc_usua?>" data-usuar_usua="<?php echo $usuar_usua?>" data-ident_usua="<?php echo $ident_admin; ?>"><i class="fa fa-edit" data-toggle="tooltip" title="Editar" ></i></a>
							<?php	
								}
							?>
	          </td>
	          <td class='text-center'>
	          	<?php  
								if ($ident_admin != 1 && $_SESSION['ident_tipo'] == 1) {
							?>
								<a href="#deleteAdminModal" class="delete" data-toggle="modal" data-ident_usua="<?php echo $ident_admin;?>"><i class="fa fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
							<?php	
								}
							?>
	          </td>
					</tr>
					<?php }?>
					<tr>
						<td colspan='11'> 
							<?php 
								$inicios=$offset+1;
								$finales+=$inicios -1;
								echo "Mostrando $inicios al $finales de $numrows registros";
								echo paginate( $page, $total_pages, $adjacents);
							?>
						</td>
					</tr>
			</tbody>			
		</table>
	</div>

	<div id="divModalLookAdministrador"></div>
    <script>
      function lookAdministrador(ident_usua) {
          var ruta = '../../paginas/administrador/modal_admin_ver.php?ident_usua=' + ident_usua;
          $.get(ruta, function (data) {
              $('#divModalLookAdministrador').html(data);
              $('#lookAdministradorModal').modal('show');
          });
      }
    </script>

	<?php	
	}	
}
?>          
		  
