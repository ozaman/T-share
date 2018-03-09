 <?
$gps_icon_color="#FFED22";
?>
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
<style>
 
  
@-webkit-keyframes gps-color {
    0%   { color: <?=$gps_icon_color?> }
    25%  { color: white; font-size:30px; }
	50%   { color: <?=$gps_icon_color?> }
	75%  { color: white; font-size:30px; }
    100% { color: <?=$gps_icon_color?> }
 
}

 @-moz-keyframes gps-color {
     0%   { color: <?=$gps_icon_color?> }
    25%  { color: white; font-size:30px; }
	50%   { color: <?=$gps_icon_color?> }
	75%  { color: white; font-size:30px; }
    100% { color: <?=$gps_icon_color?> }
 
 
	
}
.gps-status-icon {
     
 font-size:30px;
 
	  
	  
	 	  -webkit-transition: all 2s;
	   -moz-animation: gps-color 2s infinite;
	  
      -webkit-transition: all 2s;
    -webkit-animation: gps-color 2s infinite;
}
</style> 


<input type="hidden" name="check_data_status_gps_lat_old" id="check_data_status_gps_lat_old" value="0"  style="width:100px " /> 
  <input type="hidden" name="check_data_status_gps_lng_old" id="check_data_status_gps_lng_old" value="0"  style="width:100px " />



 


<script>





document.getElementById('check_data_status_gps_lat').value=document.getElementById('check_data_status_gps_lat_old').value;
document.getElementById('check_data_status_gps_lng').value=document.getElementById('check_data_status_gps_lng_old').value;

</script>
 
 <input type="hidden" name="check_data_status_gps" id="check_data_status_gps" value="1"  style="width:20px " /> 
  
 
 
  <input type="hidden" name="check_data_status_gps_lat" id="check_data_status_gps_lat" value="0"  style="width:100px " /> 
  <input type="hidden" name="check_data_status_gps_lng" id="check_data_status_gps_lng" value="0"  style="width:100px " /> 
  
 
<div id="load_map_main" style="display:none"> </div>


 

<script>

 /// enableHighAccuracy: false

getLocationCheck();
var x = document.getElementById("load_map_main");



function getLocationCheck() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
 

document.getElementById('check_data_status_gps_lat').value=position.coords.latitude;
document.getElementById('check_data_status_gps_lng').value=position.coords.longitude;

document.getElementById('check_data_status_gps_lat_old').value=position.coords.latitude;
document.getElementById('check_data_status_gps_lng_old').value=position.coords.longitude;

$( "#main_gps_status" ).addClass( "gps-status-icon");
	///swal.close();
 
    x.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
 
 //$("#icon_gps_status").attr("src", "images/logo/gps/gps_on.gif");
  //// $("#icon_gps_status").attr("src", "images/logo/gps/gps_on.png");
 
 
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
		 document.getElementById('check_data_status_gps').value=0 ;
		 
		  x.innerHTML = "No"
 
            break;
        case error.POSITION_UNAVAILABLE:
              x.innerHTML = "Location information is unavailable."
			// alert(0);
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
	
	
	///alert(x.innerHTML );
	
}
 
 
 
 
 
 setInterval(function() {
 
getLocationCheck();
		 
}, 5000); // 60000 milliseconds = one minute
 
 
 
</script>
 
 

<script async defer
src="https://maps.googleapis.com/maps/api/js?v=3.29&key=<?=$google_api?>&sensor=false">
</script>
 