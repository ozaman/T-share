 <? 
 $clock_color="#009999;font-size:22px";
  $no_clock_color="#FF0000;font-size:22px";
  $time_color="#009999";
  $spin="fa-spin 2x";
  
 ?>  
  <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
 

  <i class="fa fa-clock-o  <? 	if($_GET[$_GET[type]] > 0){ echo $spin; } ?>" style="color:<? 	if($_GET[$_GET[type]]==1){ echo $clock_color;} else {  echo $no_clock_color; }?>" ></i> 
     <div  style="font-size:16px; margin-top:-20px; margin-left:25px;">     
 
 <? 	if($_GET[$_GET[type]]> 0){  ?>
 
 
 <?
 
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."' limit 1");
 $arr[to] = $db->fetch($res[to]);
 
 
 
 
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
	
	
	
	
	
	if($arr[to][driver_pickup] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[type] == 'driver_complete'){
	$data_point = "complete";
	$type_point = "งานสำเร็จ";
}


 $data_lat=$arr[to][driver_.$data_point._lat];
$data_lng=$arr[to][driver_.$data_point._lng];
 
 
 ?>
 
 
 <a id="timeline_button_map_<?=$_GET[type] ?>_<?=$_GET[bookid]?>">
 <font color="<?=$time_color;?>"><b>
 <? echo ThaiTimeConvert($_GET[$_GET[type]._date]- 25200,'1','short'); ?></b></font>
              
    </a>          
              
              
<script>
 $('#timeline_button_map_<?=$_GET[type] ?>_<?=$_GET[bookid]?>').click(function(){  
 

$( "#popup_work_preview_map_timeline" ).toggle();

//$('#tab_to_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#load_work_preview_map_timeline').addClass("map-page-loader");

 $("#head_full_popup_map_timeline").html('<?=$type_point?>');
  
 ///$("#load_work_preview_map_timeline").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0"  src="https://maps.google.com/maps?q=<?=$data_lat?>,<?=$data_lng?>&z=15&output=embed&key=<?=$google_api?>"></iframe>');
 
 
  $("#load_work_preview_map_timeline").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?=$google_api?>&q=<?=$data_lat?>,<?=$data_lng?>&zoom=14" allowfullscreen></iframe>');
 
 ///$('#load_work_preview_map_timeline').removeClass("map-page-loader");
 
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$data_lat?>,<?=$data_lng?>&sensor=false&language=th";
$.getJSON(url, function (data) {
    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;
 
	  $( "#load_work_preview_map_timeline_address" ).html(adress);
    }
});
 
 
 

});




 
 </script>
 
   
              
              
              
              
              
              
              
              
              
              
<? }   else { ?> </font><font style="font-size:13px; color:#FF0000 "><? echo "&nbsp;ยังไม่มี"; } ?></font>			 
			</div>