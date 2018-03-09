 
<div id="popup_work_preview_map"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:fixed;  display:none; margin-top:0px; overflow:hidden">
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_chat_preview_map"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </i></div></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_view_location?></div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><i class='fa  fa-map-marker'></i></div></td>
  </tr>
</table>
</div>
 
   <div   style=" background-color:#F6F6F6 ; height:80px;width:100%; top:43; position:fixed; padding:10px;  ; overflow:hidden;z-index:999999; " >
 
<table width="100%"  border="0" cellspacing="2" cellpadding="0" >
  <tr>
 
    <td   style=" color:#000000; padding-top:0px; font-size:18px "><b><?=chat_location?></b></td>
 
   
  </tr>
  <tr>
    <td id="load_work_preview_map_address"  style=" color:#333333; padding-bottom:5px; " >&nbsp;</td>
  </tr>
</table>

</div>
 
 <div   id="load_work_preview_map"   style="margin-top: 0px; height:100%; overflow:hidden;  "  >  
		 
 <?   include('google/check_system_realtime.php')?>
</div> 
 
 
              
				                </div>
 
 
 
 
 
 
   <script>
 
	$("#btn_close_chat_preview_map").click(function(){   
   $( "#popup_work_preview_map" ).slideToggle("slow");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
 
  
  
  
  
  
  $("#btn_send_gps_realtime_point").click(function(){  
 

document.getElementById('statetype').value='share_location';

   var url="<?=$chat_part?>go.php?name=chat&file=savedata&type=new&vc=<?=$_GET[vc]?>&state=14";
	url=url+"&lat="+document.getElementById('check_data_status_gps_realtime_lat_old').value;
	 url=url+"&lng="+document.getElementById('check_data_status_gps_realtime_lng_old').value;
 	url=url+"&state_type="+document.getElementById('statetype').value;
 
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
  var url_chat = "<?=$chat_part?>go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
   $( "#popup_work_preview_map" ).slideToggle("slow");
$( "#chat_button_tool" ).click();
 
 });
  
  
 
  
  
    	$("#chat_alert").click(function(){   
   $( "#chat_alert" ).slideToggle("slow");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
	</script>
 
 
  