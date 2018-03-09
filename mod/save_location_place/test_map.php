
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 300px;
        width:  510px;
      }
      /* Optional: Makes the sample page fill the window. */
   
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
        
      }
	.pac-container {
        z-index: 10000 !important;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 350px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>

    <input id="pac-input" class="controls" type="text" placeholder="ค้นหาสถานที่"  value="<?=$_GET[boxPlace]?>"/>
    <div id="map"></div>
	<input id="lat" type="hidden" value="<?=$_GET[lat]?>"/>
	<input id="lng" type="hidden" value="<?=$_GET[lng]?>"/>
	<input id="boxPlace" type="hidden" value="<?=$_GET[boxPlace]?>"/>
	<input id="type" type="hidden" value="<?=$_GET[type]?>"/>
	<input id="sub" type="hidden" value="<?=$_GET[sub]?>"/>
<script>
initAutocomplete();
	 function initAutocomplete(lat_db,lng_db,boxPlace,type) {
      	var lat_db = $('#lat').val();
      	var lng_db = $('#lng').val();
      	var boxPlace = $('#boxPlace').val();
      	var type = $('#type').val();
      	var sub_action = $('#sub').val();
      	
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 8.1110951, lng: 98.34020400000009},
          zoom: 13,
          mapTypeId: 'roadmap',
          disableDefaultUI: true,
          fullscreenControl : true,
          scaleControl: true,
          streetViewControl: true
        });
		console.log(lat_db);
		console.log(lng_db);

		var marker = new google.maps.Marker({
       		 map: map
       		 
    	});
//    	if((lat_db != "" && lng_db !="") && (lat_db != undefined && lng_db !=undefined) ){
    	
				/*var latlng = { lat: parseFloat(lat_db), lng: parseFloat(lng_db) };
				map.panTo(latlng);
				var dbPosition = new google.maps.LatLng(latlng);
				marker.setPosition(dbPosition);*/
			
//		}

		if((lat_db != 'undefined' && lng_db !='undefined')&&lat_db != '' && lng_db !='') {
			var latlng = { lat: parseFloat(lat_db), lng: parseFloat(lng_db) };
				map.panTo(latlng);
				var dbPosition = new google.maps.LatLng(latlng);
				marker.setPosition(dbPosition);
//				alert(222);
		}else{
			if(sub_action){
				
			}else{
				swal("ตำแหน่งผิดพลาด!");
			}
			
		}
		
        var input_search = document.getElementById('pac-input');
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input_search);
		
		var autocompleteStart = new google.maps.places.Autocomplete(input_search);
    autocompleteStart.bindTo('bounds', map);
    autocompleteStart.addListener('place_changed', function(ev) {
        var place = autocompleteStart.getPlace();
        console.log(place);
        map.panTo(place.geometry.location);
        map.setZoom(15);
		marker.setPosition(place.geometry.location);
			$('#lat').val(place.geometry.location.lat());
			$('#lng').val(place.geometry.location.lng());
//			$('#map_url').val(place.url);
		
       console.log(place.geometry.location.lat()+" : "+place.geometry.location.lng());
    });
		


      }
</script>
