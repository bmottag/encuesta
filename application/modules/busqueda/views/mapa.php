    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
<div id="page-wrapper">
	<br>
	
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<i class="fa fa-users"></i> GEOLOCALIZACIÓN DEL ESTABLECIMIENTO
				</div>
				<div class="panel-body">
				
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: <?php echo $latitud;?>, lng: <?php echo $longitud;?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoRXVDwlASd0KepKmu-5Mh5G3yGlb_mV4&callback=initMap">
    </script>
	
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->