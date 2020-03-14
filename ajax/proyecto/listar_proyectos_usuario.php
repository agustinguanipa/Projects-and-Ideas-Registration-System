<?php

session_start();

require_once ("../../paginas/conexion_bd.php");

$ident_usua = $_SESSION['ident_usua'];

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tab_proy";
	$tables2="tab_usua";
	$campos="*";
	$on="tab_proy.ident_usua = tab_usua.ident_usua";
	$rWhere=" tab_proy.ident_usua = $ident_usua";
	$sWhere=" (tab_proy.nombr_proy LIKE '%".$query."%' OR tab_proy.descr_proy LIKE '%".$query."%') AND tab_proy.statu_proy = 1";
	$sWhere.=" order by tab_proy.ident_proy";
	
	// Paginacion
	
	include '../pagination.php';

	// Variables de la Paginación

	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); // Cuantos Registros para Mostrar
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Contador del Total de Registros en la Tabla
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables WHERE $rWhere AND $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//Query de los Datos
	$query = mysqli_query($con,"SELECT $campos FROM $tables INNER JOIN $tables2 ON $on WHERE $rWhere AND $sWhere LIMIT $offset,$per_page");
	//Loop del Query de los Datos
	
	if ($numrows>0){		
?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class='text-center'>#</th>
					<th class='text-center'>Nombre</th>
					<th class='text-center'>Área</th>
					<th class='text-center'>Motor</th>
					<th class='text-center'>Fecha de Publicación</th>
					<th class='text-center'>Ver</th>
					<th class='text-center'>Editar</th>
					<th class='text-center'>Borrar</th>
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
						<td class='text-center'><?php echo $areaa_proy;?></td>
						<td class='text-center'><?php echo $motor_proy;?></td>
						<td class='text-center'><?php echo $fecre_proy;?></td>
	          <td class='text-center'>
							<a href="javascript:void(0)" onclick="lookProyecto('<?php echo $row['ident_proy']; ?>')"  class="look" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Ver"></i></a>
	          </td>
						<td class='text-center'>
							<a href="#"  data-target="#editProyectoUsuarioModal" class="edit" data-toggle="modal" data-nombr_proy="<?php echo $nombr_proy?>" data-desco_proy="<?php echo $desco_proy?>" data-descr_proy="<?php echo $descr_proy?>" data-areaa_proy="<?php echo $areaa_proy?>" data-motor_proy="<?php echo $motor_proy?>" data-ident_usua="<?php echo $ident_usua?>" data-ident_proy="<?php echo $ident_proyecto; ?>"><i class="fa fa-edit" data-toggle="tooltip" title="Editar" ></i></a>
	          </td>
	          <td class='text-center'>
							<a href="#deleteProyectoUsuarioModal" class="delete" data-toggle="modal" data-ident_proy="<?php echo $ident_proyecto;?>"><i class="fa fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
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

	<div id="divModalLookProyecto"></div>
    <script>
      function lookProyecto(ident_proy) {
          var ruta = '../../paginas/administrador/modal_proyecto_ver.php?ident_proy=' + ident_proy;
          $.get(ruta, function (data) {
              $('#divModalLookProyecto').html(data);
              $('#lookProyectoModal').modal('show');
          });
      }
    </script>

	<?php	
	}	
}
?>          
		  
