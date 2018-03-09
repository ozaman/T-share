 
 
 <br />
<br />
<br />
<br />

 	
	   <input type="hiddend" name="chat_to_lat_free" id="chat_to_lat_free" value="<?=$_GET[lat]?>"  style="width:100px " />
	<input type="hiddend" name="chat_to_lng_free" id="chat_to_lng_free" value="<?=$_GET[lng]?>"  style="width:100px " /> 
 
 
 
 <div style="display:none"><br>
 

<br>
<br>

<div id="load_direction"></div>
 
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.css?v=<?=time()?>">

 
  <?  include ("popup.php");?>
   <input type="hidden" name="chat_to_lat" id="chat_to_lat" value="<?=$_GET[lat]?>"  style="width:100px " />
	<input type="hidden" name="chat_to_lng" id="chat_to_lng" value="<?=$_GET[lng]?>"  style="width:100px " /> <br />
<br />


	</div>
 
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?> 
 
 
        </script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize">
</script>
<script type="text/javascript">


//alert(document.getElementById('check_data_status_gps_lat_old').value);
   
    var map = undefined;
    var marker = undefined;
  var position = [<?=$_GET[lat]?>,<?=$_GET[lng]?>];
  
    var position = [8.9110951,98.3042759];
  
  var position_free = [<?=$_GET[lat]?>,<?=$_GET[lng]?>];

    function initialize() {
 
            
        var latlng = new google.maps.LatLng(position[0], position[1]);
			
/// 8.1110951,98.3042759
		/// var latlng_free = new google.maps.LatLng(position_free[0], position_free[1]);
		 
		  var latlng_free = new google.maps.LatLng(position_free[0], position_free[1]);
		 
        var myOptions = {
 
            zoom: 16,
            center: latlng,
			//disableDefaultUI: true,
			    zoomControl: true,
    zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
 
 
	///
 var icon = {
   path: 'images/<?=$_GET[chat_from]?>.png?v=<?=time();?>',
   fillColor: '#0000FF',
   fillOpacity: .6,
 
   strokeWeight: 0,
   scale: 1,
   rotation: 180
}







	/// stand
		
      marker_busy = new google.maps.Marker({
       //     position: latlng,
	   center: latlng,
       map: map,
			icon: 'images/<?=$_GET[chat_from]?>.png?v=<?=time();?>',
 
 
            title: "Your current location!"
        }); 
		
		/// free
		
		     marker_free = new google.maps.Marker({
      position: latlng_free,
     		  map: map,
			      icon: 'images/<?=$_GET[chat_to]?>.png?v=<?=time();?>',
         	   title: "Your current location!"
     	   });
		   
		   
   
		   
		    google.maps.event.addListener(marker_busy, 'click', function(me) {
		   
		   	alert(latlng_free);
			
			
			
			});
		   
		   
		   
		   

        google.maps.event.addListener(map, 'click', function(me) {
		
		
	
            var result = [me.latLng.lat(), me.latLng.lng()];
			///map.panToBounds(bounds);  
 //alert(result);
 /////alert(me.latLng.lat());
  // transition_free(result_free);
transition(result);
  
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
        i = 0;
        deltaLat_free = (result_free[0] - position_free[0])/numDeltas;
        deltaLng_free = (result_free[1] - position_free[1])/numDeltas;
        moveMarker_free();
		/// initialize();
    }
    ///////
	///
    function moveMarker(){
        position[0] += deltaLat;
        position[1] += deltaLng;
		 bounds  = new google.maps.LatLngBounds();
        var latlng_busy = new google.maps.LatLng(position[0], position[1]);
  bounds.extend(latlng_busy);
  


 		 marker_busy.setPosition(latlng_busy);
		 map.setCenter(latlng_busy);
 
		 
		 
		/// map.panToBounds(bounds);   
		/// map.fitBounds(bounds);
		 
		 
        if(i!=numDeltas){
            i++;
            setTimeout(moveMarker, delay);
        }
    }
	
	///
	
	 function moveMarker_free(){
 
        position_free[0] += deltaLat_free;
        position_free[1] += deltaLng_free;
 var latlng_free = new google.maps.LatLng(position_free[0], position_free[1]);
		
		 marker_free.setPosition(latlng_free);
		//map.initialZoom = 16; 
 //map.fitBounds(bounds);      
//map.panToBounds(bounds);    
		/*
		   marker_free = new google.maps.Marker({
		   map: map,
      position: latlng_free,
	   title:"Hello World!"

     	   });
		   
		   */
 
 		 
		 
		 
 
        if(i!=numDeltas){
            i++;
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
			  
			 var result_free = [document.getElementById('chat_to_lat_free').value, document.getElementById('chat_to_lng_free').value];
			transition_free(result_free);
 /////alert(me.latLng.lat());
          
 //alert(result);
}, 1000); // 60000 milliseconds = one minute
</script>




<div id="map_canvas" style="width:100%; height:100%;"></div>




 
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 <script>
 
  $( document ).ready(function() {
 var url_chat_online = "<?=$chat_part?>../../../go.php?name=livechat/realtime&file=driver&vc=<?=$_GET[vc]?>&chat_from=<?=$_GET[chat_from]?>&chat_to=<?=$_GET[chat_to]?>&lang=<?=$_GET[lang]?>";
 
 
 url_chat_online =url_chat_online+"&to_lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_chat_online =url_chat_online+"&to_lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
 
  url_chat_online =url_chat_online+"&from_lat="+document.getElementById('chat_to_lat_free').value;
 url_chat_online =url_chat_online+"&from_lng="+document.getElementById('chat_to_lng_free').value;
 
 
  $('#load_driver').load(url_chat_online);
  
   });
 
 
  setInterval(function() {
 
 
 //$('#load_check_gps').load('realtime.php');
 $( document ).ready(function() {

 
  ////// direction
  
  
   var url_chat_online = "<?=$chat_part?>../../../go.php?name=livechat/realtime&file=direction&vc=<?=$_GET[vc]?>&chat_from=<?=$_GET[chat_from]?>&chat_to=<?=$_GET[chat_to]?>&lang=<?=$_GET[lang]?>";
 
 
 url_chat_online =url_chat_online+"&to_lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_chat_online =url_chat_online+"&to_lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
 
  url_chat_online =url_chat_online+"&from_lat="+document.getElementById('chat_to_lat_free').value;
 url_chat_online =url_chat_online+"&from_lng="+document.getElementById('chat_to_lng_free').value;


$('#load_direction').load(url_chat_online);
 
  
  });
  
  }, 1000); //
  
 
	</script>
 
 <div  class="bottom_popup"  style="display:nones" id="preview_person"> 
 
<div id="load_driver">


</div>


 
 </div>
 
 <div id="show_person" style="position:fixed; background-color:#FFFFFF; margin-top:-30px; height:30px; padding:10px; right:0; width:80px;   "><b>View Detail </b></div>
    <script>
 
$('#show_person').click(function(){  
 
 $( "#preview_person" ).slideToggle();
 
});


$('#preview_person').click(function(){  
 
 $( "#preview_person" ).slideToggle();

});
 
 
 </script>
 
</a>
 <style>
.bottom_popup
{ 
font-size:22px;   padding:0px;  color:#666666;  width:100%; background-color:#F6F6F6;      
 border-bottom: 0px solid #e5e5e5; margin-bottom: 0px; padding-bottom:0px;
 
position: fixed;
  bottom:  0;
 
 box-shadow: 1px 1px 10px #999999;
  left: 0; z-index:99990;
 
}
.bottom-popup-icon {
font-size:24px; color:#B4B4B4; margin-bottom:1px;

}

.bottom-popup-icon-active {
font-size:24px; color:<?=$main_color?>;  

}

 </style> 
 
 <style>
.back_popup_alert
{ 
font-size:22px;   padding:2px;  color:#FFFFF;  width:100%;  background-color: #464646;
 border-bottom: 0px solid #ffffff; margin-bottom: 0px; margin-top:55px;
 
    position: fixed;
  top:  0;  
 
 box-shadow: 1px 1px 10px #999999;
  left: 0; z-index:999;
 
}
 </style>
 
 
 