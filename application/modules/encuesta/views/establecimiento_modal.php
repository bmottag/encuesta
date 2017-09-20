<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/establecimiento.js"); ?>"></script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">Identificación del establecimiento y propietario
	<br><small>Adicionar/Editar</small>
	</h4>
</div>

<div class="modal-body">

	<p class="text-danger text-left">Los campos con * son obligatorios.</p>

	<form name="form" id="form" role="form" method="post" >
		<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_usuario"]:""; ?>"/>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="nombre">Nombre del propietario : *</label>
					<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $information?$information[0]["nombres_usuario"]:""; ?>" placeholder="Nombre del propietario" required >
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="address">Dirección :</label>
					<input type="text" id="address" name="address" class="form-control" value="<?php echo $information?$information[0]["direccion_usuario"]:""; ?>" placeholder="Dirección" >
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label class="control-label" for="telefono">Teléfono : *</label>
					<input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $information?$information[0]["telefono_fijo"]:""; ?>" placeholder="Teléfono" >
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label class="control-label" for="razonSocial">Razón social o nombre comercial : *</label>
					<input type="text" id="razonSocial" name="razonSocial" class="form-control" value="<?php echo $information?$information[0]["celular"]:""; ?>" placeholder="Razón social o nombre comercial" required >
				</div>
			</div>
		</div>

		
		<div class="row">	
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="documento">Cédula o NIT : *</label>
					<input type="text" id="documento" name="documento" class="form-control" value="<?php echo $information?$information[0]["numero_documento"]:""; ?>" placeholder="Cédula o NIT" required >
				</div>
			</div>
			
		</div>



		<div class="row">
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label class="control-label" for="comuna">Comuna : *</label>
					<input type="text" class="form-control" id="comuna" name="comuna" value="<?php echo $information?$information[0]["email"]:""; ?>" placeholder="Comuna" />
				</div>
			</div>
		</div>
		
		

		
		<div class="form-group">
			<div class="row" align="center">
				<div style="width:50%;" align="center">
					<input type="button" id="btnSubmit" name="btnSubmit" value="Guardar" class="btn btn-primary"/>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div id="div_load" style="display:none">		
				<div class="progress progress-striped active">
					<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
						<span class="sr-only">45% completado</span>
					</div>
				</div>
			</div>
			<div id="div_error" style="display:none">			
				<div class="alert alert-danger"><span class="glyphicon glyphicon-remove" id="span_msj">Este número de documetno ya existe en la base de datos.</span></div>
			</div>	
		</div>
			
	</form>
</div>