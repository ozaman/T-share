 
  <?
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
 $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."'");
 $arr[project] = $db->fetch($res[project]);
 
 
 
 ?>
 
 
 <? if($arr[project][driver_pickup]==1){?>
 
<div class="font_22" style="padding:5px;"><b><a>เช็คชื่อแขกสำเร็จ</a></div>
 
 <? } ?>
 
 
 <? if($arr[project][driver_pickup]==2){?>
 
<div class="font_22" style="padding:5px; color:#FF0000"><b>ไม่เจอแขก</div>
 
 <? } ?>
 
 
 
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td><button style=" color: #fffbfb;border-radius: 10px; width:100%" class="btnstatus"     data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  col_name="driver_pickup" id="timeline_btn_pickup_check_<?=$arr[project][id];?>" data_val="1"  <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> ><font class="font_14"> เช็คชื่อแขก</button></td>
      <td><button style="background-color: #ff2b2b;border-radius: 10px; color: #fffbfb; width:100%" class="btnstatus"   id="timeline_btn_pickup_not_check_<?=$arr[project][id];?>" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > <font class="font_14">ไม่เจอแขก</button></td>
    </tr>
  </tbody>
</table>





 <script>
 

 
  ////// เจอแขก
 
 
$('#timeline_btn_pickup_check_<?=$arr[project][id];?>').click(function(){  
 
 $( "#load_data_checkin_popup" ).toggle(); 
  
var url_chat_<? echo $arr[project][id];?> = "load_data_checkin.php?name=load/show&file=popup_guest&opentype=check_pickup&id=<? echo $arr[project][id];?>&type=yes"; 
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
 
 
 
 
 $('#load_data_checkin_popup').html(load_main_mod); 
///$('#load_data_checkin_popup').load('load/loading/page_main.php'); 
// $('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),
function(response){ $('#load_data_checkin_popup').html(response); });
  
 
 
     	});
					
					</script>
                    
                    
                    
			
    <script>
 

 
  ////// เจอแขก
 
 
$('#timeline_btn_pickup_not_check_<?=$arr[project][id];?>').click(function(){  
 
 $( "#load_data_checkin_popup" ).toggle(); 
  
var url_chat_<? echo $arr[project][id];?> = "load_data_checkin.php?name=load/show&file=popup_guest&opentype=check_pickup_no_guest&id=<? echo $arr[project][id];?>&type=yes"; 
 
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
url_chat_<? echo $arr[project][id];?>=url_chat_<? echo $arr[project][id];?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;


 
 
 
$('#load_data_checkin_popup').html(load_main_mod); 
// $('#load_data_checkin_popup').load(url_chat_<? echo $arr[project][id];?>); 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),
function(response){ $('#load_data_checkin_popup').html(response); });
  
 
 
     	});
					
					</script>