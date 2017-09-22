<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_formalizacion.js"); ?>"></script>

<div id="page-wrapper">
	<br>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	<input type="hidden" id="hddIdFormFormalizacion" name="hddIdFormFormalizacion" value="<?php echo $idFormFormalizacion; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-tasks"></i> Formulario Formalización Empresarial
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
							<label class="col-sm-4 control-label" for="visible">¿Tiene interés en formalizar su establecimiento? *</label>
							<div class="col-sm-5">
								<select name="visible" id="visible" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["visible"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["visible"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Cuál es el principal motivo por el que no ha formalizado su establecimiento? *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["aviso"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information["aviso"] == 3) { echo "selected"; }  ?>>Si</option>
									<option value=4 <?php if($information["aviso"] == 4) { echo "selected"; }  ?>>No</option>
									<option value=5 <?php if($information["aviso"] == 5) { echo "selected"; }  ?>>Si</option>
									<option value=6 <?php if($information["aviso"] == 6) { echo "selected"; }  ?>>No</option>
									<option value=7 <?php if($information["aviso"] == 7) { echo "selected"; }  ?>>Si</option>
									<option value=8 <?php if($information["aviso"] == 8) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Cuáles de los siguientes beneficios o incentivos motivarían la formalización de los establecimientos? *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["aviso"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information["aviso"] == 3) { echo "selected"; }  ?>>Si</option>
									<option value=4 <?php if($information["aviso"] == 4) { echo "selected"; }  ?>>No</option>
									<option value=5 <?php if($information["aviso"] == 5) { echo "selected"; }  ?>>Si</option>
									<option value=6 <?php if($information["aviso"] == 6) { echo "selected"; }  ?>>No</option>
									<option value=7 <?php if($information["aviso"] == 7) { echo "selected"; }  ?>>Si</option>
									<option value=8 <?php if($information["aviso"] == 8) { echo "selected"; }  ?>>No</option>
									<option value=9 <?php if($information["aviso"] == 9) { echo "selected"; }  ?>>Si</option>
									<option value=10 <?php if($information["aviso"] == 10) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">Conoce las normas en materia de: *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["aviso"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information["aviso"] == 3) { echo "selected"; }  ?>>Si</option>
									<option value=4 <?php if($information["aviso"] == 4) { echo "selected"; }  ?>>No</option>
									<option value=5 <?php if($information["aviso"] == 5) { echo "selected"; }  ?>>Si</option>
									<option value=6 <?php if($information["aviso"] == 6) { echo "selected"; }  ?>>No</option>
									<option value=7 <?php if($information["aviso"] == 7) { echo "selected"; }  ?>>Si</option>
									<option value=8 <?php if($information["aviso"] == 8) { echo "selected"; }  ?>>No</option>
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