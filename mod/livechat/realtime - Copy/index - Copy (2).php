 <div style="display:nones ">
 <?=$_GET[vc]?>
  <?  include ("popup.php");?>
   <input type="hiddend" name="chat_from_lat" id="chat_from_lat" value="<?=$_GET[lat]?>"  style="width:100px " />
	<input type="hiddend" name="chat_from_lng" id="chat_from_lng" value="<?=$_GET[lng]?>"  style="width:100px " /> </div>
 
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?> 
 
 
        </script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize">
</script>
<script type="text/javascript">
//alert(document.getElementById('check_data_status_gps_lat_old').value);
   
    var map = undefined;
    var marker = undefined;
    var position = [<?=$_GET[lat]?>,<?=$_GET[lng]?>];

    function initialize() {
            
        var latlng = new google.maps.LatLng(position[0], position[1]);
		 var latlng_free = new google.maps.LatLng(position[0], position[1]);
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
	///
        marker = new google.maps.Marker({
            position: latlng,
       map: map,
			      icon: 'images/<?=$_GET[chat_from]?>.png?v=<?=time();?>',
            title: "Your current location!"
        });
		
		
		        marker_free = new google.maps.Marker({
            position: latlng_free,
     		  map: map,
			      icon: 'images/customer.png?v=<?=time();?>',
         	   title: "Your current location!"
     	   });
    
        google.maps.event.addListener(map, 'click', function(me) {
            var result_free = [me.latLng.lat(), me.latLng.lng()];
			
 
 /////alert(me.latLng.lat());
  transition_free(result_free);
// transition(result);
  
        });
    }
    
    var numDeltas = 500;
    var delay = 1; //milliseconds
    var i = 0;
    var deltaLat;
    var deltaLng;
	//////
    function transition(result){
        i = 0;
        deltaLat = (result[0] - position[0])/numDeltas;
        deltaLng = (result[1] - position[1])/numDeltas;
        moveMarker();
		/// initialize();
    }
	///// _free
	    function transition_free(result_free){
        f = 0;
        deltaLat_free = (result_free[0] - position[0])/numDeltas;
        deltaLng_free = (result_free[1] - position[1])/numDeltas;
        moveMarker_free();
		/// initialize();
    }
    ///////
	///
    function moveMarker(){
        position[0] += deltaLat;
        position[1] += deltaLng;
        var latlng = new google.maps.LatLng(position[0], position[1]);
 
		 marker.setPosition(latlng);
        if(i!=numDeltas){
            i++;
            setTimeout(moveMarker, delay);
        }
    }
	
	///
	
	 function moveMarker_free(){
        position[0] += deltaLat_free;
        position[1] += deltaLng_free;
     	var latlng_free = new google.maps.LatLng(position[0], position[1]);
 		// marker.setPosition(latlng_free);
		 
		      marker_free = new google.maps.Marker({
            position: latlng_free,
			   });
			
			
		 
		 ////
		 /*
		     marker_free = new google.maps.Marker({
            position: latlng_free,
     		  map: map,
			      icon: 'images/customer.png?v=<?=time();?>',
         	   title: "Your current location!"
     	   });
		   */
		 ///
		 
		 
 
        if(f!=numDeltas){
            f++;
            setTimeout(moveMarker_free, delay);
        }
    }
	
	
	
	
    
        $(document).ready(function() {

    initialize();
 
});


 setInterval(function() {
 ////// อัพเดทตำแหน่งตัวเอง 
 /*
 var me.latLng.lat()=document.getElementById('chat_lat').value;
 var me.latLng.lng()=document.getElementById('chat_lng').value;
     */
 
            var result = [document.getElementById('check_data_status_gps_lat_old').value, document.getElementById('check_data_status_gps_lng_old').value];
			  transition(result);
			  
			 var result_free = [document.getElementById('check_data_status_gps_lat_old').value, document.getElementById('check_data_status_gps_lng_old').value];
			 transition_free(result_free);
 /////alert(me.latLng.lat());
          
 //alert(result);
}, 1000); // 60000 milliseconds = one minute
</script>

<div id="map_canvas" style="width:100%; height:100%;"></div>

 