$( document ).ready( function () {

jQuery.validator.addMethod("campoTipoDoc", function(value, element, param) {
	var tipo_documento = $('#tipo_documento').val();
	if ( tipo_documento != 4 && tipo_documento != 5 && value == "")  {
		return false;
	}else{
		return true;
	}
}, "Este campo es requerido.");

jQuery.validator.addMethod("campoNit", function(value, element, param) {
	var tipo_documento = $('#tipo_documento').val();
	if ( tipo_documento == 1 && value == "" ) {
		return false;
	}else{
		return true;
	}
}, "Este campo es requerido.");


	$("#nombre").bloquearNumeros().convertirMayuscula().maxlength(100);
	$("#address").convertirMayuscula();
	$("#razonSocial").convertirMayuscula();
	$("#razonSocial").convertirMayuscula();
	$("#comuna").bloquearTexto().maxlength(12);
	
	$( "#form" ).validate( {
		rules: {
			nombre: 			{ required: true, minlength: 3, maxlength:100 },
			address: 			{ minlength: 4, maxlength:100},
			documento: 			{ number: true, minlength: 4, maxlength:12, campoTipoDoc: "#tipo_documento" },
			documentosConfirm: 	{ equalTo: "#documento" },
			telefono:	 		{ minlength: 4, maxlength:40  },
			digito:		 		{ maxlength:1, campoNit: "#tipo_documento" },
			digitoConfirm: 		{ equalTo: "#digito" }
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );
			error.insertAfter( element );

		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-12" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-12" ).addClass( "has-success" ).removeClass( "has-error" );
		},
		submitHandler: function (form) {
			return true;
		}
	});
	
	$("#btnSubmit").click(function(){		
	
		if ($("#form").valid() == true){
		
				//Activa icono guardando
				$('#btnSubmit').attr('disabled','-1');
				$("#div_error").css("display", "none");
				$("#div_load").css("display", "inline");
			
				$.ajax({
					type: "POST",	
					url: base_url + "encuesta/save_establecimiento",	
					data: $("#form").serialize(),
					dataType: "json",
					contentType: "application/x-www-form-urlencoded;charset=UTF-8",
					cache: false,
					
					success: function(data){
                                            
						if( data.result == "error" )
						{
							$("#div_load").css("display", "none");
							$("#div_error").css("display", "inline");
							$('#btnSubmit').removeAttr('disabled');							
							return false;
						} 

						if( data.result )//true
						{	                                                        
							$("#div_load").css("display", "none");
							$('#btnSubmit').removeAttr('disabled');

							var url = base_url + "encuesta/establecimiento/" + data.idRecord;
							$(location).attr("href", url);
						}
						else
						{
							alert('Error. Reload the web page.');
							$("#div_load").css("display", "none");
							$("#div_error").css("display", "inline");
							$('#btnSubmit').removeAttr('disabled');
						}	
					},
					error: function(result) {
						alert('Error. Reload the web page.');
						$("#div_load").css("display", "none");
						$("#div_error").css("display", "inline");
						$('#btnSubmit').removeAttr('disabled');
					}
					
		
				});	
		
		}//if			
	});
});