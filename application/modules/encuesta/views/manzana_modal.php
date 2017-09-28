<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/manzana.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/validate/encuesta/ajaxManzana.js"); ?>"></script>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="exampleModalLabel">Manzana
	</h4>
</div>

<div class="modal-body">

	<p class="text-danger text-left">Los campos con * son obligatorios.</p>

	<form name="form" id="form" role="form" method="post" >
		<input type="hidden" id="hddId" name="hddId" value="<?php echo $information?$information[0]["id_manzana"]:""; ?>"/>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label for="type" class="control-label">Comuna : *</label>
					<select name="comuna" id="comuna" class="form-control" required>
						<option value=''>Select...</option>
						<option value="02" <?php if($information[0]["fk_id_comuna"] == "02") { echo "selected"; }  ?>>Comuna 2</option>
						<option value="04" <?php if($information[0]["fk_id_comuna"] == "04") { echo "selected"; }  ?>>Comuna 4</option>
						<option value="05" <?php if($information[0]["fk_id_comuna"] == "05") { echo "selected"; }  ?>>Comuna 5</option>
						<option value="08" <?php if($information[0]["fk_id_comuna"] == "08") { echo "selected"; }  ?>>Comuna 8</option>
					</select>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label for="type" class="control-label">Sector : *</label>

					<select name="sector" id="sector" class="form-control" required>					
						<?php if($information){ ?>
						<option value=''>Select...</option>
							<option value="<?php echo $information[0]["fk_id_sector"]; ?>" selected><?php echo $information[0]["fk_id_sector"]; ?></option>
						<?php } ?>
					</select>
				
				</div>
			</div>			
		</div>
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group text-left">
					<label for="type" class="control-label">Sección : *</label>
					<select name="seccion" id="seccion" class="form-control" >
						<?php if($information){ ?>
						<option value=''>Select...</option>
							<option value="<?php echo $information[0]["fk_id_seccion"]; ?>" selected><?php echo $information[0]["fk_id_seccion"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group text-left">
					<label for="type" class="control-label">Manzana : *</label>
					<select name="manzana" id="manzana" class="form-control" >
						<?php if($information){ ?>
						<option value=''>Select...</option>
							<option value="<?php echo $information[0]["fk_id_manzana"]; ?>" selected><?php echo $information[0]["fk_id_manzana"]; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group text-left">
						<label for="type" class="control-label">Barrio : *</label>
						<input type="text" id="barrio" name="barrio" class="form-control" value="<?php echo $information?$information[0]["barrio"]:""; ?>" placeholder="Barrio" required >
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-left">
						<label for="type" class="control-label">Ubicación : *</label>

						<input id="viewaddress" name="viewaddress" class="form-control" type="text" disabled >
						<input id="latitud" name="latitud" type="hidden">					
						<input id="longitud" name="longitud" type="hidden">	
						<input id="address" name="address" type="hidden">									
						
				</div>
			</div>
		</div>

		
		<div class="row" style="display: none">
			<div class="col-sm-12">
						<div class="form-group">	
							<div class="row" align="center">
								<div style="width:80%;" align="center">
									<div id="map" style="width: 100%; height: 150px"></div>	
								</div>
							</div>	
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




  <script>
    // The following example creates complex markers to indicate beaches near
	// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
	// to the base of the flagpole.

	var options = {
	  enableHighAccuracy: true,
	  timeout: 5000,
	  maximumAge: 0
	};

	function success(pos) {
	  var crd = pos.coords;

	  console.log('Your current position is:');
	  console.log('Latitude : ' + crd.latitude);
	  console.log('Longitude: ' + crd.longitude);
	  console.log('More or less ' + crd.accuracy + ' meters.');
	  $("#latitud").val(crd.latitude);
	  $("#longitud").val(crd.longitude);
	  var pos = {
				  lat: crd.latitude,
				  lng: crd.longitude
				};
	  map.setCenter(pos);
	  map.setZoom(14);
	  
	showLatLong(crd.latitude, crd.longitude);
	  
	  ultimaPosicionUsuario = new google.maps.LatLng(crd.latitude, crd.longitude);
      marcadorUsuario = new google.maps.Marker({
        position: ultimaPosicionUsuario,
        map: map
      });
	};

	function error(err) {
	  console.warn('ERROR(' + err.code + '): ' + err.message);
	};

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
							  'Error: Error en el servicio de localizacion.' :
							  'Error: Navegador no soporta geolocalizacion.');
	  }
	

/**
 * INICIO --- Capturar direccion
 * http://www.elclubdelprogramador.com/2012/04/22/html5-obteniendo-direcciones-a-partir-de-latitud-y-longitud-geolocalizacion/
 */
function showLatLong(lat, longi) {
var geocoder = new google.maps.Geocoder();
var yourLocation = new google.maps.LatLng(lat, longi);
geocoder.geocode({ 'latLng': yourLocation },processGeocoder);

}
function processGeocoder(results, status){

if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
document.forms[0].address.value=results[0].formatted_address;
document.forms[0].viewaddress.value=results[0].formatted_address;
} else {
error('Google no retorno resultado alguno.');
}
} else {
error("Geocoding fallo debido a : " + status);
}
}
/**
 * FIN
 */	
	
	function initMap() {
		var pais = new google.maps.LatLng(51.0209884,-114.1591999);
		var mapOptions = {
			center: pais,
			zoom: 11,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		map = new google.maps.Map(document.getElementById('map'), mapOptions);
		
		
		
		//Inicializa el objeto geocoder
		geocoder = new google.maps.Geocoder();
				
		navigator.geolocation.getCurrentPosition(success, error, options);
		
		/*var infoWindow = new google.maps.InfoWindow({map: map});
		// Try HTML5 geolocation.
        if (navigator.geolocation) {
			  navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
				  lat: position.coords.latitude,
				  lng: position.coords.longitude
				};

				infoWindow.setPosition(pos);
				infoWindow.setContent('Su ubicacion.');
				map.setCenter(pos);
			  }, function() {
				handleLocationError(true, infoWindow, map.getCenter());
			  });
			} else {
			  // Browser doesn't support Geolocation
			  handleLocationError(false, infoWindow, map.getCenter());
			}
*/
	}	

  </script>

			
	<!--<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt__a_n1IUtBPqj9ntMD5cNG8gYlcovWM&libraries=places&callback=initMap">
		http://maps.googleapis.com/maps/api/js?key=AIzaSyDt__a_n1IUtBPqj9ntMD5cNG8gYlcovWM&libraries=places&callback=initMap"
	</script>-->
	<script async defer		
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt__a_n1IUtBPqj9ntMD5cNG8gYlcovWM&libraries=places&callback=initMap">
	</script>