<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK_844OwwsP8mVgvrAz0jTBs62Nq4uvow&sensor=false"></script>

<?
 
if($_GET[col_name] == 'driver_topoint'){
	$type_point = "ถึงสถานที่รับแขก";
}
if($_GET[col_name] == 'driver_pickup'){
	if($_GET[data_val] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[col_name] == 'driver_complete'){
	$type_point = "งานเสร็จ";
}
?>
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#googleMap { 
	width:100%;
	height:100%;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
<script>
var myCenter=new google.maps.LatLng(<?=$_GET[data_lat];?>,<?=$_GET[data_lng];?>);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var image = '1.png';

var marker=new google.maps.Marker({
  position:myCenter,
   icon: image
  });

marker.setMap(map);



var infowindow = new google.maps.InfoWindow({
 
  content:"<font style='font-size:18px'><?=$type_point;?>"
 
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" > </div>
</body>
</html>
