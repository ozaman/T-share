     <input name="check_map_position" type="text" id="check_map_position" value="0" />  <br />
    <div id="map_check_login" style="height:400px; width:500px; "></div>
    <script>
 
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map_check_login'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
			  
			
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
				  
			$("#check_map_position").val(position.coords.longitude);  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK41W7bkfkmv5t3YkPCXxX9oLFNX2midg&callback=initMap">
    </script>
 
    
 
<script>

setTimeout(function () {
 
	var url="go.php?name=load/update/location&file=location_gps&gps="+document.getElementById('check_map_position').value;
 
$("#send_data").load(url);

}, 5000);  
   </script>    <div id="send_data">520</div>