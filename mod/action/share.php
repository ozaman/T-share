 

  <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?><br>
 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 
        <div id="geo_data"></div>
        <div id="map_canvas" style="background: #f5f5f5; height:100px; width:100%; border:none"></div>

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
                 $("#geo_data").html('lats: '+location.latitude+'<br />longs: '+location.longitude);
				 
				 
				/// 

var url="popup.php?name=action&file=location";
	url=url+"&col_lat=<?=$_GET[col_name];?>_lat";
	url=url+"&lat="+location.latitude;
	url=url+"&col_lng=<?=$_GET[col_name];?>_lng";
	url=url+"&lng="+location.longitude;
	url=url+"&id=<?=$_GET[data_id];?>";
	url=url+"&data_vc=<?=$_GET[data_vc];?>";
	url=url+"&data_report_id=<?=$_GET[data_report_id];?>";
	url=url+"&data_sv=<?=$_GET[data_sv];?>";
	url=url+"&point=<?=$_GET[col_name];?>";
$("#send_data").load(url);
						
////alert(location.latitude);
						
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
                function setMarker(initialName) {
                    var marker = new google.maps.Marker({
                        draggable: true,
                        position: initialName,
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
		<script async defer src="http://ditu.google.cn/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize">
</script>
    </body>
</html> <div id="send_data"   style="display: nones">  
<script>





</script>
  