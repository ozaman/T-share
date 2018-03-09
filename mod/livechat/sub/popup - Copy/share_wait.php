 <div id="popup_chat_share_wait" style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none;   overflow: auto;  "> 
 
 

 
 
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50"   ><div   id="btn_close_wait_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_wait?></div></td>
    <td width="50" align="right"    > <div style="font-size:18px; color:#FFFFFF;display:none "   id="div_btn_send_wait_popup"   ><button type="button" class="btn"     data-backdrop="static" id="btn_send_wait_popup" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div> </td>
  </tr>
</table>
</div>

 
 <div   style=" margin-top:50px;">
  <input name="chk_pic_view" type="hidden" id="chk_pic_view" value="0" size="10" />
 <input name="chk_pic_you" type="hidden" id="chk_pic_you" value="0" size="10" />
 
 
 
 
 
  <div style="padding-right:0px;">
 
  <center>
 	  <div style="padding-top:-10px">
	  <div class="progress" style="width:95%;;border-radius:8px;" id="area_image_photo_view_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_photo_view_load" style="width:0%;border-radius:8px;">
    
  </div>
</div>
 
 
 <div style="margin-bottom:30px; display:none" id="show_image_photo_view" >
	  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5"  >
  <tr>
    <td align="center"><img src="images/nopic.png" id="image_photo_view" name="image_photo_view"  style="width:90%; border-radius:10px; margin-bottom:5px;border: 1px solid #ddd; display:none  " /></td>
  </tr>
</table>

 </div>
 
 
 
  	
  </div>
 

 
 
 

<div style="background-color:#F6F6F6; padding:5PX;border-radius: 5px; margin-left:10px;  border: 1px solid #ddd;margin-right: 10px; margin-top:-15px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:50px">
  <tr>
    <td width="40">   <span class="btn btn-primary" style="height:35px; background-color:<?=$maincolor;?>"> <i class="fa  fa-camera" style="margin-top:5px;" id="chat_icon_photo_view" ></i> 
  
  </span></td>
    <td width="40"><button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:0px; padding-right:0px; width:100%;height:37px; background-color:#FFFFFF  " id="del_photo_view"><i class="fa  fa-trash" style="font-size:20px; "></i></button></td>
    <td><span  style="color:#000000; font-size:14px; ">&nbsp; <?=chat_photo_view?></span></font></b></span></td>
  </tr>
</table>
 
</div>
 
</div>
 
 
 <center>
 	  <div style="padding-top:20px; margin-bottom:-15px;">
	  <div class="progress" style="width:95%;;border-radius:8px;" id="area_image_photo_you_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_photo_you_load" style="width:0%;border-radius:8px;">
    
  </div>
</div>




 <div style="margin-bottom:30px; display:none" id="show_image_photo_you" >



	  
	  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" style="display:nones"  >
  <tr>
    <td align="center"><img src="images/nopic.png" id="image_photo_you" name="image_photo_you"  style="width:90%; border-radius:10px; margin-bottom:5px;border: 1px solid #ddd ; display:none " /></td>
  </tr>
</table>

  </div>
  	
  </div>
  


 

  
  
 <div style="padding-right:10px;">

<div style="background-color:#F6F6F6; padding:5PX;border-radius: 5px; margin-left:10px;  border: 1px solid #ddd;margin-lright:50px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:50px">
  <tr>
    <td width="40">   <span class="btn btn-primary" style="height:35px; background-color:<?=$maincolor;?>"> <i class="fa  fa-camera" style="margin-top:5px;" id="chat_icon_photo_you" ></i> 
  
  </span></td>
    <td width="40"><button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:0px; padding-right:0px; width:100%;height:37px; background-color:#FFFFFF  " id="del_photo_you"><i class="fa  fa-trash" style="font-size:20px; "></i></button></td>
    <td><span  style="color:#000000; font-size:14px; ">&nbsp; <?=chat_photo_you?></span></font></b></span></td>
  </tr>
</table>
 
</div>
 
