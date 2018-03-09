  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <?	
	 //Change address format
    $formattedAddrFrom = str_replace(' ','+','โกลเด้น+บีช+ทัวร์');
    $formattedAddrTo = str_replace(' ','+','ท่าอากาศยานภูเก็ต');
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=7.807111,98.2974043&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
  $outputTo = json_decode($geocodeTo);
	 
	 
	     //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location_type;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
   $longitudeTo = $outputTo->results[0]->geometry->location->lng;


    ////////// 

	//$latitudeFrom =7.807111;
  //  $longitudeFrom = 98.2974043;
  $latitudeTo ='8.1110951';
  $longitudeTo = '98.3042759';
	$unit == "K";
//Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
     $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
	
	//echo $total=$miles * 1.62;
   
	///echo $total;
?>
 
 



<style type="text/css">
        .label_content{
      position:relative;
      border-radius: 5px;
      padding:5px;
      color:#ffffff;
      background-color: red;
      font-size: 20px;
      width: 100%;
      line-height: 20px;
      text-align: center;
      }

      .label_content:after {
      content:'';
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -10px;
      width: 0;
      height: 0;
      border-top: solid 10px red;
      border-left: solid 10px transparent;
      border-right: solid 10px transparent;
      }
	  
	  
	  .labels {
  color: red;
  background-color: #000000;
  font-family: "Lucida Grande", "Arial", sans-serif;
  font-size: 10px;
  font-weight: bold;
  text-align: center;
  width: 100px;
  border: 0;
}
    </style>
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=<?=$google_api?>"></script>
<div id="map_canvas"></div>




<script>
var locations = [







 
  ['Katathani Phuket Beach Resort', 7.807111,98.2974043,1, '1'],
  <?if(1==1){ ?>
  ['Hilton Phuket Arcadia Resort And Spa', 7.8386936, 98.2950669,1, '2'],
  
  <? } ?>
  
   ['Phuket Simon Cabaret', 7.8787672,98.2899071,0, '3'],
  ['The Surin Phuket', 7.981048,98.2754923,0, '4'],
  
  
  
  
  
  
];
var map;
var markers = [];

function init(){

 
  map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 12,
    center: new google.maps.LatLng(7.807111, 98.2974043),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var num_markers = locations.length;
  
  
  var image_yes = 'google/icon/yes.png?v=2';
    var image_no = 'google/icon/no.png?v=2';
	
	 	/// var image_no = 'google/share.png';

  
  for (var i = 0; i < num_markers; i++) {  
  
  
  //// info window
	  
 var place = locations[i][0];
 var location= locations[i][3];
 var province= locations[i][4];   
  var id= locations[i][5];
 
  
 
  
  if(locations[i][3]==1){ image=image_yes; }  
  
   if(locations[i][3]==0){ image=image_no; }
  
  
  
    markers[i] = new google.maps.Marker({
		

 
 
	label: {
	 background:'#000000',
    color: '#000000',
    fontWeight: 'bold',
	strokeWeight: '4',
	
	strokeColor: '#ffffff',
	
    text: locations[i][0],
	labelClass: "labels", // the CSS class for the label
  },
	
 
 
	
      position: {lat:locations[i][1], lng:locations[i][2]},
      map: map,
	  icon: image,
	  text: locations[i][0],
	  
	  title: locations[i][0],
 ///     html: "51455454554545454",
	  labelContent: locations[i][0],
	  labelClass: "labels", // the CSS class for the label
	  
 
      id: i,
	  
 
    });
      

	  ///// 
	  
	///  google.maps.event.addListener(markers[i], "click", function (e) { info[i].open(map, this); });
	  
	  
 
	  
	  
    google.maps.event.addListener(markers[i], 'click', function() {
		
 /// alert(i);
 
      google.maps.event.addListenerOnce(infowindow, 'closeclick', function(){
        markers[this.id].setVisible(true);
      });
      this.setVisible(false);
      infowindow.open(map);
    });
  }
}

init();

</script>

<style>

#map_canvas { 
  border:0px solid black;
  height: 100%;
  width: 100%;
  border-radius: 4px;
}
</style>