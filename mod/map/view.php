 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>

<?
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."' limit 1");
 $arr[to] = $db->fetch($res[to]);
  
?>
 
<? if($arr[to][driver_topoint] != 0 && $arr[to][driver_topoint] != '' or 1==1){ ?>
 <?
//echo $_GET[type];
 
if($_GET[type] == 'driver_topoint'){

 

	$type_point = "ถึงสถานที่รับแขก";
	$data_point = "topoint";
 

	
}





if($_GET[type] == 'driver_checkcar'){

 

	$type_point = "ตรวจเช็คสัมภาระภายในรถ";
	$data_point = "checkcar";
 

	
}


if($_GET[type] == 'driver_pickup'){
	$data_point = "pickup";
	
	
	
	
	
	if($_GET[data_val] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[type] == 'driver_complete'){
	$data_point = "complete";
	$type_point = "งานสำเร็จ";
}
?>
<?
$data_lat=$arr[to][driver_.$data_point._lat];
$data_lng=$arr[to][driver_.$data_point._lng];
 
?>
<style>
	#load_work_preview_map {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
	background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF
}
</style>
 
 <script>
 $('#button_map_<?=$_GET[type] ?>_<?=$_GET[bookid]?>').click(function(){  
 
 
 
 
 
 

$( "#popup_work_preview_map" ).toggle();

//$('#tab_to_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#load_work_preview_map').addClass("map-page-loader");

 $("#head_full_popup_map").html('<?=$type_point?>');
  
 ///$("#load_work_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0"  src="https://maps.google.com/maps?q=<?=$data_lat?>,<?=$data_lng?>&z=15&output=embed&key=<?=$google_api?>"></iframe>');
 
 
 
 
  $("#load_work_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?=$google_api?>&q=<?=$data_lat?>,<?=$data_lng?>&zoom=14" allowfullscreen></iframe>');
 
 ///$('#load_work_preview_map').removeClass("map-page-loader");
 
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$data_lat?>,<?=$data_lng?>&sensor=false&language=th";
$.getJSON(url, function (data) {
    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;
 
	  $( "#load_work_preview_map_address" ).html(adress);
    }
});
 
 
 

});
 
 </script>
 
   



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="button_map_<?=$_GET[type] ?>_<?=$_GET[bookid]?>"  style="cursor:pointer;margin-left:-15px; "    >
        <a><table  >
      <tr>
        <td width="25" valign="top"><img src="images/icon_map/map_pin.png" width="20" /></td>
        <td><div align="left" id="date_topiont<?=$arr[to][id];?>" style="font-size:12px; ">
            <? 
			$arr[to][driver_.$data_point._date] = $arr[to][driver_.$data_point._date] - 25200 ;
			echo ThaiTimeConvert($arr[to][driver_.$data_point._date],'1','1');
			?>
        </div></td>
      </tr>
    </table></a>
 </div></td>
    <td width="30"><i class="fa  fa-camera" style="color:#999999; font-size:22px"></i></td>
  </tr>
</table>

    <?	
}
?>





     <?	
	 //Change address format
    $formattedAddrFrom = str_replace(' ','+','โกลเด้น+บีช+ทัวร์');
    $formattedAddrTo = str_replace(' ','+','ท่าอากาศยานภูเก็ต');
	
	
	
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=patong&sensor=false');
  $outputTo = json_decode($geocodeTo);
	 
	 
	 
	 
	 
	     $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
	     //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
	
	
	
	
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
   $longitudeTo = $outputTo->results[0]->geometry->location->lng;
	 //////////













	$latitudeFrom =$data_lat;
    $longitudeFrom = $data_lng;
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
	
	$total=$miles * 1.62;
   
	///echo $total;
?>
 