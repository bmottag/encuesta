<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_financiera.js"); ?>"></script>

<script>
$(document).ready(function () {
	
    $('#formacion').change(function () {
        $('#formacion option:selected').each(function () {
            var formacion = $('#formacion').val();
            if (formacion == 6) {
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
	<input type="hidden" id="hddIdFormFinanciera" name="hddIdFormFinanciera" value="<?php echo $idFormFinanciera; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-th-list"></i> Capítulo Información Financiera del Establecimiento 							
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
							<label class="col-sm-4 control-label" for="ingresos">¿Cuál es el valor promedio de ingresos por ventas o por servicios en el mes de este establecimiento?. (Coloque el valor señalado en los siguientes rangos) *</label>
							<div class="col-sm-5">
								<select name="ingresos" id="ingresos" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["ingresos"] == 1) { echo "selected"; }  ?>>Menos de $500.000</option>
									<option value=2 <?php if($information["ingresos"] == 2) { echo "selected"; }  ?>>Entre $500.001 y $1.000.000</option>
									<option value=3 <?php if($information["ingresos"] == 3) { echo "selected"; }  ?>>Entre $1.000.001 y $1.500.000</option>
									<option value=4 <?php if($information["ingresos"] == 4) { echo "selected"; }  ?>>Entre $1.500.001 y $2.000.000</option>
									<option value=5 <?php if($information["ingresos"] == 5) { echo "selected"; }  ?>>Entre 2.000.001 y 5.000.000</option>
									<option value=6 <?php if($information["ingresos"] == 6) { echo "selected"; }  ?>>Entre 5.000.001 y 10.000.000</option>
									<option value=7 <?php if($information["ingresos"] == 7) { echo "selected"; }  ?>>Entre 10.000.001 y 15.000.000</option>
									<option value=8 <?php if($information["ingresos"] == 8) { echo "selected"; }  ?>>Entre15.000.001 y en adelante</option>
									<option value=9 <?php if($information["ingresos"] == 9) { echo "selected"; }  ?>>NS/NR</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="contabilidad">¿Lleva contabilidad en su negocio? *</label>
							<div class="col-sm-5">
								<select name="contabilidad" id="contabilidad" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["contabilidad"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["contabilidad"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="formacion">¿En qué áreas considera debería recibir formación el propietario o sus empleados? *</label>
							<div class="col-sm-5">
								<select name="formacion" id="formacion" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["formacion"] == 1) { echo "selected"; }  ?>>Mercadeo y ventas</option>
									<option value=2 <?php if($information["formacion"] == 2) { echo "selected"; }  ?>>Planeación estratégica</option>
									<option value=3 <?php if($information["formacion"] == 3) { echo "selected"; }  ?>>Servicio al cliente</option>
									<option value=4 <?php if($information["formacion"] == 4) { echo "selected"; }  ?>>Producción</option>
									<option value=5 <?php if($information["formacion"] == 5) { echo "selected"; }  ?>>ISO 9001, 14000</option>
									<option value=6 <?php if($information["formacion"] == 6) { echo "selected"; }  ?>>Otros</option>
								</select>
							</div>
						</div>

<?php 
	$mostrar = "none";
	if($information && $information["formacion"]==6){
		$mostrar = "inline";
	}
?>
						
						<div class="form-group" id="div_cual" style="display: <?php echo $mostrar; ?>">
							<label class="col-sm-4 control-label" for="cuales">¿Cuáles? </label>
							<div class="col-sm-5">
								<input type="text" id="cuales" name="cuales" class="form-control" value="<?php echo $information?$information["cuales"]:""; ?>" placeholder="¿Cuáles?" required >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" for="impuestos">¿Qué impuestos a pagado este establecimiento en el último año? *</label>
							<div class="col-sm-5">
								<select name="impuestos" id="impuestos" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["impuestos"] == 1) { echo "selected"; }  ?>>Retención en la fuente</option>
									<option value=2 <?php if($information["impuestos"] == 2) { echo "selected"; }  ?>>Impuesto de Renta</option>
									<option value=3 <?php if($information["impuestos"] == 3) { echo "selected"; }  ?>>IVA</option>
									<option value=4 <?php if($information["impuestos"] == 4) { echo "selected"; }  ?>>ICA</option>
									<option value=5 <?php if($information["impuestos"] == 5) { echo "selected"; }  ?>>Ninguno</option>
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