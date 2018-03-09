<div id="popup_chat_share_map_realtime"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
 
   <div class="back-full-popup" style="background: url(images/bg-popup-50.png); height:80px;width:100%   " >
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50"   ><div   id="btn_close_gps_realtime_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </i></div></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><center>sss<?=chat_send_location_realtime?></center></div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon" class="user-status-online"><i class='fa  fa-power-off'></i></div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="2" cellpadding="0" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
 
 <div   id="load_chat_share_map_realtime"   style="margin-top: 0px; height:100%"  >  
		 
 <? include('google/check_system_realtime.php')?>
</div> 
 
 
              
				                </div>
 
 
 
 
 
 
   <script>
 
	$("#btn_close_gps_realtime_popup").click(function(){   
   $( "#popup_chat_share_map_realtime" ).toggle("slide");
     $( "#show_chat_tool" ).slideToggle( "slow" );
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  	$("#btn_close_gps_realtime_popup_back").click(function(){   
   $( "#popup_chat_share_map_realtime" ).toggle("slide");
     $( "#show_chat_tool" ).slideToggle( "slow" );
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
   $( "#popup_chat_share_map_realtime" ).toggle("slide");
$( "#chat_button_tool" ).click();
 
 });
  
  
 
  
  
    	$("#chat_alert").click(function(){   
   $( "#chat_alert" ).toggle("slide");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
 
	
	</script>
 
 
 
  