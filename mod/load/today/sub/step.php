 
  <?
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
 $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."'");
 $arr[project] = $db->fetch($res[project]);
 
 
 ?>
 <style>
  
 @-webkit-keyframes DIV-TEXT {
    0%   { color: #FF0000 }
    50%  { color: #000000 }
    100% { color: #FF0000 }
 
}

 @-moz-keyframes DIV-TEXT {
 
    0%   { color: #FF0000 }
    50%  { color: #000000 }
    100% { color: #FF0000 }
	
 
	
}




.text-alert {
	 
 
   -webkit-transition: all 2s;
	   -moz-animation: DIV-TEXT 1s infinite;
	  
      -webkit-transition: all 2s;
    -webkit-animation: DIV-TEXT 1s infinite;
}

 </style>

 
 
 
 
 
 <?
 
 /// $arr[project][id]= $_GET[bookid];

if($_GET[type]=='driver_topoint'){
	
$type="สถานที่รับ";
}

if($_GET[type]=='driver_pickup'){

$type="รับแขก";
}

if($_GET[type]=='driver_complete'){

$type="สถานที่ส่ง";
}


if($_GET[type]=='driver_checkcar'){

$type="เช็คสัมภาระ";
}




 ?>
 
 
 
 
 <? if($arr[project][driver_pickup]==0){?>
 
<script>

 //$( "#load_step_check_pickup_<?=$arr[project][id]?>" ).hide();
 
</script>

<? } ?>
 
 
 
 
 
 
 
 
 
 
 
 
<? if($_GET[type]=='driver_topoint'){?>

<? if($arr[project][driver_topoint] > 0){?>
<a ><?=$type?></a>
 
<? } ?>

<? if($arr[project][driver_topoint]== 0){?>
<a id="timeline_btn_topoint_<?=$arr[project][id];?>" ><font color="#FF0000"><span class="text-alert"><?=$type?></font></a>

<? } ?>

 
   <script>

$('#timeline_btn_topoint_<?=$arr[project][id];?>').click(function(){  
 
 $( "#load_data_checkin_popup" ).toggle();
  
var url_chat_<? echo $arr[project][id];?>= "load_data_checkin.php?name=load/show&file=popup_guest&opentype=check_to_point&id=<? echo $arr[project][id];?>";
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 $('#load_data_checkin_popup').html(load_main_mod); 
 
 
/// $('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),

function(response){ $('#load_data_checkin_popup').html(response); });
 
	});
					
</script>
 

<? } ?>






 
<? if($_GET[type]=='driver_pickup'){?>

<? if($arr[project][driver_pickup] > 0){?>

<script>

 $( "#load_step_check_pickup_<?=$arr[project][id]?>" ).show();
 
</script>



<a ><?=$type?></a>
 
<? } ?>

<? if($arr[project][driver_pickup]== 0 and $arr[project][driver_topoint]==1){?>
<a id="timeline_btn_pickup_<?=$_GET[id];?>"><font color="#FF0000"><span class="text-alert"><?=$type?></font></a>
<script>

 $( "#load_step_check_pickup_<?=$arr[project][id]?>" ).show();
 
</script>

<? } ?>

<? if($$arr[project][driver_pickup] == 0 and $arr[project][driver_topoint]==0){?>
<a ><font color="#666666"><?=$type?></font></a>




<? } ?>


 


<? if($arr[project][driver_pickup]>0){?>
 
<script>

 $( "#load_step_check_pickup_<?=$arr[project][id]?>" ).show();
 
</script>

<? } ?>








 
   <script>

$('#timeline_btn_pickup_<?=$arr[project][id];?>').click(function(){  

/////// check popup
 


 
 $( "#load_data_checkin_popup" ).toggle();
  
var url_chat_<? echo $arr[project][id];?>= "load_data_checkin.php?name=load/show&file=popup_guest&opentype=check_to_point&id=<? echo $arr[project][id];?>";
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 $('#load_data_checkin_popup').html(load_main_mod); 
 //$('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
 $.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),
function(response){ $('#load_data_checkin_popup').html(response); });
 
 
	});
					
</script>
 

<? } ?>

 


 
<? if($_GET[type]=='driver_complete'){?>
 
 
<? if($arr[project][driver_complete] > 0){?>
<a ><?=$type?></a>
 
<? } ?>

<? if($arr[project][driver_complete] == 0 and $arr[project][driver_pickup]>0){?>
<a id="timeline_btn_complete_<?=$arr[project][id];?>"><font color="#FF0000"><span class="text-alert"><?=$type?></font></a>

<? } ?>


<? if($arr[project][driver_complete] == 0 and $arr[project][driver_pickup]==0){?>
<a ><font color="#666666"><?=$type?></a>

<? } ?>




 
   <script>

$('#timeline_btn_complete_<?=$arr[project][id];?>').click(function(){  
 
 $( "#load_data_checkin_popup" ).toggle();
  
var url_chat_<? echo $arr[project][id];?> = "load_data_checkin.php?name=load/show&file=popup_guest&daytype=<?=$_GET[daytype]?>&opentype=check_complete&id=<? echo $arr[project][id];?>&daytype=<?=$_GET[daytype]?>&day=<?=$_GET[day]?>";
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 $('#load_data_checkin_popup').html(load_main_mod); 
 //$('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),
function(response){ $('#load_data_checkin_popup').html(response); });
 
	});
					
</script>
 

<? } ?>










<? if($_GET[type]=='driver_checkcar'){?>

<? if($arr[project][driver_checkcar] > 0){?>
<a ><?=$type?></a>
 
<? } ?>

<? if($arr[project][driver_checkcar] == 0 and $arr[project][driver_complete]>0){?>
<a id="timeline_btn_checkcar_<?=$arr[project][id];?>"><font color="#FF0000"><span class="text-alert"><?=$type?></font></a>

<? } ?>


<? if($arr[project][driver_checkcar] == 0 and $arr[project][driver_complete]==0){?>
<a ><font color="#666666"><?=$type?></a>

<? } ?>




 
   <script>

$('#timeline_btn_checkcar_<?=$arr[project][id];?>').click(function(){  
 
 $( "#load_data_checkin_popup" ).toggle();
  
var url_chat_<? echo $arr[project][id];?>= "load_data_checkin.php?name=load/show&file=popup_guest&opentype=check_checkcar&id=<? echo $arr[project][id];?>&daytype=<?=$_GET[daytype]?>&day=<?=$_GET[day]?>";
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 $('#load_data_checkin_popup').html(load_main_mod); 
 
 //$('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),
function(response){ $('#load_data_checkin_popup').html(response); });
 
	});
					
</script>
 

<? } ?>