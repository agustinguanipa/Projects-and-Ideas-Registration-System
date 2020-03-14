<?php

require_once ("../../paginas/conexion_bd.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tab_proy";
	$tables2="tab_usua";
	$campos="*";
	$on="tab_proy.ident_usua = tab_usua.ident_usua";
	$sWhere=" (tab_proy.nombr_proy LIKE '%".$query."%' OR tab_proy.descr_proy LIKE '%".$query."%') AND tab_proy.statu_proy = 0";
	$sWhere.=" order by tab_proy.ident_proy";
	
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
					<th class='text-center'>Nombre</th>
					<th class='text-center'>Innovador</th>
					<th class='text-center'>Área</th>
					<th class='text-center'>Motor</th>
					<th class='text-center'>Fecha de Publicación</th>
					<th class='text-center'>Restaurar</th>
				</tr>
			</thead>
			<tbody>	
					<?php
					$i=0;
					$finales=0;
					while($row = mysqli_fetch_array($query)){	
						$ident_proyecto=$row['ident_proy'];
						$nombr_proy=$row['nombr_proy'];
						$desco_proy=$row['desco_proy'];
						$descr_proy=$row['descr_proy'];
						$areaa_proy=$row['areaa_proy'];
						$motor_proy=$row['motor_proy'];
						$apeli_proy=$row['apeli_proy'];
						$fecre_proy=$row['fecre_proy'];
						$nombr_usua=$row['nombr_usua'];
						$apeli_usua=$row['apeli_usua'];
						$i++;		
						$finales++;
					?>	
					<tr class="">
						<td class='text-center'><?php echo $i;?></td>
						<td class='text-center'><?php echo $nombr_proy;?></td>
						<td class='text-center'><?php echo $nombr_usua;?> <?php echo $apeli_usua;?></td>
						<td class='text-center'><?php echo $areaa_proy;?></td>
						<td class='text-center'><?php echo $motor_proy;?></td>
						<td class='text-center'><?php echo $fecre_proy;?></td>
	          <td class='text-center'>
							<a href="#restaurarProyectoAdminModal" class="restaurar" data-toggle="modal" data-ident_proy="<?php echo $ident_proyecto;?>"><i class="fa fa-check" data-toggle="tooltip" title="Restaurar"></i></a>
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
	<?php	
	}	
}
?>          
		  
