ss<script src="location/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8"></script>
<script type="text/javascript" src="location/jquery.googlemap.js"></script>

<div id="map" style="width: 300px; height: 300px;"></div>
 


<div id="map" style="width: 300px; height: 300px;"></div>
<script type="text/javascript">
  $(function() {
    $("#map").googleMap();
    $("#map").addMarker({
    	address: "15 avenue des champs Elysées 75008 Paris", // Postal address
    	success: function(e) {
    	    $("#latitude").val(e.lat);
    	    $("#longitude").val(e.lon);
    	}
	});
  })
</script>