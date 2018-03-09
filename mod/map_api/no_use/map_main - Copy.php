<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
     /* html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/
       .popup-tip-anchor {
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
      }
      /* The bubble is anchored above the tip. */
      .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      /* Draw the tip. */
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
      /* The popup bubble itself. */
      .popup-bubble-content {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the info window. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
      .button-select{
	  		
	  }
    </style>
  </head>
  <body>
    <div id="map" ></div>
    <div id="box_to_create">
	    <!--<div id="content0">
	      Hello world!
	    </div>
	    <div id="content1">
	      Hello world! 2
	    </div>-->
    </div>
	<input type="hidden" value="<?=$_GET[province];?>" id="select_pv"/>
	<input type="hidden" value="<?=$_GET[user_id];?>" id="user_id"/>
    <script>
   
       var map, infoWindow;
       var markerCircle ;
       var circle;
       var markerPlace;
       var pv = $('#select_pv').val();
       var marker;
	   var txt_select = 'เลือก';	
      
      function initMap() {
      	
        map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 7.9038781, lng: 98.3033694 },
        zoom: 12,
        mapTypeControl: false,
        mapTypeId: 'roadmap',
        //   gestureHandling: 'coopergreedyative'
        gestureHandling: 'greedy',
        streetViewControl: false,
        fullscreenControl: false,
        styles: [{
                "featureType": "administrative",
                "stylers": [{
                    "weight": 2
                }]
            },
            	{
                "featureType": "landscape",
                "stylers": [{
                    "color": "#efefef"
                }]
            },
            	{
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#d3d3d3"
                }]
            },
            	{
                "featureType": "landscape",
                "elementType": "labels.text",
                "stylers": [{
                        "color": "#595959"
                    },
                    {
                        "weight": 3.5
                    }
                ]
            },
            	{
                "featureType": "landscape",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            	{
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#c0c0c0"
                }]
            }
        ]
    });   
        
		setMarker();
       	 
 		 
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			markerCircle.setPosition(pos);
            map.setCenter(pos);
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
        infoWindow.open(map);
      }
      
      function setMarker(){
		markerCircle = new google.maps.Marker({
	        position: map.getCenter(),
	        icon: {
	            path: google.maps.SymbolPath.CIRCLE,
	            scale: 6.5,
	            fillOpacity: 1,
	            strokeWeight: 1,
	            fillColor: '#1b8cfe',
	            strokeColor: '#ffffff'
	        },
	        draggable: false,
	        map: map
	    });
	    circle = new google.maps.Circle({
	        strokeColor: '#2673f2',
	        strokeOpacity: 0.2,
	        strokeWeight: 1,
	        fillColor: '#4285F4',
	        fillOpacity: 0.25,
	        map: map,
	        radius: Math.sqrt(1) * 30
	    });
	    circle.bindTo('center', markerCircle, 'position');
	    
	    var infowindow = new google.maps.InfoWindow({maxWidth: 700});
	     $.ajax({
            type: 'POST',
            url: 'mod/map_api/query_data_map.php?request=place',
            data: { 'province': pv },
            success: function(res) {
            	var obj = JSON.parse(res);
				console.log(obj);

				$.each(obj.data, function (key, val) {
					console.log(val);
			        var position = new google.maps.LatLng(val.main.lat, val.main.lng);
					 markerPlace = new google.maps.Marker({
			            position: position,
			            map: map,
//			            label: val.id,
			            icon : { 
			            		url: 'https://maps.gstatic.com/mapfiles/place_api/icons/shopping-71.png',
			            		scaledSize: new google.maps.Size(30, 30), // scaled size
  								origin: new google.maps.Point(0,0), // origin
    							anchor: new google.maps.Point(0, 0) // anchor
			            }
			        });
			         google.maps.event.addListener(markerPlace, 'click', (function(markerPlace, key) {
				        return function() {
				        	var txt_div = '';
				        	$.each(val.opentime, function (index, value) {
				          			console.log(value);
				          			txt_div += '<tr><td>'+value.product_day+'</td><td>เวลา</td><td>'+value.start_h+'.'+value.start_m+' น. - '+value.finish_h+'.'+value.finish_m+' น.</td>'+'</tr>';
			
				          		});

				          infowindow.setContent('<div><strong>'+val.main.topic_en+'</strong><br/><strong>'+val.main.topic_th+'</strong><br/>'+'<img src="../data/pic/place/'+val.main.id+'_logo.jpg" width="100px" style="border-radius: 15px; border: 1px solid #ddd; margin-bottom:5px;"><div id="text_open_'+val.main.id+'">++</div>'+'<div style="margin-top:5px;"><table>'+txt_div+'</table></div><br/>'+'<span id="time_open_'+val.main.id+'">sss</span><br/>'+'<button style="width: 100%;margin-top: 0px;margin-bottom: 5px;border-radius:20px;background-color:#3b5998;" class="btn btn-danger btn-sm" onclick="SelectPlace('+val.main.id+');">'+txt_select+'</button>'+'</div>'
				          );
				          
setInterval(function() {
 var url_check_data_time = "go.php?name=shop/load&file=time_open_map&id="+val.main.id;
 $('#time_open_'+val.main.id).load(url_check_data_time);
}, 1000);
				          infowindow.open(map, markerPlace);
				          
				        }
				      })(markerPlace, key));
	
			    });
            }
        });

	  }

    </script>
    
    <script>
    	function SelectPlace(placeId){
    		console.log(placeId);
			

			 $( "#load_mod_popup_3" ).toggle();
			  
			 var user_id = $('#user_id').val();
			 var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver="+user_id+"&place="+placeId;

//			  $('#load_mod_popup_3').html(load_main_mod);

			///  $( "#main_index_load_page" ).toggle();
			  
			  $('#load_mod_popup_3').html(load_main_mod);
			  $('#load_mod_popup_3').load(url_load); 
		}
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&callback=initMap&libraries=places">
    </script>
  </body>
</html>