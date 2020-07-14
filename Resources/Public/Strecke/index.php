<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width: 100%;
         }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			scrollwheel:false
		});

		var directionsDisplay = new google.maps.DirectionsRenderer();
		var directionsService = new google.maps.DirectionsService();

		var request = {
				  origin: '<?php echo $_GET['o'];  ?>',
				  destination: '<?php echo $_GET['d'];  ?>',
			travelMode: 'DRIVING'
		};

		directionsService.route(request, function(response,status) {
			console.log(response);
			console.log(status);

			if(status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});

		directionsDisplay.setMap(map);
	}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvvm7iXZibbQaPtMTrGwCaBXYtcTQKjYY&callback=initMap" async defer></script>
  </body>
</html>