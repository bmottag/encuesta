<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_financiera.js"); ?>"></script>

<script>
$(document).ready(function () {
		
    $("#otros").on("click", function() {
        var condiciones = $("#otros").is(":checked");
        if (condiciones) {
            $("#div_cual").css("display", "inline");
			$('#cuales').val("");
            event.preventDefault();
        } else {
			$("#div_cual").css("display", "none");
			$('#cuales').val("");
        }
    });
	   
});

function valid_formacion() 
{   
	if(document.getElementById('mercadeo').checked || document.getElementById('planeacion').checked || document.getElementById('servicio').checked || document.getElementById('produccion').checked || document.getElementById('iso').checked || document.getElementById('otros').checked){
		document.getElementById('hddFormacion').value = 1;
	}else{
		document.getElementById('hddFormacion').value = "";
	}
}

function valid_ninguno() 
{   
	if(document.getElementById('ninguno').checked){
		document.getElementById('retencion').checked = false;
		document.getElementById('renta').checked = false;
		document.getElementById('iva').checked = false;
		document.getElementById('ica').checked = false;
		
		document.getElementById('hddImpuestos').value = 1;
	}else{
		document.getElementById('hddImpuestos').value = "";
	}
}

function valid_all() 
{   
	if(document.getElementById('retencion').checked || document.getElementById('renta').checked || document.getElementById('iva').checked || document.getElementById('ica').checked){
		document.getElementById('ninguno').checked = false;
		document.getElementById('hddImpuestos').value = 1;
	}else{
		document.getElementById('hddImpuestos').value = "";
	}
}

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
					<i class="fa fa-th-list"></i> 4. Capítulo Información Financiera del Establecimiento 							
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
<input type="checkbox" id="mercadeo" name="mercadeo" value=1 <?php if($information && $information["mercadeo"]){echo "checked";} ?> onclick="valid_formacion()"> Mercadeo y ventas<br>
<input type="checkbox" id="planeacion" name="planeacion" value=1 <?php if($information && $information["planeacion"]){echo "checked";} ?> onclick="valid_formacion()"> Planeación estratégica<br>
<input type="checkbox" id="servicio" name="servicio" value=1 <?php if($information && $information["servicio"]){echo "checked";} ?> onclick="valid_formacion()"> Servicio al cliente<br>
<input type="checkbox" id="produccion" name="produccion" value=1 <?php if($information && $information["produccion"]){echo "checked";} ?> onclick="valid_formacion()"> Producción<br>
<input type="checkbox" id="iso" name="iso" value=1 <?php if($information && $information["iso"]){echo "checked";} ?> onclick="valid_formacion()"> ISO 9001, 14000<br>
<input type="checkbox" id="otros" name="otros" value=1 <?php if($information && $information["otros"]){echo "checked";} ?> onclick="valid_formacion()"> Otros

<?php 
$valorFormacion = "";
if($information)
{
	if($information["mercadeo"] || $information["planeacion"] || $information["servicio"] || $information["produccion"] || $information["iso"] || $information["otros"] )
	{
		$valorFormacion = 1;
	}
}
?>
<input type="hidden" id="hddFormacion" name="hddFormacion" value="<?php echo $valorFormacion; ?>"/>

							</div>
						</div>

<?php 
	$mostrar = "none";
	if($information && $information["otros"]==1){
		$mostrar = "inline";
	}
?>
						
						<div class="form-group" id="div_cual" style="display: <?php echo $mostrar; ?>">
							<label class="col-sm-4 control-label" for="cuales">¿Cuáles? </label>
							<div class="col-sm-5">
								<input type="text" id="cuales" name="cuales" class="form-control" value="<?php echo $information?$information["cuales"]:""; ?>" placeholder="¿Cuáles?" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" for="impuestos">¿Qué impuestos a pagado este establecimiento en el último año? *</label>
							<div class="col-sm-5">
								
<input type="checkbox" id="retencion" name="retencion" value=1 <?php if($information && $information["retencion"]){echo "checked";} ?> onclick="valid_all()"> Retención en la fuente<br>
<input type="checkbox" id="renta" name="renta" value=1 <?php if($information && $information["renta"]){echo "checked";} ?> onclick="valid_all()"> Impuesto de Renta<br>
<input type="checkbox" id="iva" name="iva" value=1 <?php if($information && $information["iva"]){echo "checked";} ?> onclick="valid_all()"> IVA<br>
<input type="checkbox" id="ica" name="ica" value=1 <?php if($information && $information["ica"]){echo "checked";} ?> onclick="valid_all()"> ICA<br>
<input type="checkbox" id="ninguno" name="ninguno" value=1 <?php if($information && $information["ninguno"]){echo "checked";} ?> onclick="valid_ninguno()"> Ninguno<br>

<?php 
$valorImpuestos = "";
if($information)
{
	if($information["retencion"] || $information["renta"] || $information["iva"] || $information["ica"] || $information["ninguno"] )
	{
		$valorImpuestos = 1;
	}
}
?>
<input type="hidden" id="hddImpuestos" name="hddImpuestos" value="<?php echo $valorImpuestos; ?>"/>

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