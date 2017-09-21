<script type="text/javascript" src="<?php echo base_url("assets/js/validate/incidences/near_miss.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-ambulance fa-fw"></i>	Aspectos críticos del Establecimiento 														
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
					<i class="fa fa-ambulance"></i> Formulario Aspectos críticos del Establecimiento 							
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
							<label class="col-sm-4 control-label" for="tiempo">En el último año, este establecimiento tuvo inconvenientes o dificultades en: *</label>
							<div class="col-sm-5">
								<select name="tiempo" id="tiempo" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["tiempo"] == 1) { echo "selected"; }  ?>>Menos de 6 meses</option>
									<option value=2 <?php if($information[0]["tiempo"] == 2) { echo "selected"; }  ?>>Entre 6 meses y  12 meses</option>
									<option value=3 <?php if($information[0]["tiempo"] == 3) { echo "selected"; }  ?>>Entre 1 año y 3 años</option>
									<option value=4 <?php if($information[0]["tiempo"] == 4) { echo "selected"; }  ?>>Entre 3 años y  5 años</option>
									<option value=5 <?php if($information[0]["tiempo"] == 5) { echo "selected"; }  ?>>Entre 5 años y  10 años</option>
									<option value=6 <?php if($information[0]["tiempo"] == 6) { echo "selected"; }  ?>>10 años y más</option>
									<option value=7 <?php if($information[0]["tiempo"] == 7) { echo "selected"; }  ?>>Entre 3 años y  5 años</option>
									<option value=8 <?php if($information[0]["tiempo"] == 8) { echo "selected"; }  ?>>Entre 5 años y  10 años</option>
									<option value=9 <?php if($information[0]["tiempo"] == 9) { echo "selected"; }  ?>>10 años y más</option>
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