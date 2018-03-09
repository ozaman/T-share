 <div id="popup_chat_share_album" style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
<script>
//$('#load_wait_upload').load('load/loading/page_sub.php'); 
</script>
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_album_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_photo?></div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><i class='fa  fa-photo'></i></div></td>
  </tr>
</table>
</div>
  
 <div style="margin-top: 45px;"  id="load_chat_share_album"  >  
 
<center>
<img id="image_album" style="width:90%;border-radius: 0px;" src="images/save_load.gif" /> 
</center>
 
</div> 

 
                   <div style="margin-top: 10px;" id="div_button_album"> <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal"  data-backdrop="static" id="btn_close_album_popup" ><?=chat_close?></button>
					 <button type="button" class="btn btn-modal-ok"     data-backdrop="static" id="btn_send_album_popup" ><?=chat_send?></button>      </center>
                </div>
				                </div>
 

 
 
 
 
 
   <script>
	  					 
							
							 
 
	$("#btn_close_album_popup").click(function(){   
   $( "#popup_chat_share_album" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  	$("#btn_close_album_popup_back").click(function(){   
   $( "#popup_chat_share_album" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  
  ///////////////// 
  
    	$("#btn_send_album_popup").click(function(){   
		
		
 $("#div_button_album").hide();
		
 $("#image_album").attr("src", "images/save_load.gif");
		
 setTimeout(function() {
		
		 /////////
  var last_id=document.getElementById('vc_chat_last_id').value;
			 
 document.getElementById('statetype').value='share_photo';
   ///alert(last_id);
      var url="<?=$chat_part?>go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state="+document.getElementById('state').value;
	url=url+"&state_type="+document.getElementById('statetype').value;
	url=url+"&time="+document.getElementById('time').value;
  
  
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 

 
  //   var last_id=document.getElementById('vc_chat_last_id').value;
 
   var url_chat = "<?=$chat_part?>go.php?name=livechat&file=sub_new&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&vc=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&lastid="+last_id;
  $('#chat-load-new-'+last_id).load(url_chat); 
  
   $('#chat-load-new-'+last_id).fadeIn(3000);
$(".messages").animate({ scrollTop: 99999 }, 3000);

  $('#chat_button_tool').show();
  $('#chat_button_submit').hide();

		 ///



   $( "#popup_chat_share_album" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
	 
	  $("#div_button_album").show();
	}, 5000);  
	 
  });
  

   
   
    	$("#chat_alert").click(function(){   
   $( "#chat_alert" ).slideToggle("slow");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
 
	
	</script>
 
 
 
 
 
 
 
 
 
 
 
  
<div id="popup_chat_share_camera" role="dialog"   aria-labelledby="myModalLabel"    style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; margin-top:0px;">
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_camera_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup">แชร์รูปภาพ</div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><i class='fa  fa-photo'></i></div></td>
  </tr>
</table>
</div>
 <? //  include ("load/page/back_popup.php");?>
 <div class="modal-dialog"    style="width:auto; padding:0px; ">

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="width:100%; padding-top:10px; margin-left:0px" > 
 
                <div class="modal-body"  i style="width:100%;    padding:0px; margin-left:0px; margin-top:10px; ">  
		<br>
 <img id="image_camera" style="width:100% " />
		  
</div> 

 
                <div class="modal-footer" style="margin-top: 0px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal"  data-backdrop="static" id="btn_close_camera_popup" >ปิด</button>
					 <button type="button" class="btn btn-modal-ok"     data-backdrop="static" id="btn_send_camera_popup" >ส่ง </button>
 
    <script>
	
	$("#btn_send_camera_popup").click(function(){   
 

 
   $( "#popup_chat_share_camera" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
	
 
	$("#btn_close_camera_popup").click(function(){   
   $( "#popup_chat_share_camera" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  	$("#btn_close_camera_popup_back").click(function(){   
   $( "#popup_chat_share_camera" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
 
  
 
  
    	$("#chat_alert").click(function(){   
   $( "#chat_alert" ).slideToggle("slow");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
 
 
	$("#main-page-loader-sub").hide();
 
	</script>
                </div>
            </div>
  </div>
 
</div>	
 
 
 