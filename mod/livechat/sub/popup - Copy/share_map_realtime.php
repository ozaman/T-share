<div id="popup_chat_share_map_realtime"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
 
   <div class="back-full-popup" style="background: url('images/bg-popup-50.png'); height:60px;width:100%   " >
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50"   ><div   id="btn_close_gps_realtime_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </i></div></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><center><?=chat_send_location_realtime?></center></div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon" class="user-status-online"><i class='fa  fa-power-off'></i></div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="2" cellpadding="0" >
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
 
 <div   id="load_chat_share_map_realtime"   style="margin-top: 0px; height:100%"  >  
		 
  
</div> 
 
 
              
				                </div>
 
 
 
 
 
 
   <script>
 
 
  
/////////////////  close
  
  	$("#btn_close_gps_realtime_popup_back").click(function(){  
	
	
	
//  All Close
 $('#load-direct-chat').click();
///  
	
		
	
	$("#load_chat_share_map_realtime" ).html(""); 	
 
	
   $( "#popup_chat_share_map_realtime" ).toggle();
   
   
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  
  
	
	</script>
 
 
 
  