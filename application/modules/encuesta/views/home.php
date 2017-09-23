<div id="page-wrapper">

	<br>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<a class="btn btn-warning" href=" <?php echo base_url().'encuesta/establecimiento/' . $information[0]['fk_id_manzana']; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-gears"></i> ENLACES DEL FORMULARIO
				</div>
				<div class="panel-body">
				
					<div class="row">
						<div class="col-lg-12">
						
							<div class="row" align="center">
								<div style="width:50%;" align="center">
									<div class="alert alert-warning">
										<strong>No. Formulario: </strong>
										<?php echo $information[0]['id_establecimiento']; ?>
										<br><strong>Razón social o nombre del propietario: </strong>
										<?php echo $information[0]['razon_social']; ?>
										<br><strong>Nombre comercial: </strong>
										<?php echo $information[0]['nombre_propietario']; ?>
									</div>
								</div>
							</div>	
						
						</div>
					</div>
				
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


					<div class="row">
						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_administrativos/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span> 1. Capítulo Aspectos Administrativos   
</a>
						</div>

						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_actividad_economica/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 2. Capítulo Características Generales de la Actividad Económica  
</a>
						</div>
					</div>
<br>					
					<div class="row">
						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_criticos/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> 3. Capítulo Aspectos Críticos del Establecimiento  
</a>
						</div>

						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_financiera/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 4. Capítulo Información Financiera del Establecimiento   
</a>
						</div>
					</div>
<br>
					<div class="row">
						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_servicios/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> 5. Capítulo Servicios de Apoyo Empresarial  
</a>
						</div>
						
						<div class="col-lg-6">	
<a href="<?php echo base_url(). 'encuesta/form_formalizacion/' . $idFormulario; ?>" class="btn btn-warning btn-block">
<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> 6. Capítulo Formalización Empresarial   
</a>
						</div>
					</div>

			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->

	
</div>
<!-- /.row -->
