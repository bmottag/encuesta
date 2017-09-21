<script type="text/javascript" src="<?php echo base_url("assets/js/validate/incidences/near_miss.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-ambulance fa-fw"></i>	Servicios de Apoyo Empresarial														
					</h4>
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->				
	</div>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-ambulance"></i> Formulario Servicios de Apoyo Empresarial							
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

<p class="text-danger text-left">Los campos con * son obligatorios.</p>								
								
						<div class="form-group">
							<label class="col-sm-4 control-label" for="visible">Pensando en su experiencia personal, cual fue el principal motivó a crear esta empresa? *</label>
							<div class="col-sm-5">
								<select name="visible" id="visible" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["visible"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["visible"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information[0]["visible"] == 3) { echo "selected"; }  ?>>Si</option>
									<option value=4 <?php if($information[0]["visible"] == 4) { echo "selected"; }  ?>>No</option>
									<option value=5 <?php if($information[0]["visible"] == 5) { echo "selected"; }  ?>>Si</option>
									<option value=6 <?php if($information[0]["visible"] == 6) { echo "selected"; }  ?>>No</option>
									<option value=7 <?php if($information[0]["visible"] == 7) { echo "selected"; }  ?>>Si</option>
									<option value=8 <?php if($information[0]["visible"] == 8) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Cuáles de los siguientes servicios de apoyo empresarial considera necesarios para fortalecer su actividad? *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["aviso"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information[0]["aviso"] == 3) { echo "selected"; }  ?>>Si</option>
									<option value=4 <?php if($information[0]["aviso"] == 4) { echo "selected"; }  ?>>No</option>
									<option value=5 <?php if($information[0]["aviso"] == 5) { echo "selected"; }  ?>>Si</option>
									<option value=6 <?php if($information[0]["aviso"] == 6) { echo "selected"; }  ?>>No</option>
									<option value=7 <?php if($information[0]["aviso"] == 7) { echo "selected"; }  ?>>Si</option>
									<option value=8 <?php if($information[0]["aviso"] == 8) { echo "selected"; }  ?>>No</option>
									<option value=9 <?php if($information[0]["aviso"] == 9) { echo "selected"; }  ?>>Si</option>
									<option value=10 <?php if($information[0]["aviso"] == 10) { echo "selected"; }  ?>>No</option>
									<option value=11 <?php if($information[0]["aviso"] == 11) { echo "selected"; }  ?>>Si</option>
									<option value=12 <?php if($information[0]["aviso"] == 12) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						

				</div>
			</div>
		</div>
	</div>								
								
				
								

						<div class="form-group">
							<div class="row" align="center">
								<div style="width:100%;" align="center">
									<input type="button" id="btnSubmit" name="btnSubmit" value="Guardar" class="btn btn-primary"/>
								</div>
							</div>
						</div>

								

								
						<div class="form-group">
							<div class="row" align="center">
								<div style="width:80%;" align="center">
									<div id="div_load" style="display:none">		
										<div class="progress progress-striped active">
											<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
												<span class="sr-only">45% completado</span>
											</div>
										</div>
									</div>
									<div id="div_error" style="display:none">			
										<div class="alert alert-danger"><span class="glyphicon glyphicon-remove" id="span_msj">&nbsp;</span></div>
									</div>
								</div>
							</div>
						</div>								

	
</form>

</div>
<!-- /#page-wrapper -->