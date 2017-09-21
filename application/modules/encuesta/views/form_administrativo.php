<script type="text/javascript" src="<?php echo base_url("assets/js/validate/incidences/near_miss.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-ambulance fa-fw"></i>	Aspectos administrativos							
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
					<i class="fa fa-ambulance"></i> Formulario Aspectos administrativos
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

<!-- INICIO FIRMA -->

<?php if($information){ ?>

				<div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> V-Contracting Supervisor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
							<div class="form-group">
								<div class="row" align="center">
									<div style="width:70%;" align="center">
										 
<?php 
								
	$class = "btn-primary";						
if($information[0]["supervisor_signature"]){ 
		$class = "btn-default";
	?>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" >
		<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Signature
	</button>

	<div id="myModal" class="modal fade" role="dialog">  
		<div class="modal-dialog">
			<div class="modal-content">      
				<div class="modal-header">        
					<button type="button" class="close" data-dismiss="modal">×</button>        
					<h4 class="modal-title">VCI Supervisor Signature</h4>      </div>      
				<div class="modal-body text-center"><img src="<?php echo base_url($information[0]["supervisor_signature"]); ?>" class="img-rounded" alt="Hauling Supervisor Signature" width="304" height="236" />   </div>      
				<div class="modal-footer">        
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>     
				</div>  
			</div>  
		</div>
	</div>

	<?php
	}
	?>

	<a class="btn <?php echo $class; ?>" href="<?php echo base_url("incidences/add_signature/near_miss/supervisor/" . $information[0]["id_near_miss"]); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> VCI Supervisor Signature </a>

									</div>
								</div>
							</div>
					
						</div>
						<!-- /.panel-body -->
					</div>
				</div>
				
				<div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> V-Contracting Safety Coordinator
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

							<div class="form-group">
								<div class="row" align="center">
									<div style="width:70%;" align="center">								 
<?php 
								
$class = "btn-info";						
if($information[0]["coordinator_signature"]){ 
	$class = "btn-default";
?>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myContractorModal" >
	<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Signature
</button>

<div id="myContractorModal" class="modal fade" role="dialog">  
	<div class="modal-dialog">
		<div class="modal-content">      
			<div class="modal-header">        
				<button type="button" class="close" data-dismiss="modal">×</button>        
				<h4 class="modal-title">Safety Coordinator Signature</h4>      </div>      
<div class="modal-body text-center"><img src="<?php echo base_url($information[0]["coordinator_signature"]); ?>" class="img-rounded" alt="Safety Coordinator Signature" width="304" height="236" />   </div>      
			<div class="modal-footer">        
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>     
			</div>  
		</div>  
	</div>
</div>

<?php
}
?>

<a class="btn <?php echo $class; ?>" href="<?php echo base_url("incidences/add_signature/near_miss/coordinator/" . $information[0]["id_near_miss"]); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Coordinator Signature </a>

							
									</div>
								</div>
							</div>

						</div>
						<!-- /.panel-body -->
					</div>
				</div>
<?php } ?>	



<!-- FIN FIRMA -->
<p class="text-danger text-left">Los campos con * son obligatorios.</p>								
								
						<div class="form-group">
							<label class="col-sm-4 control-label" for="visible">¿Este establecimiento es visible al público? <br>
(Por observación): *</label>
							<div class="col-sm-5">
								<select name="visible" id="visible" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["visible"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["visible"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">Este establecimiento tiene aviso? <br>
(Por observación) *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["aviso"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="matricula">¿Este establecimiento cuenta con Matricula Mercantil? *</label>
							<div class="col-sm-5">
								<select name="matricula" id="matricula" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["matricula"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["matricula"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information[0]["matricula"] == 3) { echo "selected"; }  ?>>NS/NR</option>
								</select>
							</div>
						</div>																	

						<div class="form-group">
							<label class="col-sm-4 control-label" for="porqueno">¿Por qué no cuenta Matricula Mercantil? *</label>
							<div class="col-sm-5">
								<select name="porqueno" id="porqueno" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["porqueno"] == 1) { echo "selected"; }  ?>>No es útil</option>
									<option value=2 <?php if($information[0]["porqueno"] == 2) { echo "selected"; }  ?>>Es muy costoso</option>
									<option value=3 <?php if($information[0]["porqueno"] == 3) { echo "selected"; }  ?>>No tiene tiempo de sacarla</option>
									<option value=4 <?php if($information[0]["porqueno"] == 4) { echo "selected"; }  ?>>No sabía que existía</option>
									<option value=5 <?php if($information[0]["porqueno"] == 5) { echo "selected"; }  ?>>No sabe si debe registrarse</option>
									<option value=6 <?php if($information[0]["porqueno"] == 6) { echo "selected"; }  ?>>Otra</option>
								</select>
							</div>
						</div>																	

						<div class="form-group">
							<label class="col-sm-4 control-label" for="estado_actual">¿Cuál es el estado actual del establecimiento? *</label>
							<div class="col-sm-5">
								<select name="estado_actual" id="estado_actual" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["estado_actual"] == 1) { echo "selected"; }  ?>>Activo</option>
									<option value=2 <?php if($information[0]["estado_actual"] == 2) { echo "selected"; }  ?>>En liquidación</option>
									<option value=3 <?php if($information[0]["estado_actual"] == 3) { echo "selected"; }  ?>>Inactivo</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" for="establecimiento">Este establecimiento es: *</label>
							<div class="col-sm-5">
								<select name="establecimiento" id="establecimiento" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["establecimiento"] == 1) { echo "selected"; }  ?>>Único</option>
									<option value=2 <?php if($information[0]["establecimiento"] == 2) { echo "selected"; }  ?>>Principal</option>
									<option value=3 <?php if($information[0]["establecimiento"] == 3) { echo "selected"; }  ?>>Sucursal</option>
									<option value=4 <?php if($information[0]["establecimiento"] == 4) { echo "selected"; }  ?>>Agencia</option>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-4 control-label" for="tiempo">¿Cuánto tiempo lleva funcionando el establecimiento?*</label>
							<div class="col-sm-5">
								<select name="tiempo" id="tiempo" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["tiempo"] == 1) { echo "selected"; }  ?>>Menos de 6 meses</option>
									<option value=2 <?php if($information[0]["tiempo"] == 2) { echo "selected"; }  ?>>Entre 6 meses y  12 meses</option>
									<option value=3 <?php if($information[0]["tiempo"] == 3) { echo "selected"; }  ?>>Entre 1 año y 3 años</option>
									<option value=4 <?php if($information[0]["tiempo"] == 4) { echo "selected"; }  ?>>Entre 3 años y  5 años</option>
									<option value=5 <?php if($information[0]["tiempo"] == 5) { echo "selected"; }  ?>>Entre 5 años y  10 años</option>
									<option value=6 <?php if($information[0]["tiempo"] == 6) { echo "selected"; }  ?>>10 años y más</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label" for="rut">¿Este establecimiento cuenta con Registro Único Tributario RUT? *</label>
							<div class="col-sm-5">
								<select name="rut" id="rut" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["rut"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["rut"] == 2) { echo "selected"; }  ?>>No</option>
									<option value=3 <?php if($information[0]["rut"] == 3) { echo "selected"; }  ?>>NS/NR</option>
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