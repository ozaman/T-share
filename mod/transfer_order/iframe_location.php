<style>
 .gmnoprint{
	  	display: none !important;
	  }
	  img[src^="https://maps.gstatic.com/mapfiles/api-3/images/google_white5_hdpi.png"]{
	  	display: none !important;
	  }
</style>
<script>
	$('#text_mod_topic_action_map-txt').html('นำทาง');
</script>
<div style="
    height: 100vh;
    /* padding: 5px; */
    width: 100%;
    /* height: 300px; */
    position: relative;
    overflow: hidden; " id="load_location_gps"> 
  
</div>

<script>

   console.log(<?=$_GET[lat_f];?>)
   console.log(<?=$_GET[lng_f];?>)
   console.log(<?=$_GET[lat_t];?>)
	console.log(<?=$_GET[lng_t];?>)
	$(".text-topic-action-mod-1" ).html("ตำแหน่งสถานที่รับ-ส่ง");
   var dis = "https://www.google.com/maps/embed/v1/directions?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&origin="+lat_f+","+lng_f+"&center="+lat_t+","+lng_t+"&avoid=tolls|highways&zoom=12?hl=th";
   console.log(dis)
     $('#map_location').attr('src', dis);
     initialize()
     function initialize() {
    var mapMinZoom = 13;
    var mapMaxZoom = 18;
    map = new google.maps.Map(document.getElementById('load_location_gps'), {
        center: { lat: 7.9038781, lng: 98.3033694 },
        zoom: 12,
        mapTypeControl: false,
        mapTypeId: 'roadmap',
        //          gestureHandling: 'coopergreedyative'
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
    ditance(map);
}
function ditance(map){
   createAllMarker();
    google.maps.event.addListener(map, 'dragend', function() {
        $('#btn_CurrentLocation').show('500');
    });
    if (navigator.geolocation) {
        options = { enableHighAccuracy: true, timeout: 6000 };
        navigator.geolocation.getCurrentPosition(function(position, status) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            start = pos;           
            console.log(start);           
            markerCircle.setPosition(pos);
            var curPosition = new google.maps.LatLng(pos);
            console.log(map.getCenter());
            /*  markerTest.setPosition(curPosition);*/
            map.setCenter(pos);
            $('#marker').show();
            geocoder = new google.maps.Geocoder;
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            lat_f =position.coords.latitude;
            lng_f =position.coords.longitude;            
            console.log(lat_f);
            console.log(lng_f);
            var latlng = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
            geocoderRun(latlng);
            var id = 0,
                target;
        });
     }
    var froms = {
            lat: parseFloat(<?=$_GET[lat_f];?>),
            lng: parseFloat(<?=$_GET[lng_f];?>)
        };
        bookplace = froms;
        var current = {
            lat: parseFloat(<?=$_GET[lat_t];?>),
            lng: parseFloat(<?=$_GET[lng_t];?>)
        };
        taxistart = current;

        var request = {
            origin: taxistart,
            destination:  bookplace,
            travelMode: google.maps.TravelMode.DRIVING
        };
      startMarker.setVisible(true);
        startMarker.setPosition(bookplace);
        endMarker.setVisible(true);
        endMarker.setPosition(taxistart);
        console.log(request);
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer();
         directionsDisplay.setMap(map);
        directionsService.route(request, function(response, status) {
            console.log(response);
            console.log(status);
            if (status == 'ZERO_RESULTS') {
                // alert('no Directions Display');
                $('#no_pin_pop').show(500)
            } else{
               
                var distance = response.routes[0].legs[0].distance.text;
                var duration = response.routes[0].legs[0].duration.text;
                console.log(response.routes[0].legs[0].end_location.lat())
                console.log(response.routes[0].legs[0].end_location.lng())
                lat_t = response.routes[0].legs[0].end_location.lat();
                lng_t = response.routes[0].legs[0].end_location.lng();
               
                var radlat1 = Math.PI * lat_f / 180
                var radlat2 = Math.PI * lat_t / 180
                var theta = lng_f - lng_t;
                var radtheta = Math.PI * theta / 180
                dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180 / Math.PI
                dist = dist * 60 * 1.609344;
                  console.log(distance)
                console.log(duration)
                // $('#edit_pin_pop').show(500);                
                infowindowDetailTravel = new google.maps.InfoWindow({ maxWidth: 200 });
                infowindowDetailTravel.setContent('<div><p>ระยะทาง'+' '  + distance + '</p><p>เวลา' +' ' + duration + '</p></div>');
                infowindowDetailTravel.open(map, endMarker);
                directionsDisplay.setDirections(response);
                directionsDisplay.setOptions({
                    suppressMarkers: true,
                    preserveViewport: true
                });
                if (response.routes[0].legs[0].distance.value >= 25000) {
                    map.setZoom(9);
                } else {
                    map.setZoom(12);
                }
                $('#clear-all').show(500);
                // outSearchRealtime(); 
            }
         });
}
var base_url = 'https://www.welovetaxi.com/app/demo2';
function createAllMarker() {
    pin = {
        url: base_url+'pic/marker_often.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(45, 45)
    };
    markerPlaceOfften = new google.maps.Marker({
        map: null
    });
    markerPlaceOfften.setVisible(false);
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
        draggable: true,
        map: map
    });

    var circle = new google.maps.Circle({
        strokeColor: '#2673f2',
        strokeOpacity: 0.2,
        strokeWeight: 1,
        fillColor: '#4285F4',
        fillOpacity: 0.25,
        map: map,
        radius: Math.sqrt(1) * 30
    });
    circle.bindTo('center', markerCircle, 'position');
    endMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        anchorPoint: new google.maps.Point(0, -29),
        label: "B"
    });
    startMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        anchorPoint: new google.maps.Point(0, -29),
        label: "A"
    });
}
function geocoderRun(latlng) {
    geocoder.geocode({ 'location': latlng }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                placeStart = results;
                console.log(placeStart)
                addr = placeStart[1].formatted_address;
            }
        } else {
            if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                setTimeout(function() { console.log(status) }, 9000);
            }
        }
    });
    // nearbyPlace(map, latlng, "");
    // filterPlace(map, latlng);
}
</script>