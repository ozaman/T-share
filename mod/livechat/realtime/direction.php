
<style>
 
 @-webkit-keyframes DIV-BORDER {
 border: 3px solid;  
    0%   { border-color: #FF0000; background-color:#FFFFCC }
    50%  { border-color: #FF0000; background-color:#FFFFFF }
    100% { border-color: #FF0000; background-color:#FFFFCC }
 
}

 @-moz-keyframes DIV-BORDER {
 border: 3px solid;  
 
    0%   { border-color: #FF0000; background-color:#FFFFCC }
    50%  { border-color: #FF0000; background-color:#FFFFFF }
    100% { border-color: #7FF0000; background-color:#FFFFCC }
	
 
	
}




.tab_alert {
     
      border: 3px solid;  
	  
	  
	 	  -webkit-transition: all 2s;
	   -moz-animation: DIV-BORDER 2s infinite;
	  
      -webkit-transition: all 2s;
    -webkit-animation: DIV-BORDER 2s infinite;
}

</style>




  <?	 
 
 
	 
	///$_GET[lat]= 7.9038781;
    //Send request and receive json data
	/*
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=7.807111,98.2974043&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$_GET[lat].','.$_GET[lng].'&sensor=false');
  $outputTo = json_decode($geocodeTo);
  


	 
 
 //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location_type;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
   $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
	
	  */
 ////////// ='.$_GET[lat].'
 
 
 /// 7.8449272,98.3853732
 
 
 /*
 $_GET[lat]=7.8449272;
 $_GET[lng]=98.3853732;
 
 
 */
 

 $latitudeFrom =$_GET[from_lat];
 $longitudeFrom = $_GET[from_lng];
 
 $latitudeTo =$_GET[to_lat];
 $longitudeTo = $_GET[to_lng];
 
 
 /// 8.1110951,98.3042759
 
	$unit == "K";
//Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
     $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
	
	$total_m=$miles * 1.62;
	
	$total=$miles * 1.62;
	
	 
 
	  $total= number_format( $total, 2 );   
	  
	  
	  
	  
	  
//// ความเร็ว 80 km/h 
   
   $total_time=$total/1;
      
   $total_time=number_format( $total_time, 0 );
   
   
   $total_time_all=$total_time/60;
   
 ///  $total_time_all=number_format( $total_time_all, 0 );
 
 
 $total_time_all = floor( $total_time_all );  
   
   $total_time_h=number_format( $total_time_all, 0 );
      
   
   $total_time_m= $total_time-$total_time_h*60 ;
   
    $total_time_m=number_format( $total_time_m, 0 );
	
	
	
	 $total=number_format( $total, 2 );
 
	///echo $total;
?>







<script>

$('#load_km').html("<b><?=$total?>    Km.");

</script>




<? if( $total_time_h > 0){ ?>


<script>

$('#load_time').html("<b><?=$total_time_h?> ชั่วโมง&nbsp;<?=$total_time_m?> นาที");

</script>


<? } ?>


<? if( $total_time_h == 0){ ?>
 
<script>


$('#load_time').html("<b><?=$total_time_m?> นาที");

</script>


<? } ?>
 

<? if($total <= 0.02){ ?>





<script>
 
/*

 var latlng = new google.maps.LatLng(<?=$_GET[from_lat]?>, <?=$_GET[from_lng]?>);

 
      marker_busy = new google.maps.Marker({
       //     position: latlng,
   center: latlng,
       map: map,
			icon: 'images/<?=$_GET[chat_from]?>.png?v=<?=time();?>',
 
 
            title: "Your <?=$_GET[chat_from]?> location!"
        }); 
		

*/

///alert(0);



 //initialize();

 
$('#load_data_direction').addClass('tab_alert');
 
$('#load_time').html("<b><font color='#FF0000' style='font-size:18px'>ถึงจุดหมาย");
$('#content_free').html('<b><font color="#FF0000" style="font-size:18px"><h3 id="firstHeading" class="firstHeading"> <i class="fa  fa-chevron-circle-right" style="font-size:20px; color:#999999  "></i><font color="#333333">&nbsp;ถึงผู้ใช้บริการ<br> VC : CN7099999</h3><p>กรุณาเตรียมกระเป๋าเดินทางของคุณ และเตรียมพร้อมออกเดินทาง');
 
 
 //$('#content_free').html("");
</script>


<? } ?>


<? if($total > 0.02){ ?>

<script>




$('#load_data_direction').removeClass('tab_alert');




///$('#load_time').html("<b><font color='#FF0000' style='font-size:18px'>ถึงจุดหมาย");

</script>


<? } ?>

