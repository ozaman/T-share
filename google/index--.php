 
   <input type="hiddens" name="check_data_status_gps_lat_old" id="check_data_status_gps_lat_old" value="0"  style="width:100px " /> 
  <input type="hiddens" name="check_data_status_gps_lng_old" id="check_data_status_gps_lng_old" value="0"  style="width:100px " /><br>
 
   
   
   <input type="hiddens" name="check_data_status_gps_lat" id="check_data_status_gps_lat" value="0"  style="width:100px " /> 
  <input type="hiddens" name="check_data_status_gps_lng" id="check_data_status_gps_lng" value="0"  style="width:100px " />
  
  
   <br>
<br>
<br>
<br>

 
 
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?><br>
 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 
        <div id="geo_data" style="display:none "></div>
        <div id="map_canvas" style="background: #f5f5f5; height:100%; width:100%; border:none; margin-top:-20px;"></div>

        <script type="text/javascript">
        var initialLocation;
            var bangkok = new google.maps.LatLng(13.755716, 100.501589);
            function initialize() {
                var myOptions = {
                    zoom: 14,
                    //center: latlng,
                    mapTypeControl: false,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);

                // detect geolocation lat/lng
                if ( navigator.geolocation ) {
                    navigator.geolocation.getCurrentPosition(function(location) {
                        var location = location.coords;
						
					document.getElementById('check_data_status_gps_lat').value=location.latitude;
document.getElementById('check_data_status_gps_lng').value=location.longitude;	
						
						
						
						
                 $("#geo_data").html('lats: '+location.latitude+'<br />longs: '+location.longitude);
 	
                        initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
						
                        map.setCenter(initialLocation);
                        setMarker(initialLocation);
						
						  bounds.extend(initialLocation);
						
						
						
                    }, function() {
                        handleNoGeolocation();
                    });
                } else {
                    handleNoGeolocation();
                }
        // no geolocation
 	
                function handleNoGeolocation() {
		 
		 /*
                    map.setCenter(bangkok);
                    setMarker(bangkok);
                $("#geo_data").html('lat: 13.755716<br />long: 100.501589');
					// window.location = "alert_location.php";
					
					*/
                }

                // set marker
				var image = 'share.png';
                function setMarker(initialName) {
                    var marker = new google.maps.Marker({
                        draggable: true,
                        position: initialName,
						icon: image,
                        map: map,
                        title: "คุณอยู่ที่นี่."
                    });
					
 

 	
					
 google.maps.event.addListener(marker, 'dragend', function(event) {
	 
	 /////  move map marker
   var numDeltas = 500;
    var delay = 1; //milliseconds
    var i = 0; 
 
  
  ///
    function moveMarker(){
		
		
var  deltaLat_free = (marker.getPosition().lat() - document.getElementById('check_data_status_gps_lat').value)/numDeltas;
var   deltaLng_free = (marker.getPosition().lng() - document.getElementById('check_data_status_gps_lng').value)/numDeltas; 
 
 
 
 alert(deltaLat_free);
 
 
 /*
 bounds  = new google.maps.LatLngBounds();
 var latlng_busy = new google.maps.LatLng(position[0], position[1]);
  bounds.extend(latlng_busy);
  
 
 
 
 
		
 initialLocation = new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng());
  map.setCenter(initialLocation);
/// setMarker(initialLocation);
  bounds.extend(initialLocation);
  
*/

 		 marker_busy.setPosition(latlng_busy);
		 map.setCenter(latlng_busy);
 
		 
		 
		/// map.panToBounds(bounds);   
		/// map.fitBounds(bounds);
		 

 
       if(i!=numDeltas){
            i++;
            setTimeout(moveMarker, 1);
        }
  
 
    }
  
   
  
  /*
              setTimeout(moveMarker,1);

	 */
 
	 
// document.getElementById('check_data_status_gps_lat').value=marker.getPosition().lat();
//document.getElementById('check_data_status_gps_lng').value=marker.getPosition().lng();	






/*
        var latlng_new = new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng());
		
		
		
  bounds.extend(latlng_new);
  


 		 marker.setPosition(latlng_new);
		 map.setCenter(latlng_new);

 */
		
		
 
		
 
 
 /*
		          var myOptions = {
                    zoom: 14,
                   center: latlng_free,
                    mapTypeControl: false,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
				
				
                var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);
*/
		           
					//	var image = 'share.png';   
				   
		 
   
		 
	


						
						
                   $("#geo_data").html('lat: '+marker.getPosition().lat()+'<br />long: '+marker.getPosition().lng());
                    });
                }
            }

            $(document).ready(function() {
                initialize();
            });
			function get_location() {
  if (Modernizr.geolocation) {
    navigator.geolocation.getCurrentPosition(show_map);
  } else {
    // no native support; maybe try a fallback?
  }
}
 
        </script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize">
</script>
    </body> 

</html>