<?php

require_once ("../../paginas/conexion_bd.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tab_usua";
	$campos="*";
	$sWhere=" (tab_usua.cedul_usua LIKE '%".$query."%' OR tab_usua.nombr_usua LIKE '%".$query."%' OR tab_usua.apeli_usua LIKE '%".$query."%') AND tab_usua.statu_usua = 0 AND tab_usua.ident_tipo = 3";
	$sWhere.=" order by tab_usua.ident_usua";
	
	// Paginacion

	include '../pagination.php';

	//Variables de la Paginación

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
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
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
					<th class='text-center'>Telefono</th>
					<th class='text-center'>E-Mail</th>
					<th class='text-center'>Usuario</th>
					<th class='text-center'>Restaurar</th>
				</tr>
			</thead>
			<tbody>	
					<?php
					$i=0;
					$finales=0;
					while($row = mysqli_fetch_array($query)){	
						$ident_usuario=$row['ident_usua'];
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
						$i++;			
						$finales++;
					?>	
					<tr class="">
						<td class='text-center'><?php echo $i;?></td>
						<td class='text-center'><?php echo $cedul_usua;?></td>
						<td class='text-center'><?php echo $nombr_usua;?></td>
						<td class='text-center'><?php echo $apeli_usua;?></td>
						<td class='text-center'><?php echo $telef_usua;?></td>
						<td class='text-center'><?php echo $email_usua;?></td>
						<td class='text-center'><?php echo $usuar_usua;?></td>
           	<td class='text-center'>
							<a href="#restaurarUsuarioModal" class="restaurar" data-toggle="modal" data-ident_usua="<?php echo $ident_usuario;?>"><i class="fa fa-check" data-toggle="tooltip" title="Restaurar"></i></a>
           	</td>
					</tr>
					<?php }?>
					<tr>
						<td colspan='9'> 
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
	<?php	
	}	
}
?>          
		  
