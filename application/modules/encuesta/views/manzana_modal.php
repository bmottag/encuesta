<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/manzana.js"); ?>"></script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">Manzana
	<br><small>Adicionar/Editar</small>
	</h4>
</div>

<div class="modal-body">

	<p class="text-danger text-left">Los campos con * son obligatorios.</p>

	<form name="form" id="form" role="form" method="post" >
		<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_manzana"]:""; ?>"/>
				
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label for="type" class="control-label">Sector : *</label>
					<select name="sector" id="sector" class="form-control" >
						<option value=''>Select...</option>
						<?php for ($i = 0; $i < count($sector); $i++) { ?>
							<option value="<?php echo $sector[$i]["id_rol"]; ?>" <?php if($information[0]["fk_id_sector"] == $sector[$i]["id_rol"]) { echo "selected"; }  ?>><?php echo $sector[$i]["nombre_rol"]; ?></option>	
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label for="type" class="control-label">Sección : *</label>
					<select name="seccion" id="seccion" class="form-control" >
						<option value=''>Select...</option>
						<?php for ($i = 0; $i < count($sector); $i++) { ?>
							<option value="<?php echo $sector[$i]["id_rol"]; ?>" <?php if($information[0]["fk_id_sector"] == $sector[$i]["id_rol"]) { echo "selected"; }  ?>><?php echo $sector[$i]["nombre_rol"]; ?></option>	
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label for="type" class="control-label">Manzana : *</label>
					<select name="manzana" id="manzana" class="form-control" >
						<option value=''>Select...</option>
						<?php for ($i = 0; $i < count($sector); $i++) { ?>
							<option value="<?php echo $sector[$i]["id_rol"]; ?>" <?php if($information[0]["fk_id_sector"] == $sector[$i]["id_rol"]) { echo "selected"; }  ?>><?php echo $sector[$i]["nombre_rol"]; ?></option>	
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label for="type" class="control-label">Comuna : *</label>
					<select name="comuna" id="comuna" class="form-control" >
						<option value=''>Select...</option>
						<?php for ($i = 0; $i < count($sector); $i++) { ?>
							<option value="<?php echo $sector[$i]["id_rol"]; ?>" <?php if($information[0]["fk_id_sector"] == $sector[$i]["id_rol"]) { echo "selected"; }  ?>><?php echo $sector[$i]["nombre_rol"]; ?></option>	
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
						<label for="type" class="control-label">Barrio : *</label>
						<input type="text" id="barrio" name="barrio" class="form-control" value="<?php echo $information?$information[0]["nombre_grupo_instrumentos"]:""; ?>" placeholder="Barrio" required >
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
				<div class="alert alert-danger"><span class="glyphicon glyphicon-remove" id="span_msj">&nbsp;</span></div>
			</div>	
		</div>
			
	</form>
</div>