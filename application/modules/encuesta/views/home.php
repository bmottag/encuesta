<div id="page-wrapper">

	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
						<i class="fa fa-gear fa-fw"></i> FORMULARIO
					</h4>
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->				
	</div>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-gears"></i> ENLACES DEL FORMULARIO
				</div>
				<div class="panel-body">
				
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
						<div class="col-lg-4">	
							<div class="alert alert-danger">
								<strong>Aspectos administrativos</strong> 
								<br><br>
								
<a class="btn btn-danger btn-xs" href=" <?php echo base_url(). 'encuesta/form_administrativos/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
						
							</div>
						</div>

						<div class="col-lg-4">	
							<div class="alert alert-warning">
								<strong>Características Generales de la Actividad Económica</strong>
								<br><br>

<a class="btn btn-warning btn-xs" href=" <?php echo base_url(). 'encuesta/form_actividad_economica/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
								
							</div>
						</div>
						
						<div class="col-lg-4">	
							<div class="alert alert-info">
								<strong>Problemas y Necesidades del Establecimiento</strong>
								
								<br><br>
								
<a class="btn btn-info btn-xs" href=" <?php echo base_url(). 'encuesta/form_necesidades/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
								
							</div>
						</div>
						
						<div class="col-lg-4">	
							<div class="alert alert-success">
								<strong>Información Financiera del Establecimiento </strong>
								
								<br><br>
								
<a class="btn btn-success btn-xs" href=" <?php echo base_url(). 'encuesta/form_financiera/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
					
							</div>
						</div>
						
						
						<div class="col-lg-4">	
							<div class="alert alert-success">
								<strong>Servicios de Apoyo Empresarial </strong>
								
								<br><br>
								
<a class="btn btn-success btn-xs" href=" <?php echo base_url(). 'encuesta/form_servicios/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
														
							</div>
						</div>


						<div class="col-lg-4">	
							<div class="alert alert-success">
								<strong>Formalización Empresarial </strong>
								
								<br><br>

<a class="btn btn-success btn-xs" href=" <?php echo base_url(). 'encuesta/form_formalizacion/' . $idFormulario; ?> ">
Ir <span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
								
							</div>
						</div>
						


							
						
					</div>
					
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
	
	

	
	
	
	
	
</div>
<!-- /.row -->
