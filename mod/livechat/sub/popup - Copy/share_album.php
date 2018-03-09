 

    <style>
   
      #topLoader {
        width: 200px;
        height: 200px;
       z-index:999999999999999; position:fixed;  
      }
      
   
      
      #animateButton {
        width: 200px;
      }
	  
	  
  
	  
    </style>
  
  </head>
  <body>
 
      
   
 
     
      
 <div id="popup_chat_share_album" style="width:100%; height:100%; padding:0px;  left:0px;  top:0px;   z-index:99999; background-color:#FFFFFF; position:absolute;  display:none; overflow: auto;  "> 
 
   <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50"><div   id="btn_close_album_popup_back"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"><?=chat_photo?></div></td>
    <td width="50" align="right"    ><div style="font-size:18px; color:#FFFFFF;display:none "   id="div_btn_send_album"   ><button type="button" class="btn"     data-backdrop="static" id="btn_send_album_popup" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div> </td>
  </tr>
</table>
</div> 
 

 <div style="margin-top: 60px; "  >  
 <table width="90%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FF0000"   id="area_image_album" style="display:none">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


 

 
 
 
<center> 

<div class="progress" style="width:90%;;border-radius:8px;" id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load" style="width:0%;border-radius:8px;">
    
  </div>
</div>




 
 

<img id="image_album"   style="width:90%;border-radius: 0px;border-radius:10px;border: 1px solid #ddd; display:none" src="images/nopic.png"   /> 
</center>
 
</div> 
</div>
 
 
 
 
 
 
 
   <script>
					 
/////////////////  close
 
  	$("#btn_close_album_popup_back").click(function(){ 
	document.getElementById('image_album').src ='images/nopic.png';   
	 
   $( "#popup_chat_share_album" ).toggle();
     $( "#show_chat_tool" ).toggle();
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  
  

/////////////////  send
  	$("#btn_send_album_popup").click(function(){  
		document.getElementById('image_album').src ='images/nopic.png';   
		
$("#main-page-loader-chat").show();		
   $( "#popup_chat_share_album" ).toggle();
		
 $("#div_button_album").hide();
		
 $("#image_album").attr("src", "images/save_load.gif");
 
 
 
		
 //setTimeout(function() {
		
		 /////////
  var last_id=document.getElementById('vcchat_last_id').value;
			 
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
 

 
 
 
   var url_chat = "<?=$chat_part?>go.php?name=livechat&file=sub_new&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&vc=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&lastid="+last_id;
  $('#chat-load-new-'+last_id).load(url_chat); 
  
   $('#chat-load-new-'+last_id).fadeIn(3000);
$(".messages").animate({ scrollTop: 99999 }, 3000);

  $('#chat_button_tool').show();
  $('#chat_button_submit').hide();

 

 $( "#show_chat_tool" ).toggle();
 $(".messages").animate({ scrollTop: 99999 }, 3000);
	 
	  $("#div_button_album").show();
	  $("#main-page-loader-chat").hide();	
	//}, 1000);  
	 
  });
  

 
 
	
	</script>
 
 
 