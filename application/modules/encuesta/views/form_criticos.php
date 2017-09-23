<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_criticos.js"); ?>"></script>

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
					<i class="fa fa-thumb-tack"></i> 3. Capítulo Aspectos críticos del Establecimiento 							
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
<input type="checkbox" id="financiamiento" name="financiamiento" value=1 <?php if($information && $information["financiamiento"]){echo "checked";} ?> > Financiamiento<br>
<input type="checkbox" id="ausencia" name="ausencia" value=1 <?php if($information && $information["ausencia"]){echo "checked";} ?> > Ausencia de recursos humano<br>
<input type="checkbox" id="capacitacion" name="capacitacion" value=1 <?php if($information && $information["capacitacion"]){echo "checked";} ?> > Capacitación<br>
<input type="checkbox" id="competencia" name="competencia" value=1 <?php if($information && $information["competencia"]){echo "checked";} ?> > Competencia desleal<br>
<input type="checkbox" id="ambiental" name="ambiental" value=1 <?php if($information && $information["ambiental"]){echo "checked";} ?> > Manejo ambiental<br>
<input type="checkbox" id="seguridad" name="seguridad" value=1 <?php if($information && $information["seguridad"]){echo "checked";} ?> > Seguridad<br>
<input type="checkbox" id="ventas" name="ventas" value=1 <?php if($information && $information["ventas"]){echo "checked";} ?> > Ventas<br>
<input type="checkbox" id="proveedores" name="proveedores" value=1 <?php if($information && $information["proveedores"]){echo "checked";} ?> > Proveedores<br>
<input type="checkbox" id="otros" name="otros" value=1 <?php if($information && $information["otros"]){echo "checked";} ?> > Otros
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