</div>
 
 
 
 
     
<br>
 
    </div> 
 </div>
 

 
 
 
 
 
   <script>
   
   
    $("#del_photo_view").click(function(){  
	
	
$("#show_image_photo_view").hide(); 
 $("#area_image_photo_view_load").css('width', '0%');	
 
 $("#area_image_photo_view_load").html('');
	
document.getElementById('load_chat_photo_view').value = "";
document.getElementById('image_photo_view').src ='images/nopic.png'; 
document.getElementById('chk_pic_view').value=0;
document.getElementById('div_btn_send_wait_popup').style.display = "none";	
 });
 
 


$("#del_photo_you").click(function(){  


$("#show_image_photo_you").hide(); 
 
$("#area_image_photo_you_load").css('width', '0%');	
 
$("#area_image_photo_you_load").html('');
 
 
 
document.getElementById('load_chat_photo_you').value = "";
document.getElementById('image_photo_you').src ='images/nopic.png'; 
document.getElementById('chk_pic_you').value=0;
document.getElementById('div_btn_send_wait_popup').style.display = "none";	
 });  
   
   
	  					 
 
 
/////////////////  close
  
  	$("#btn_close_wait_popup_back").click(function(){  
	
 
//  All Close
 $('#load-direct-chat').click();
///  
	 
   $( "#popup_chat_share_wait" ).toggle();
   
   
 
   

$("#show_image_photo_you").hide(); 
 
$("#area_image_photo_you_load").css('width', '0%');	
 
$("#area_image_photo_you_load").html('');
	 
$("#show_image_photo_view").hide(); 
 $("#area_image_photo_view_load").css('width', '0%');	
 
 $("#area_image_photo_view_load").html('');
	 
 
 
document.getElementById('load_chat_photo_view').value = "";
document.getElementById('image_photo_view').src ='images/nopic.png'; 
document.getElementById('chk_pic_view').value=0;
document.getElementById('div_btn_send_wait_popup').style.display = "none";	
 
 
document.getElementById('load_chat_photo_you').value = "";
document.getElementById('image_photo_you').src ='images/nopic.png'; 
document.getElementById('chk_pic_you').value=0;
document.getElementById('div_btn_send_wait_popup').style.display = "none";	
  
	 
	 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  
  
  
  
  
  
  
  
/////////////////  send
  
 $("#btn_send_wait_popup").click(function(){  
 document.getElementById('image_photo_view').src ='images/nopic.png';  
 
 document.getElementById('image_photo_you').src ='images/nopic.png'; 
	
		
$("#main-page-loader-chat").show();	

 		
		
		
 $("#div_button_wait").hide();
 
 
//  All Close
 $('#load-direct-chat').click();
///  
 
 
  
 
		
 $("#image_wait").attr("src", "images/save_load.gif");
    $( "#popup_chat_share_wait" ).toggle();
		
 setTimeout(function() {
		
		 /////////
  var last_id=document.getElementById('vcchat_last_id').value;
			 
 document.getElementById('statetype').value='to_point';
   ///alert(last_id);
      var url="<?=$chat_part?>go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state="+document.getElementById('state').value;
	url=url+"&state_type="+document.getElementById('statetype').value;
	url=url+"&time="+document.getElementById('time').value;
  
  
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 

 
  //   var last_id=document.getElementById('vcchat_last_id').value;
 
   var url_chat = "<?=$chat_part?>go.php?name=livechat&file=sub_new&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&vc=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&lastid="+last_id;
  $('#chat-load-new-'+last_id).load(url_chat); 
  
   $('#chat-load-new-'+last_id).fadeIn(3000);
$(".messages").animate({ scrollTop: 99999 }, 3000);

  $('#chat_button_tool').show();
  $('#chat_button_submit').hide();

 
    // $( "#show_chat_tool" ).toggle();
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
	 
	  $("#div_button_wait").show();
	  $("#main-page-loader-chat").hide();	
	}, 10);  
	 
  });
  

 
 
	
	</script>
 
 
 
  