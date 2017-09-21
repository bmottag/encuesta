
<script>
$(function(){ 
	$(".btn-success").click(function () {	
			var oID = $(this).attr("id");
            $.ajax ({
                type: 'POST',
				url: base_url + 'encuesta/cargarModalManzana',
                data: {'identificador': oID},
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-bullseye"></i> LISTA MANZANAS
				</div>
				<div class="panel-body">
					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal" id="x">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Manzana
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
								<th class="text-center">Sector</th>
								<th class="text-center">Sección</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Manzana</th>
								<th class="text-center">Comuna</th>
								<th class="text-center">Barrio</th>
								<th class="text-center">Establecimientos</th>
							</tr>
						</thead>
						<tbody>							
						<?php
							foreach ($info as $lista):
									echo "<tr>";
									echo "<td>" . $lista['fk_id_sector'] . "</td>";
									echo "<td>" . $lista['fk_id_seccion'] . "</td>";
									echo "<td class='text-center'>";
						?>
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" id="<?php echo $lista['id_manzana']; ?>" >
										Editar <span class="glyphicon glyphicon-edit" aria-hidden="true">
									</button>									
						<?php
									echo "</td>";
									echo "<td class='text-center'>" . $lista['fk_id_manzana'] . "</td>";
									echo "<td class='text-center'>" . $lista['fk_id_comuna'] . "</td>";
									echo "<td class='text-center'>" . $lista['barrio'] . "</td>";

						?>
						
						
						
						
						
						
									<td class='text-center'>
									
<?php 
//busco si la manzana tiene asicionada establecimientos
$ci = &get_instance();
$ci->load->model("general_model");

$arrParam = array("idManzana" => $lista["id_manzana"]);
$conteoEstablecimiento = $this->general_model->countEstablecimientos($arrParam);
?>
									
<a href="<?php echo base_url("encuesta/establecimiento/" . $lista['id_manzana']); ?>" class="btn btn-primary btn-xs">
Establecimiento  <span class="badge"><?php echo $conteoEstablecimiento; ?></span>
</a>

									</td>
						
						

						<?php
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
		"pageLength": 25
	});
});
</script>