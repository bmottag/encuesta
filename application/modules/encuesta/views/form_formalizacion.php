<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/form_formalizacion.js"); ?>"></script>

<script>
function valid_beneficios() 
{
	if(document.getElementById('asesoria').checked || document.getElementById('apoyo').checked || document.getElementById('asesoria_juridica').checked || document.getElementById('capacitacion').checked || document.getElementById('tecnologias').checked || document.getElementById('participacion').checked || document.getElementById('simplificacion').checked || document.getElementById('tramites').checked || document.getElementById('creditos').checked || document.getElementById('impuestos').checked){
		document.getElementById('hddBeneficios').value = 1;
	}else{
		document.getElementById('hddBeneficios').value = "";
	}
}


function valid_normas() 
{   
	if(document.getElementById('contratacion').checked || document.getElementById('suelo').checked || document.getElementById('medio_ambiente').checked || document.getElementById('seguridad_social').checked || document.getElementById('impuestos_municipales').checked || document.getElementById('registro').checked || document.getElementById('impuestos_nacionales').checked || document.getElementById('licencias').checked ){
		document.getElementById('ninguno').checked = false;
		document.getElementById('hddNormas').value = 1;
	}else{
		document.getElementById('hddNormas').value = "";
	}
}

function valid_ninguno() 
{   
	if(document.getElementById('ninguno').checked){
		document.getElementById('contratacion').checked = false;
		document.getElementById('suelo').checked = false;
		document.getElementById('medio_ambiente').checked = false;
		document.getElementById('seguridad_social').checked = false;
		document.getElementById('impuestos_municipales').checked = false;
		document.getElementById('registro').checked = false;
		document.getElementById('impuestos_nacionales').checked = false;
		document.getElementById('licencias').checked = false;		
		
		document.getElementById('hddNormas').value = 1;
	}else{
		document.getElementById('hddNormas').value = "";
	}
}


</script>

<div id="page-wrapper">
	<br>

<form  name="form" id="form" class="form-horizontal" method="post"  >
	<input type="hidden" id="hddIdentificador" name="hddIdentificador" value="<?php echo $idFormulario; ?>"/>
	<input type="hidden" id="hddIdFormFormalizacion" name="hddIdFormFormalizacion" value="<?php echo $idFormFormalizacion; ?>"/>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-info" href=" <?php echo base_url().'encuesta/form_home/' . $idFormulario; ?> "><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar menú encuesta </a> 
					<i class="fa fa-tasks"></i> 6. Capítulo Formalización Empresarial
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
							<label class="col-sm-4 control-label" for="formalizar">¿Tiene interés en formalizar su establecimiento? *</label>
							<div class="col-sm-5">
								<select name="formalizar" id="formalizar" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["formalizar"] == 1) { echo "selected"; }  ?>>Si</option>
									<option value=2 <?php if($information["formalizar"] == 2) { echo "selected"; }  ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="motivo">¿Cuál es el principal motivo por el que no ha formalizado su establecimiento? *</label>
							<div class="col-sm-5">
								<select name="motivo" id="motivo" class="form-control" required>
									<option value=''>Select...</option>
									<option value=1 <?php if($information["motivo"] == 1) { echo "selected"; }  ?> >Altos impuestos</option>
									<option value=2 <?php if($information["motivo"] == 2) { echo "selected"; }  ?> >Tramitología</option>
									<option value=3 <?php if($information["motivo"] == 3) { echo "selected"; }  ?> >Negocio pequeño o temporal</option>
									<option value=4 <?php if($information["motivo"] == 4) { echo "selected"; }  ?> >Falta de interés o no lo considera necesario</option>
									<option value=5 <?php if($information["motivo"] == 5) { echo "selected"; }  ?> >Falta de tiempo</option>
									<option value=6 <?php if($information["motivo"] == 6) { echo "selected"; }  ?> >Falta de recursos económicos</option>
									<option value=7 <?php if($information["motivo"] == 7) { echo "selected"; }  ?> >Falta de información o desconocimiento</option>
									<option value=8 <?php if($information["motivo"] == 8) { echo "selected"; }  ?> >Inicio del establecimiento o en periodo de prueba</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="aviso">¿Cuáles de los siguientes beneficios o incentivos motivarían la formalización de los establecimientos? *</label>
							<div class="col-sm-5">								
