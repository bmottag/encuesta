<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_servicios.js"); ?>"></script>

<div id="page-wrapper">
	<br>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	<input type="hidden" id="hddIdFormServicios" name="hddIdFormServicios" value="<?php echo $idFormServicios; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-inbox"></i> Formulario Servicios de Apoyo Empresarial							
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
							<label class="col-sm-4 control-label" for="motivo">Pensando en su experiencia personal, cual fue el principal motivó a crear esta empresa? *</label>
							<div class="col-sm-5">
								<select name="motivo" id="motivo" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["motivo"] == 1) { echo "selected"; }  ?>>Necesidad económica</option>
									<option value=2 <?php if($information["motivo"] == 2) { echo "selected"; }  ?>>Continuar con el negocio familiar</option>
									<option value=3 <?php if($information["motivo"] == 3) { echo "selected"; }  ?>>Desempleo (no tenía nada más que hacer)</option>
									<option value=4 <?php if($information["motivo"] == 4) { echo "selected"; }  ?>>Tener nuevos ingresos</option>
									<option value=5 <?php if($information["motivo"] == 5) { echo "selected"; }  ?>>Por inversión</option>
									<option value=6 <?php if($information["motivo"] == 6) { echo "selected"; }  ?>>Deseo de aplicar conocimientos</option>
									<option value=7 <?php if($information["motivo"] == 7) { echo "selected"; }  ?>>Tenía experiencia</option>
									<option value=8 <?php if($information["motivo"] == 8) { echo "selected"; }  ?>>Otra</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="fortalecer">¿Cuáles de los siguientes servicios de apoyo empresarial considera necesarios para fortalecer su actividad? *</label>
							<div class="col-sm-5">
								<select name="fortalecer" id="fortalecer" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["fortalecer"] == 1) { echo "selected"; }  ?>>Capacitación en mejora de productos</option>
									<option value=2 <?php if($information["fortalecer"] == 2) { echo "selected"; }  ?>>Capacitación en mejora de procesos</option>
									<option value=3 <?php if($information["fortalecer"] == 3) { echo "selected"; }  ?>>Capacitación y actualización del recurso humano</option>
									<option value=4 <?php if($information["fortalecer"] == 4) { echo "selected"; }  ?>>Asesoría en mercadeo y comercialización</option>
									<option value=5 <?php if($information["fortalecer"] == 5) { echo "selected"; }  ?>>Asesoría en productos nuevos</option>
									<option value=6 <?php if($information["fortalecer"] == 6) { echo "selected"; }  ?>>Asesoría en el manejo de nuevos productos informáticos</option>
									<option value=7 <?php if($information["fortalecer"] == 7) { echo "selected"; }  ?>>Asesoría en innovación empresarial</option>
									<option value=8 <?php if($information["fortalecer"] == 8) { echo "selected"; }  ?>>Asesoría en trámites (ej.: comercio exterior, patentes, inversión extranjera)</option>
									<option value=9 <?php if($information["fortalecer"] == 9) { echo "selected"; }  ?>>Participación en ferias, ruedas de negocios y eventos nacionales e internacionales</option>
									<option value=10 <?php if($information["fortalecer"] == 10) { echo "selected"; }  ?>>Información sobre acceso a financiamiento</option>
									<option value=11 <?php if($information["fortalecer"] == 11) { echo "selected"; }  ?>>Gerencia y capacitación para la formulación e implementación de proyectos empresariales</option>
									<option value=12 <?php if($information["fortalecer"] == 12) { echo "selected"; }  ?>>Otro</option>
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