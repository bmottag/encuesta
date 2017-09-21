<script type="text/javascript" src="<?php echo base_url("assets/js/validate/incidences/near_miss.js"); ?>"></script>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">
					<i class="fa fa-ambulance fa-fw"></i>	Características Generales de la Actividad Económica						
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
					<i class="fa fa-ambulance"></i> Formulario Características Generales de la Actividad Económica						
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
							<label class="col-sm-4 control-label" for="visible">¿Cuál es su actividad económica principal o que se dedica su establecimiento? *</label>
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
									<option value=10 <?php if($information[0]["visible"] == 10) { echo "selected"; }  ?>>No</option>
									<option value=11 <?php if($information[0]["visible"] == 11) { echo "selected"; }  ?>>Si</option>
									<option value=12 <?php if($information[0]["visible"] == 12) { echo "selected"; }  ?>>No</option>
									<option value=13 <?php if($information[0]["visible"] == 13) { echo "selected"; }  ?>>Si</option>
									<option value=14 <?php if($information[0]["visible"] == 14) { echo "selected"; }  ?>>No</option>
									<option value=15 <?php if($information[0]["visible"] == 15) { echo "selected"; }  ?>>Si</option>
									<option value=16 <?php if($information[0]["visible"] == 16) { echo "selected"; }  ?>>No</option>
									<option value=17 <?php if($information[0]["visible"] == 17) { echo "selected"; }  ?>>Si</option>
									<option value=18 <?php if($information[0]["visible"] == 18) { echo "selected"; }  ?>>No</option>
									<option value=19 <?php if($information[0]["visible"] == 19) { echo "selected"; }  ?>>Si</option>
									<option value=20 <?php if($information[0]["visible"] == 20) { echo "selected"; }  ?>>No</option>
									<option value=21 <?php if($information[0]["visible"] == 21) { echo "selected"; }  ?>>Si</option>
									<option value=22 <?php if($information[0]["visible"] == 22) { echo "selected"; }  ?>>No</option>
									<option value=23 <?php if($information[0]["visible"] == 23) { echo "selected"; }  ?>>Si</option>
									<option value=24 <?php if($information[0]["visible"] == 24) { echo "selected"; }  ?>>No</option>
									<option value=25 <?php if($information[0]["visible"] == 25) { echo "selected"; }  ?>>Si</option>
									<option value=26 <?php if($information[0]["visible"] == 26) { echo "selected"; }  ?>>No</option>
									<option value=27 <?php if($information[0]["visible"] == 27) { echo "selected"; }  ?>>Si</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Cuántas personas; incluido(a) usted, trabajan actualmente en el establecimiento? *</label>
							<div class="col-sm-5">
								<select name="aviso" id="aviso" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["aviso"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information[0]["aviso"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="matricula">¿Los trabajadores de este establecimiento; incluido(a) usted,  se encuentran afiliados a seguridad social? *</label>
							<div class="col-sm-5">
								<select name="matricula" id="matricula" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["matricula"] == 1) { echo "selected"; }  ?>>Todo</option>
									<option value=2 <?php if($information[0]["matricula"] == 2) { echo "selected"; }  ?>>Alguno</option>
									<option value=3 <?php if($information[0]["matricula"] == 3) { echo "selected"; }  ?>>Ninguno</option>
								</select>
							</div>
						</div>																	

						<div class="form-group">
							<label class="col-sm-4 control-label" for="porqueno">El lugar donde funciona este establecimiento es:  *</label>
							<div class="col-sm-5">
								<select name="porqueno" id="porqueno" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information[0]["porqueno"] == 1) { echo "selected"; }  ?>>Propio</option>
									<option value=2 <?php if($information[0]["porqueno"] == 2) { echo "selected"; }  ?>>Arrendado</option>
									<option value=3 <?php if($information[0]["porqueno"] == 3) { echo "selected"; }  ?>>Usufruto</option>
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