<input type="checkbox" id="asesoria" name="asesoria" value=1 <?php if($information && $information["asesoria"]){echo "checked";} ?> onclick="valid_beneficios()"> Asesoría de mercados (local, nacional e internacional)<br>
<input type="checkbox" id="apoyo" name="apoyo" value=1 <?php if($information && $information["apoyo"]){echo "checked";} ?> onclick="valid_beneficios()"> Apoyo en solución de conflictos<br>
<input type="checkbox" id="asesoria_juridica" name="asesoria_juridica" value=1 <?php if($information && $information["asesoria_juridica"]){echo "checked";} ?> onclick="valid_beneficios()"> Asesoría jurídica gratita<br>
<input type="checkbox" id="capacitacion" name="capacitacion" value=1 <?php if($information && $information["capacitacion"]){echo "checked";} ?> onclick="valid_beneficios()"> Capacitación gratuita<br>
<input type="checkbox" id="tecnologias" name="tecnologias" value=1 <?php if($information && $information["tecnologias"]){echo "checked";} ?> onclick="valid_beneficios()"> Acceso a tecnologías con bajo costo<br>
<input type="checkbox" id="participacion" name="participacion" value=1 <?php if($information && $information["participacion"]){echo "checked";} ?> onclick="valid_beneficios()"> Participación en eventos empresariales<br>
<input type="checkbox" id="simplificacion" name="simplificacion" value=1 <?php if($information && $information["simplificacion"]){echo "checked";} ?> onclick="valid_beneficios()"> Simplificación de trámites<br>
<input type="checkbox" id="tramites" name="tramites" value=1 <?php if($information && $information["tramites"]){echo "checked";} ?> onclick="valid_beneficios()"> Trámites gratuitos o con bajo costo<br>
<input type="checkbox" id="creditos" name="creditos" value=1 <?php if($information && $information["creditos"]){echo "checked";} ?> onclick="valid_beneficios()"> Acceso a créditos<br>
<input type="checkbox" id="impuestos" name="impuestos" value=1 <?php if($information && $information["impuestos"]){echo "checked";} ?> onclick="valid_beneficios()"> Impuestos con tarifas bajas

<?php 
$valorBeneficios = "";
if($information)
{
	if($information["asesoria"] || $information["apoyo"] || $information["asesoria_juridica"] || $information["capacitacion"] || $information["tecnologias"] || $information["participacion"] || $information["simplificacion"] || $information["tramites"] || $information["creditos"] || $information["impuestos"] )
	{
		$valorBeneficios = 1;
	}
}
?>
<input type="hidden" id="hddBeneficios" name="hddBeneficios" value="<?php echo $valorBeneficios; ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label" for="normas">Conoce las normas en materia de: *</label>
							<div class="col-sm-5">
<input type="checkbox" id="contratacion" name="contratacion" value=1 <?php if($information && $information["contratacion"]){echo "checked";} ?> onclick="valid_normas()"> Contratación laboral<br>
<input type="checkbox" id="suelo" name="suelo" value=1 <?php if($information && $information["suelo"]){echo "checked";} ?> onclick="valid_normas()"> Uso del suelo<br>
<input type="checkbox" id="medio_ambiente" name="medio_ambiente" value=1 <?php if($information && $information["medio_ambiente"]){echo "checked";} ?> onclick="valid_normas()"> Medio ambiente<br>
<input type="checkbox" id="seguridad_social" name="seguridad_social" value=1 <?php if($information && $information["seguridad_social"]){echo "checked";} ?> onclick="valid_normas()"> Seguridad social<br>
<input type="checkbox" id="impuestos_municipales" name="impuestos_municipales" value=1 <?php if($information && $information["impuestos_municipales"]){echo "checked";} ?> onclick="valid_normas()"> Impuestos municipales<br>
<input type="checkbox" id="registro" name="registro" value=1 <?php if($information && $information["registro"]){echo "checked";} ?> onclick="valid_normas()"> Registro mercantil<br>
<input type="checkbox" id="impuestos_nacionales" name="impuestos_nacionales" value=1 <?php if($information && $information["impuestos_nacionales"]){echo "checked";} ?> onclick="valid_normas()"> Impuestos nacionales<br>
<input type="checkbox" id="licencias" name="licencias" value=1 <?php if($information && $information["licencias"]){echo "checked";} ?> onclick="valid_normas()"> Licencias sanitarias<br>
<input type="checkbox" id="ninguno" name="ninguno" value=1 <?php if($information && $information["ninguno"]){echo "checked";} ?> onclick="valid_ninguno()"> Ninguna

<?php 
$valorNormas = "";
if($information)
{
	if($information["contratacion"] || $information["suelo"] || $information["medio_ambiente"] || $information["seguridad_social"] || $information["impuestos_municipales"] || $information["registro"] || $information["impuestos_nacionales"] || $information["licencias"] || $information["ninguno"] )
	{
		$valorNormas = 1;
	}
}
?>
<input type="hidden" id="hddNormas" name="hddNormas" value="<?php echo $valorNormas; ?>"/>
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