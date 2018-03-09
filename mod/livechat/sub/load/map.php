 
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 45px;
   
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #F6F6F6;
        text-align: left;
        
        line-height: 30px;
        padding-left: 10px; width:100%;
      }
    </style>
  </head>
  <body>
  <div id="floating-panel"><? //=$_GET[address]?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100"><b>Start :</b></td>
        <td><select name="select" id="start" style="width:100%; height:30px;">
          <option value="<?=$_GET[address]?>">ตำแหน่งของคุณ</option>
           <option value="Karon View Point, phuket">Karon View Point</option>
          <option value="Chalong Temple, phuket">Chalong Temple</option>
		    <option value="Promthep Cape, phuket">Promthep Cape</option>
 
        </select></td>
      </tr>
      <tr>
        <td><b>Destination :</b></td>
        <td><select name="select2" id="end" style="width:100%; height:30px;">
 
          <option value="Karon View Point, phuket">Karon View Point</option>
          <option value="Chalong Temple, phuket">Chalong Temple</option>
          <option value="Promthep Cape, phuket">Promthep Cape</option>
 
 
        </select></td>
      </tr>
    </table>
    </div>
    <div id="map"></div>
    <script>
	
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: <?=$_GET[lat]?>, lng: <?=$_GET[lng]?>}
        });
        directionsDisplay.setMap(map);

 
	  
	          var onChangeHandler2 = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('click', onChangeHandler2);
        document.getElementById('end').addEventListener('click', onChangeHandler2);
      }
	  
	
	  
	//  calculateAndDisplayRoute(document.getElementById('start').value,document.getElementById('end').value);
	  
	  
	  
	  
	  

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, 
		
		
		function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
           directionsDisplay.setDirections(response);
		   // window.alert('Directions request failed due to ' + status);
          }
        });
		
		
      }
	 
 
	     $('#start').click();
	   
	
    </script>
	<? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?=$google_api?>&callback=initMap">
    </script>
 