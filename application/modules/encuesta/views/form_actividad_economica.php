<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_actividad_economica.js"); ?>"></script>

<div id="page-wrapper">
	<br>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	<input type="hidden" id="hddIdFormActividadEconomica" name="hddIdFormActividadEconomica" value="<?php echo $idFormActividadEconomica; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar </a> 
					<i class="fa fa-usd"></i> 2. Capítulo Características Generales de la Actividad Económica						
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
							<label class="col-sm-4 control-label" for="actividad">¿Cuál es su actividad económica principal o que se dedica su establecimiento? *</label>
							<div class="col-sm-5">
								<select name="actividad" id="actividad" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["actividad"] == 1) { echo "selected"; }  ?>>Agricultura, ganadería, caza, silvicultura y pesca</option>
									<option value=2 <?php if($information["actividad"] == 2) { echo "selected"; }  ?>>Elaboración de productos alimenticios</option>
									<option value=3 <?php if($information["actividad"] == 3) { echo "selected"; }  ?>>Elaboración de bebidas</option>
									<option value=4 <?php if($information["actividad"] == 4) { echo "selected"; }  ?>>Industrias manufactureras</option>
									<option value=5 <?php if($information["actividad"] == 5) { echo "selected"; }  ?>>Construcción</option>
									<option value=6 <?php if($information["actividad"] == 6) { echo "selected"; }  ?>>Comercio al por mayor</option>
									<option value=7 <?php if($information["actividad"] == 7) { echo "selected"; }  ?>>Comercio al por menor </option>
									<option value=8 <?php if($information["actividad"] == 8) { echo "selected"; }  ?>>Transporte</option>
									<option value=9 <?php if($information["actividad"] == 9) { echo "selected"; }  ?>>Restaurante</option>
									<option value=10 <?php if($information["actividad"] == 10) { echo "selected"; }  ?>>Cafetería, fuente de soda o frutería</option>
									<option value=11 <?php if($information["actividad"] == 11) { echo "selected"; }  ?>>Otros expendios de comida</option>
									<option value=12 <?php if($information["actividad"] == 12) { echo "selected"; }  ?>>Expendio de bebidas alcohólicas</option>
									<option value=13 <?php if($information["actividad"] == 13) { echo "selected"; }  ?>>Hotel, hostal o aparta hotel, residencias, moteles, amoblados,   centro vacacional, zona de camping, otro tipo de alojamiento?</option>
									<option value=14 <?php if($information["actividad"] == 14) { echo "selected"; }  ?>>Desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas), consultoría informática y actividades relacionadas</option>
									<option value=15 <?php if($information["actividad"] == 15) { echo "selected"; }  ?>>Actividades inmobiliarias</option>
									<option value=16 <?php if($information["actividad"] == 16) { echo "selected"; }  ?>>Actividades jurídicas, contabilidad, administración empresarial, consultoría de gestión, arquitectura e ingeniería,  Publicidad,  estudios de mercado, fotografía, veterinarias</option>
									<option value=17 <?php if($information["actividad"] == 17) { echo "selected"; }  ?>>Actividades de alquiler y arrendamiento</option>
									<option value=18 <?php if($information["actividad"] == 18) { echo "selected"; }  ?>>Actividades de agencias de empleo</option>
									<option value=19 <?php if($information["actividad"] == 19) { echo "selected"; }  ?>>Actividades de servicios a edificios y paisajismo (jardines, zonas verdes)</option>
									<option value=20 <?php if($information["actividad"] == 20) { echo "selected"; }  ?>>Curtido y recurtido de cueros; fabricación de calzado; fabricación de artículos de viaje, maletas, bolsos de mano y artículos similares, y fabricación de artículos de talabartería y guarnicionería; adobo y teñido de pieles. Curtido y recurtido de cueros; fabricación de calzado; fabricación de artículos de viaje, maletas, bolsos de mano y artículos similares, y fabricación de artículos de talabartería y guarnicionería; adobo y teñido de pieles.</option>
									<option value=21 <?php if($information["actividad"] == 21) { echo "selected"; }  ?>>Actividades de impresión y de producción de copias a partir de grabaciones originales.</option>
									<option value=22 <?php if($information["actividad"] == 22) { echo "selected"; }  ?>>Fabricación de sustancias y productos químicos.</option>
									<option value=23 <?php if($information["actividad"] == 23) { echo "selected"; }  ?>>Fabricación de muebles, colchones y somieres.</option>
									<option value=24 <?php if($information["actividad"] == 24) { echo "selected"; }  ?>>Comercio, mantenimiento y reparación de vehículos automotores y motocicletas, sus partes, piezas y accesorios.</option>
									<option value=25 <?php if($information["actividad"] == 25) { echo "selected"; }  ?>>Actividades artísticas, de entretenimiento y recreación.</option>
									<option value=26 <?php if($information["actividad"] == 26) { echo "selected"; }  ?>>Mantenimiento y reparación de computadores, efectos personales y enseres domésticos</option>
									<option value=27 <?php if($information["actividad"] == 27) { echo "selected"; }  ?>>Otras actividades</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="numero_personas">¿Cuántas personas; incluido(a) usted, trabajan actualmente en el establecimiento? *</label>					
							<div class="col-sm-5">
								<input type="text" id="numero_personas" name="numero_personas" class="form-control" value="<?php echo $information?$information["numero_personas"]:""; ?>" placeholder="Número de personas" required >
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="seguridad_social">¿Los trabajadores de este establecimiento; incluido(a) usted,  se encuentran afiliados a seguridad social? *</label>
							<div class="col-sm-5">
								<select name="seguridad_social" id="seguridad_social" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["seguridad_social"] == 1) { echo "selected"; }  ?>>Todo</option>
									<option value=2 <?php if($information["seguridad_social"] == 2) { echo "selected"; }  ?>>Alguno</option>
									<option value=3 <?php if($information["seguridad_social"] == 3) { echo "selected"; }  ?>>Ninguno</option>
								</select>
							</div>
						</div>																	

						<div class="form-group">
							<label class="col-sm-4 control-label" for="lugar">El lugar donde funciona este establecimiento es:  *</label>
							<div class="col-sm-5">
								<select name="lugar" id="lugar" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["lugar"] == 1) { echo "selected"; }  ?>>Propio</option>
									<option value=2 <?php if($information["lugar"] == 2) { echo "selected"; }  ?>>Arrendado</option>
									<option value=3 <?php if($information["lugar"] == 3) { echo "selected"; }  ?>>Usufruto</option>
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