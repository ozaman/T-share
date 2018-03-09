
<?
//echo $_GET[lat]."<br />";
//echo $_GET[lng];

if($_GET[type] == 'driver_topoint'){
	$type_point = type_driver_arrived;
}
if($_GET[type] == 'driver_pickup'){
	$type_point = type_driver_onthevehicle;
}
if($_GET[type] == 'driver_complete'){
	$type_point = type_driver_complete;
}
?>
<div style="width: 100%">
<iframe 
width="100%" 
height="600" 
src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=590&amp;hl=en&amp;
coord=<?=$_GET[lat];?>,<?=$_GET[lng];?>&amp;
q=(<?=$type_point;?>)+(Driver%20Point)&amp;
ie=UTF8&amp;
t=&amp;
z=16&amp;
iwloc=A&amp;
output=embed" 
frameborder="0" 
scrolling="no" 
marginheight="0" 
marginwidth="0">

 

</iframe>

</div>
 
 