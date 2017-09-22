<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_criticos.js"); ?>"></script>

<script>
$(document).ready(function () {
	
    $('#inconvenientes').change(function () {
        $('#inconvenientes option:selected').each(function () {
            var inconvenientes = $('#inconvenientes').val();
            if (inconvenientes == 9) {
				$("#div_cual").css("display", "inline");
            } else {
				$("#div_cual").css("display", "none");
            }
        });
    });
    
});
</script>

<div id="page-wrapper">
	<br>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	<input type="hidden" id="hddIdFormCriticos" name="hddIdFormCriticos" value="<?php echo $idFormCriticos; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-thumb-tack"></i> Formulario Aspectos críticos del Establecimiento 							
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
							<label class="col-sm-4 control-label" for="inconvenientes">En el último año, este establecimiento tuvo inconvenientes o dificultades en: *</label>
							<div class="col-sm-5">
								<select name="inconvenientes" id="inconvenientes" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["inconvenientes"] == 1) { echo "selected"; }  ?>>Financiamiento</option>
									<option value=2 <?php if($information["inconvenientes"] == 2) { echo "selected"; }  ?>>Ausencia de recursos humano</option>
									<option value=3 <?php if($information["inconvenientes"] == 3) { echo "selected"; }  ?>>Capacitación</option>
									<option value=4 <?php if($information["inconvenientes"] == 4) { echo "selected"; }  ?>>Competencia desleal</option>
									<option value=5 <?php if($information["inconvenientes"] == 5) { echo "selected"; }  ?>>Manejo ambiental</option>
									<option value=6 <?php if($information["inconvenientes"] == 6) { echo "selected"; }  ?>>Seguridad</option>
									<option value=7 <?php if($information["inconvenientes"] == 7) { echo "selected"; }  ?>>Ventas</option>
									<option value=8 <?php if($information["inconvenientes"] == 8) { echo "selected"; }  ?>>Proveedores</option>
									<option value=9 <?php if($information["inconvenientes"] == 9) { echo "selected"; }  ?>>Otros</option>
								</select>
							</div>
						</div>

<?php 
	$mostrar = "none";
	if($information && $information["inconvenientes"]==9){
		$mostrar = "inline";
	}
?>
						
						<div class="form-group" id="div_cual" style="display: <?php echo $mostrar; ?>">
							<label class="col-sm-4 control-label" for="cuales">¿Cuáles? </label>
							<div class="col-sm-5">
								<input type="text" id="cuales" name="cuales" class="form-control" value="<?php echo $information?$information["cuales"]:""; ?>" placeholder="¿Cuáles?" required >
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