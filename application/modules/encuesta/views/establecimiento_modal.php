<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/establecimiento.js"); ?>"></script>

<script>
$(document).ready(function () {
	
    $('#tipo_documento').change(function () {
        $('#tipo_documento option:selected').each(function () {
            var tipo_documento = $('#tipo_documento').val();
            $('#digitoConfirm').val("");
			$('#digito').val("");
			$('#documento').val("");
			$('#documentosConfirm').val("");
			
			if (tipo_documento == 1) {
				$("#div_digito").css("display", "inline");
            } else {
				$("#div_digito").css("display", "none");
            }
			
            if (tipo_documento == 4 || tipo_documento == 5) {
				$("#div_cedula").css("display", "none");
				$("#div_digito").css("display", "none");
            } else {
				$("#div_cedula").css("display", "inline");
            }
			
        });
    });
    
});
</script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">Identificación del establecimiento y propietario
	<br><small>Adicionar/Editar</small>
	</h4>
</div>

<div class="modal-body">

	<p class="text-danger text-left">Los campos con * son obligatorios.</p>

	<form name="form" id="form" role="form" method="post" >
		<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_establecimiento"]:""; ?>"/>		
		<input type="hidden" id="hddIdManzana" name="hddIdManzana" value="<?php echo $idManzana; ?>"/>

		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="razonSocial">Razón social o nombre del propietario*</label>
					<input type="text" id="razonSocial" name="razonSocial" class="form-control" value="<?php echo $information?$information[0]["razon_social"]:""; ?>" placeholder="Razón social o nombre comercial" required >
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="nombre">Nombre comercial : *</label>
					<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $information?$information[0]["nombre_propietario"]:""; ?>" placeholder="Nombre del propietario" required >
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="address">Dirección del establecimiento :</label>
					<input type="text" id="address" name="address" class="form-control" value="<?php echo $information?$information[0]["direccion"]:""; ?>" placeholder="Dirección" >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="telefono">Teléfono y/o celular del establecimiento : *</label>
					<input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $information?$information[0]["telefono"]:""; ?>" placeholder="Teléfono" >
				</div>
			</div>
		</div>

		
		<div class="row">	
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="tipo_documento">Tipo documento del establecimiento : *</label>
					<select name="tipo_documento" id="tipo_documento" class="form-control" required>
						<option value=''>Select...</option>
						<option value=1 <?php if($information[0]["tipo_documento"] == 1) { echo "selected"; }  ?>>NIT/RUT</option>
						<option value=2 <?php if($information[0]["tipo_documento"] == 2) { echo "selected"; }  ?>>Cédula de ciudadanía C.C.</option>
						<option value=3 <?php if($information[0]["tipo_documento"] == 3) { echo "selected"; }  ?>>Cédula de extranjería C.E.</option>
						<option value=4 <?php if($information[0]["tipo_documento"] == 4) { echo "selected"; }  ?>>No tiene</option>
						<option value=5 <?php if($information[0]["tipo_documento"] == 5) { echo "selected"; }  ?>>NS/NR</option>
					</select>
				</div>
			</div>
		</div>

<?php 
	$mostrar2 = "inline";
	if($information){
		if($information[0]["tipo_documento"]==4 || $information[0]["tipo_documento"]==5){
			$mostrar2 = "none";
		}
	}else{
		$mostrar2 = "none";
	}
?>
		
		<div class="row" id="div_cedula" style="display: <?php echo $mostrar2; ?>">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="documento">No. Documento : *</label>
					<input type="text" id="documento" name="documento" class="form-control" value="<?php echo $information?$information[0]["cedula"]:""; ?>" placeholder="No. Documento" >
				</div>
			</div>			

			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="documentosConfirm">Confirmar No. Documento : *</label>
					<input type="text" id="documentosConfirm" name="documentosConfirm" class="form-control" value="<?php echo $information?$information[0]["cedula"]:""; ?>" placeholder="Confirmar No. Documento" >
				</div>
			</div>			
		</div>
		
		
<?php 
	$mostrar = "none";
	if($information && $information[0]["tipo_documento"]==1){
		$mostrar = "inline";
	}
?>
						
		<div class="row" id="div_digito" style="display: <?php echo $mostrar; ?>">
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="digito">Digito de Verificación D.V.  : </label>
					<input type="text" id="digito" name="digito" class="form-control" value="<?php echo $information?$information[0]["digito"]:""; ?>" placeholder="Digito de Verificación D.V." >
				</div>
			</div>			
			
			<div class="col-sm-12">
				<div class="form-group text-left">
					<label class="control-label" for="digitoConfirm">Confirmar Digito de Verificación D.V.  : </label>
					<input type="text" id="digitoConfirm" name="digitoConfirm" class="form-control" value="<?php echo $information?$information[0]["digito"]:""; ?>" placeholder="Confirmar Digito de Verificación D.V." >
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