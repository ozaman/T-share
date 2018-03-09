<div id="popup_chat_share_text"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px; overflow:auto">
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_text_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_txt_store?></div></td>
    <td width="50" align="right"    > <div style="font-size:18px; color:#FFFFFF; display:none "   id="div_btn_send_text_store" ><button type="button" class="btn"     data-backdrop="static" id="btn_send_text_store" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div> </td>
  </tr>
</table>
</div>

 
 
 <div   id="load_chat_share_text"   style="margin-top: 45px; height:100%; overflow:hidden"  >  
	
 
</div> 
  </div>
 
 
 
   <script>
 
 
  
/////////////////  close

$("#btn_close_text_popup_back").click(function(){   		
		
//  All Close
 $('#load-direct-chat').click();
///  
		

 $("#load_chat_share_text" ).html("");  
 
   $( "#popup_chat_share_text" ).toggle();
   //  $( "#show_chat_tool" ).toggle();
   
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
 
 
 
/////////////////  send
$("#btn_send_text_store").click(function(){   

//  All Close
 $('#load-direct-chat').click();
///  



 $( "#popup_chat_share_text" ).toggle();
 


  var last_id=document.getElementById('vcchat_last_id').value;
document.getElementById('statetype').value='chat_store';

 

   var url="<?=$chat_part?>go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	 url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state_type="+document.getElementById('statetype').value;
	url=url+"&message_store="+document.getElementById('message_store').value;
 
 
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
 var url_chat_point = "<?=$chat_part?>go.php?name=livechat&file=sub_new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=<?=$_GET[lang]?>&lastid="+last_id;
  $('#chat-load-new-'+last_id).load(url_chat_point); 
     $('#chat-load-new-'+last_id).fadeIn(3000);
	 
	 
 $("#load_chat_share_text" ).html("");  
	 
	 
 
 });
 
 
 
 
	
	</script>
 
 
 
  