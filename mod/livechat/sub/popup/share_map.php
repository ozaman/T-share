<div id="popup_chat_share_map"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_gps_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_location?></div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><button type="button" class="btn"     data-backdrop="static" id="btn_send_gps_point" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div></td>
  </tr>
</table>
</div>
 
 <div   id="load_chat_share_map"   style="margin-top: 45px; height:92%"  >  
 
 
</div> 
 
 
              
				                </div>
 
 
 
 
 
 
   <script>
 
 
/////////////////  close
  
$("#btn_close_gps_popup_back").click(function(){ 
	
$("#load_chat_share_map" ).html("");  
	
	
//  All Close
 $('#load-direct-chat').click();
///  
 
  $( "#popup_chat_share_map" ).toggle();
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  
  
  
  
  
  
  
  
/////////////////  send
  
  $("#btn_send_gps_point").click(function(){  


//  All Close
 $('#load-direct-chat').click();
///  
 
   $( "#popup_chat_share_map" ).toggle();


  var last_id=document.getElementById('vcchat_last_id').value;

document.getElementById('statetype').value='share_location';

   var url="<?=$chat_part?>go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	 url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state_type="+document.getElementById('statetype').value;
 
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
 
   var url_chat_point = "<?=$chat_part?>go.php?name=livechat&file=sub_new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=<?=$_GET[lang]?>&lastid="+last_id;
  $('#chat-load-new-'+last_id).load(url_chat_point); 
     $('#chat-load-new-'+last_id).fadeIn(3000);
  
  ////alert(url_chat);
  
   document.getElementById('message').value="";

 $("#load_chat_share_map" ).html("");  
 

 });
	
	</script>
 
 
 
  