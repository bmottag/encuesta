<script>
$(function(){ 
	$(".btn-success").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + 'encuesta/cargarModalEstablecimiento',
                data: {'idManzana': oID, 'idEstablecimiento': 'x'},
                cache: false,
                success: function (data) {
                    $('#tablaDatos').html(data);
                }
            });
	});
	
	$(".btn-info").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + 'encuesta/cargarModalEstablecimiento',
                data: {'idManzana': '', 'idEstablecimiento': oID},
                cache: false,
                success: function (data) {
                    $('#tablaDatos').html(data);
                }
            });
	});
	
});
</script>


<div id="page-wrapper">
	<br>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<a class="btn btn-success" href=" <?php echo base_url().'encuesta/manzana/'; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-users"></i> LISTA DE ESTABLECIMIENTO Y PROPIETARIO
				</div>
				<div class="panel-body">
				
					<div class="row">
						<div class="col-lg-12">
						
							<div class="row" align="center">
								<div style="width:50%;" align="center">
									<div class="alert alert-success">
										<strong>Comuna: </strong>
										<?php echo $infoManzana[0]['fk_id_comuna']; ?>
										 - <strong>Sector: </strong>
										<?php echo $infoManzana[0]['fk_id_sector']; ?>
										<br><strong>Sección: </strong>
										<?php echo $infoManzana[0]['fk_id_seccion']; ?>
										- <strong>Manzana: </strong>
										<?php echo $infoManzana[0]['fk_id_manzana']; ?>
										<br><strong>Barrio: </strong>
										<?php echo $infoManzana[0]['barrio']; ?>
									</div>
								</div>
							</div>	
						
						</div>
					</div>
				
					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal" id="<?php echo $infoManzana[0]['id_manzana']; ?>">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar identificación del Establecimiento y Propietario
					</button><br>
<?php
$retornoExito = $this->session->flashdata('retornoExito');
if ($retornoExito) {
    ?>
	<div class="col-lg-12">	
		<div class="alert alert-success ">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php echo $retornoExito ?>		
		</div>
	</div>
    <?php
}

$retornoError = $this->session->flashdata('retornoError');
if ($retornoError) {
    ?>
	<div class="col-lg-12">	
		<div class="alert alert-danger ">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<?php echo $retornoError ?>
		</div>
	</div>
    <?php
}
?> 
				<?php
					if($info){
				?>				
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th class="text-center">No. formulario</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Razón social o nombre del propietario</th>
								<th class="text-center">Nombre comercial</th>
								<th class="text-center">Dirección del establecimiento</th>
								<th class="text-center">Teléfono y/o celular del establecimiento</th>
								<th class="text-center">Tipo Documento</th>
								<th class="text-center">No. Documento</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($info as $lista):
									echo "<tr>";
									echo "<td class='text-right'>" . $lista['id_establecimiento'] . "</td>";
									echo "<td class='text-center'>";
						?>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" id="<?php echo $lista['id_establecimiento']; ?>" >
										Editar <span class="glyphicon glyphicon-edit" aria-hidden="true">
									</button>

<a href="<?php echo base_url("encuesta/form_home/" . $lista['id_establecimiento']); ?>" class="btn btn-warning btn-xs">
Encuesta  
</a>
						<?php
									echo "</td>";
									echo "<td>" . $lista['razon_social'] . "</td>";
									echo "<td class='text-center'>" . $lista['nombre_propietario'] . "</td>";
									echo "<td class='text-center'>" . $lista['direccion'] . "</td>";
									echo "<td class='text-center'>" . $lista['telefono'] . "</td>";
									echo "<td>";

									switch ($lista['tipo_documento']) {
										case 1:
											echo "NIT/RUT";
											break;
										case 2:
											echo "Cédula de ciudadanía C.C.";
											break;
										case 3:
											echo "Cédula de extranjería C.E.";
											break;
										case 4:
											echo "No tiene";
											break;
										case 5:
											echo "NS/NR";
											break;
									}
									
									echo "</td>";
									echo "<td>" . $lista['cedula'] . "</td>";
									echo "</tr>";
							endforeach;
						?>
						</tbody>
					</table>
				<?php } ?>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
		
				
<!--INICIO Modal para adicionar HAZARDS -->
<div class="modal fade text-center" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">    
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="tablaDatos">

		</div>
	</div>
</div>                       
<!--FIN Modal para adicionar HAZARDS -->

<!-- Tables -->
<script>
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true,
		"order": [[ 0, "asc" ]],
		"pageLength": 25
	});
});
</script>