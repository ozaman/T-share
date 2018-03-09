 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?><br>
 
  <script type="text/javascript" src="jquery.min.js"></script>
 
        <div id="geo_data" style="display:none "></div>
        <div id="map_canvas" style="background: #f5f5f5; height:240px; width:100%x; border:none; margin-top: -20px;border-radius: 30px;"></div>

        <script type="text/javascript">
        var initialLocation;
            var bangkok = new google.maps.LatLng(13.6251869,100.417181);
            function initialize() {
                var myOptions = {
                    zoom: 12,
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
                 $("#geo_data").html('lats: '+location.latitude+'<br />longs: '+location.longitude);
						
 
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+location.latitude+","+location.longitude+"&sensor=false&language=th";
$.getJSON(url, function (data) {
    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;
		///	   alert(location.latitude);
 
	  $( "#load_work_preview_map_address" ).html(adress);
 
 
    }
});
						
                        initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
                        map.setCenter(initialLocation);
                        setMarker(initialLocation);
                    }, function() {
                        handleNoGeolocation();
                    });
                } else {
                    handleNoGeolocation();
                }
        // no geolocation
                function handleNoGeolocation() {
                    map.setCenter(bangkok);
                    setMarker(bangkok);
                $("#geo_data").html('lat: 13.755716<br />long: 100.501589');
					// window.location = "alert_location.php";
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
        
        <div id="load_work_preview_map_address" style="margin-top:5px; font-family:arial; font-size:13px;"></div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize">
		
		
		
		
		

		
		
		
		
</script>
    </body> 

</html>