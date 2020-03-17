<?php

	class ImportController {
		// getting conection in constructor
		function __construct($con) {
			$this->con 		 =		 $con;
		}

		// function for reading csv file
		public function index() {
        	$fileName         =        "";
        	// if there is any file
	        if(isset($_FILES['file'])){
	        	// reading tmp_file name
	    		$fileName = $_FILES["file"]["tmp_name"];
	        }

					$counter1 = 0;	 
					$counter2 = 0;	 

			// if file size is not empty
	        if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {   

		        $file1       =  fopen($fileName, "r");
		        $file2       =  fopen($fileName, "r");			        
		        
		      // Primera Tabla
			    fgetcsv($file1);  ?>
			    
					<h4><b>Resultado de la Importación</b></h4>
					<h5><b>Tabla 1</b></h5>
					<br>
			    <table class="table">
			    	<thead class="text-center">
			    		<th> # </th>
			    		<th> Cédula de Identidad </th>
			    		<th> Nombre </th>
			    		<th> Apellido </th>
			    		<th> Status </th>
			    	</thead>
			        
		        <?php 
		        	while (($column1 = fgetcsv($file1, 10000, ";")) !== FALSE) { 

			          $counter1++;	   
	        	 		$cedul_usua = $column1[0];
	        	 		$nombr_usua = $column1[1];
	        	 		$apeli_usua = $column1[2];
	        	 		$gener_usua = $column1[3];
	        	 		$civil_usua = $column1[4];
	              $nivel_usua = $column1[5];
	              $telef_usua = $column1[6];
	              $email_usua = $column1[7];
	              $image_usua = $column1[8];
	              $estad_usua = $column1[9];
	              $munic_usua = $column1[10];
	              $direc_usua = $column1[11];
	              $usuar_usua = $column1[12];
	              $contr_usua = $column1[13];
	              $statu_usua = $column1[14];
	              $ident_tipo = $column1[15];

              	$sql1 =	"INSERT INTO tab_usua (cedul_usua, nombr_usua, apeli_usua, gener_usua, civil_usua, nivel_usua, telef_usua, email_usua, image_usua, estad_usua, munic_usua, direc_usua, usuar_usua, contr_usua, statu_usua, ident_tipo) VALUES ('$cedul_usua', '$nombr_usua', '$apeli_usua', '$gener_usua', '$civil_usua', '$nivel_usua', '$telef_usua', '$email_usua', '$image_usua', '$estad_usua', '$munic_usua', '$direc_usua', '$usuar_usua', '$contr_usua', '$statu_usua', '$ident_tipo') ";
              	$result1 = $this->con->query($sql1);

              	if($result1 == 1): 
              ?>
              	
            		<tr class="text-center">
									<td> <?php echo $counter1; ?> </td>
									<td> <?php echo $cedul_usua; ?></td>
									<td> <?php echo $nombr_usua; ?> </td>
									<td> <?php echo $apeli_usua; ?> </td>
	     						<td> <?php echo "<label class='text-success'><i class='fa fa-check'></i> </label> ";?> </td>
								</tr>
              <?php endif;          	
					}
				?>
				</table>

					<!--- Segunda Tabla -->
					<?php fgetcsv($file2);  ?>
					<h5><b>Tabla 2</b></h5>
					<br>
			    <table class="table">
			    	<thead class="text-center">
			    		<th> # </th>
			    		<th> Proyecto </th>
			    		<th> Área </th>
			    		<th> Motor </th>
			    		<th> Status </th>
			    	</thead>

						<?php 
		        	while (($column2 = fgetcsv($file2, 10000, ";")) !== FALSE) { 

			          $counter2++;
	              $nombr_proy = $column2[16];
	              $desco_proy = $column2[17];
	              $descr_proy = $column2[18];
	              $areaa_proy = $column2[19];
	              $motor_proy = $column2[20];
	              $statu_proy = $column2[21];
	              $ident_usua = $column2[22];

              	$sql2 =	"INSERT INTO tab_proy (nombr_proy, desco_proy, descr_proy, areaa_proy, motor_proy, statu_proy, ident_usua) VALUES ('$nombr_proy', '$desco_proy', '$descr_proy', '$areaa_proy', '$motor_proy', '$statu_proy', '$ident_usua') ";
              	$result2 = $this->con->query($sql2);

              	if($result2 == 1): 
              ?>
              
            		<tr class="text-center">
									<td> <?php echo $counter2; ?> </td>
									<td> <?php echo $nombr_proy; ?></td>
									<td> <?php echo $areaa_proy; ?> </td>
									<td> <?php echo $motor_proy; ?> </td>
	     						<td> <?php echo "<label class='text-success'><i class='fa fa-check'></i> </label> ";?> </td>
								</tr>
              		
              	<?php endif;
              	$total_counter = $counter1 + $counter2;
              	
							}

						?>
					</table>
				<?php
				?>

				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<p><b>¡Importación Exitosa!</b> Se han importado un total de <b><?php echo $total_counter;?></b> registros.</p>
				</div>
			<?php
				
			}
		else if(!isset($_FILES["file"]) && $_FILES["file"]["size"] < 0){
			echo '<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<p><b>¡Importación Exitosa!</b> Se han importado un total de <b><?php echo $total_counter;?></b> registros.</p>
						</div>';
		}
	}	
}

?>