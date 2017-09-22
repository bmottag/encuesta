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
					<i class="fa fa-thumb-tack"></i> Capítulo Aspectos críticos del Establecimiento 							
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
							
							

								
<?php 

	$opcion1="";
	$opcion2="";
	$opcion3="";
	$opcion4="";
	$opcion5="";
	$opcion6="";
	$opcion7="";
	$opcion8="";
	$opcion9="";

if($information){	
	
	$array = json_decode($information["inconvenientes"]);
		
	foreach ($array as $lista):
		if($lista == 1){
			$opcion1="checked";
		}elseif($lista == 2){
			$opcion2="checked";
		}elseif($lista == 3){
			$opcion3="checed";
		}elseif($lista == 4){
			$opcion4="checked";
		}elseif($lista == 5){
			$opcion5="checked";
		}elseif($lista == 6){
			$opcion6="checked";
		}elseif($lista == 7){
			$opcion7="checked";
		}elseif($lista == 8){
			$opcion8="checked";
		}elseif($lista == 9){
			$opcion9="checked";
		}
	endforeach;
}
 ?>
								
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="1" <?php echo $opcion1; ?> > Financiamiento<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="2" <?php echo $opcion2; ?> > Ausencia de recursos humano<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="3" <?php echo $opcion3; ?> > Capacitación<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="4" <?php echo $opcion4; ?> > Competencia desleal<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="5" <?php echo $opcion5; ?> > Manejo ambiental<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="6" <?php echo $opcion6; ?> > Seguridad<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="7" <?php echo $opcion7; ?> > Ventas<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="8" <?php echo $opcion8; ?> > Proveedores<br>
  <input type="checkbox" id="inconvenientes" name="inconvenientes[]" value="9" <?php echo $opcion9; ?> > Otros<br>  
								
								
								
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