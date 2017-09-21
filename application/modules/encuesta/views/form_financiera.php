<script type="text/javascript" src="<?php echo base_url("assets/js/validate/incidences/near_miss.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-ambulance fa-fw"></i>	Información Financiera del Establecimiento 														
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
					<i class="fa fa-ambulance"></i> Formulario Información Financiera del Establecimiento 							
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
							<label class="col-sm-4 control-label" for="visible">¿Cuál es el valor promedio de ingresos por ventas o por servicios en el mes de este establecimiento?. (Coloque el valor señalado en los siguientes rangos) *</label>
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
									<option value=9 <?php if($information[0]["visible"] == 9) { echo "selected"; }  ?>>Si</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Lleva contabilidad en su negocio? *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["aviso"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="matricula">¿En qué áreas considera debería recibir formación el propietario o sus empleados? *</label>
							<div class="col-sm-5">
								<select name="matricula" id="matricula" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["matricula"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["matricula"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information[0]["matricula"] == 3) { echo "selected"; }  ?>>NS/NR</option>
									<option value=4 <?php if($information[0]["matricula"] == 4) { echo "selected"; }  ?>>Si</option>
									<option value=5 <?php if($information[0]["matricula"] == 5) { echo "selected"; }  ?>>No</option>
									<option value=6 <?php if($information[0]["matricula"] == 6) { echo "selected"; }  ?>>NS/NR</option>
								</select>
							</div>
						</div>																	

						<div class="form-group">
							<label class="col-sm-4 control-label" for="porqueno">¿Qué impuestos a pagado este establecimiento en el último año? *</label>
							<div class="col-sm-5">
								<select name="porqueno" id="porqueno" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["porqueno"] == 1) { echo "selected"; }  ?>>No es útil</option>
									<option value=2 <?php if($information[0]["porqueno"] == 2) { echo "selected"; }  ?>>Es muy costoso</option>
									<option value=3 <?php if($information[0]["porqueno"] == 3) { echo "selected"; }  ?>>No tiene tiempo de sacarla</option>
									<option value=4 <?php if($information[0]["porqueno"] == 4) { echo "selected"; }  ?>>No sabía que existía</option>
									<option value=5 <?php if($information[0]["porqueno"] == 5) { echo "selected"; }  ?>>No sabe si debe registrarse</option>
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