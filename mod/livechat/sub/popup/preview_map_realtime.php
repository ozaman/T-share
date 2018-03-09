<div id="popup_chat_preview_map_realtime"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_chat_preview_map_realtime"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><div id="view_location_text"><?=chat_view_location?></div></div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><i class='fa  fa-map-marker'></i></div></td>
  </tr>
</table>
</div>
 
   <div   style=" background-color:#F6F6F6 ; height:80px;width:100%; bottom:0; position:fixed; padding:10px;   " >
 
<table width="100%"  border="0" cellspacing="2" cellpadding="0" >
  <tr>
 
    <td   style=" color:#000000; padding-top:0px; font-size:18px "><b><?=chat_location?></b></td>
 
  <td rowspan="2" valign="top"   style=" color:#333333; padding-top:5px; width:50px "  id="button_navigater"  ></td>
  </tr>
  <tr>
    <td id="load_chat_preview_map_realtime_address"  style=" color:#333333; padding-bottom:5px; " >&nbsp;</td>
  </tr>
</table>

</div>
 
 <div   id="load_chat_preview_map_realtime"   style="margin-top: 40px; height:100%"  >  
		 
 <? /// include('google/check_system_realtime.php')?>
</div> 
 
                 </div>
 
 
 
 
 
 
   <script>
 
	$("#btn_close_chat_preview_map_realtime").click(function(){   
   $( "#popup_chat_preview_map_realtime" ).toggle();
 
 
  });
  
 
  
   
  
	</script>
 
 
  