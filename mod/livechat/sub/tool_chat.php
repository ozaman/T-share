<script>

     $('#show_chat_tool').hide(); 
	 
	 
/////// 
	 
	 

$( "#chat_button_tool" ).click(function() {
 
 
///// tool status
 var tool_chat_status = $( "#show_chat_tool" ).is(":hidden");
  var tool_text_status = $( "#show_text_tool" ).is(":hidden");
 var tool_time_status = $( "#show_time_tool" ).is(":hidden");
 
 
 
 if(tool_text_status==false){   $( "#show_text_tool" ).toggle();;  }
  if(tool_time_status==false){   $( "#show_time_tool" ).toggle();;  }
 ///// ---- end  -----
 

 /////
 $( "#show_chat_tool" ).toggle(); 
 
    $('#load_text_store').html(''); 

  
});



//////////// 


$( "#chat_button_time" ).click(function() { 
 
///// tool status
 var tool_chat_status = $( "#show_chat_tool" ).is(":hidden");
  var tool_text_status = $( "#show_text_tool" ).is(":hidden");
 var tool_time_status = $( "#show_time_tool" ).is(":hidden");
 
 
 
 if(tool_text_status==false){   $( "#show_text_tool" ).toggle();;  }
  if(tool_chat_status==false){   $( "#show_chat_tool" ).toggle();;  }
 ///// ---- end  -----
 

 /////
 $( "#show_time_tool" ).toggle(); 
 
    $('#load_text_store').html(''); 

  
});


///////////// 
 
$( "#chat_icon_text" ).click(function() {

///// tool status
 var tool_chat_status = $( "#show_chat_tool" ).is(":hidden");
  var tool_text_status = $( "#show_text_tool" ).is(":hidden");
 var tool_time_status = $( "#show_time_tool" ).is(":hidden");
  
//////alert(tool_status);
/////
 $( "#show_chat_tool" ).toggle();
  $( "#show_text_tool" ).toggle();

   $('#load_text_store').html(''); 
});


 
  $( "#chat_icon_voices" ).keypress();
 


 
$( "#chat_icon_voice" ).click(function() { 

 var tool_voice_status = $( "#alert_show_voice" ).is(":hidden");
 
 
 
 
 
 ///alert(tool_voice_status);

 
 if(tool_voice_status==true){   
     var url_voice = "<?=$chat_part?>go.php?name=livechat/sub/load&file=voice&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=<?=$_GET[lang]?>"; 
  $('#load_chat_voice').load(url_voice);
  $( "#alert_show_voice" ).toggle(); 
    $("#chat_icon_voice_mic").html( '<i class="fa fa-microphone-slash"  style=" font-size:34px ; margin-top:5PX; color:#FF0000 "   ></i> ' );
  
 
 ///startDictation();
  } 
  
   if(tool_voice_status==false){   
  $( "#popup_chat_preview_voice" ).slideToggle();
    
  $('#save').click();     
  
  $( "#show_chat_tool" ).toggle();
    $( "#alert_show_voice" ).toggle(); 	
    $("#chat_icon_voice_mic").html( '<i class="fa fa-microphone"  style=" font-size:34px ; margin-top:5PX; "   ></i> ' );
	////  $('#load_chat_voice').html("");
  
  }
 
  });





 

</script>

  
 
   
   
   
   <script>
   
 /////////  gps
 
  $("#chat_icon_gps").click(function(){   
 
  $( "#alert_show_map" ).toggle();
 
  });
  
/// popup map 1
 
 $("#button_alert_show_map_now").click(function(){    
 
   $( "#popup_chat_share_map" ).toggle();
  $( "#alert_show_map" ).toggle(); 

 $('#load_chat_share_map').load('google/check_system.php');
  });


     /////// popup map 2
  $("#button_alert_show_map_realtime").click(function(){     
    $( "#popup_chat_share_map_realtime" ).toggle();  
  $( "#alert_show_map" ).toggle(); 
  
  ///$('#load_chat_share_map_realtime').load('load_blank.php?name=livechat/realtime&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>');
 
 $('#load_chat_share_map_realtime').html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="<?=$chat_part?>mod/livechat/realtime/index.php?vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lat='+document.getElementById('check_data_status_gps_lat_old').value+'&lng='+document.getElementById('check_data_status_gps_lng_old').value+'" allowfullscreen></iframe>');
  });
 
 
 
 
	
  </script>	
  
  
  
  <script>
  
 
/////////  photo
 $("#chat_icon_camera").click(function(){  
     
  $("#load_chat_camera").click(); 
  
  });
 
  $("#chat_icon_album").click(function(){  
 
  $("#load_chat_album").click();  
  
  
  });
     
</script>	 







	  
	  
<script>
 
 /////////  wait
  
    $("#chat_icon_photo_view").click(function(){   
  $("#load_chat_photo_view").click();    
  
  });  
      $("#chat_icon_photo_you").click(function(){   
 $("#load_chat_photo_you").click();  
  });
 
    
 
   </script>
   
   
   
   
    <script>
   
  
  $("#chat_icon_refresh").click(function(){  
 
var last_id=document.getElementById('vcchat_last_id').value;
 
  //// load ทันที
 /// $('#load-direct-chat').load('load/loading/chat.php'); 
 var url_chat = "<?=$chat_part?>go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=<?=$_GET[lang]?>";
   	url_chat=url_chat+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url_chat=url_chat+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
	
	
   $('#load-direct-chat').load(url_chat); 
   document.getElementById('load_msg').value=0;
 
    });

  

  var url_button = "<?=$chat_part?>go.php?name=livechat/sub/load&file=send_button&type=tool";
  ///$('#chat_button_load').load(url_button); 
 // alert(0);



</script>




<script>
 
 
 
  $( "#chat_icon_wait" ).click(function() { 
  $( "#popup_chat_share_wait" ).toggle();
 
  $(".outer-container-wait" ).fadeIn( "slow" );
 var tool_voice_status = $( "#alert_show_voice" ).is(":hidden");
 
 
 
 

   });
 
 
 /////////////
 
 
   $( "#chat_icon_guest_wait" ).click(function() { 
 
  $( "#popup_chat_share_wait" ).toggle();
 
 
  });
 
 
 

</script>



<div id="test_text"></div>
 
<div style="padding:10px; display:none;box-shadow: 0px -5px 5px #DADADA; margin-top:10px" id="show_chat_tool">
 
 <table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr align="center" valign="top">
    <td width="33%" class="tool-td-chat">  <center>
      <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_text">
	 <i class="fa fa-comments-o" ></i>  </button>
<br><div style="margin-top:5px; font-size:12px "><?=chat_txt_store?></div></td>
    <td width="33%" class="tool-td-chat"><center>
        <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_album"> <i class="fa fa-photo" ></i> </button>
      <br />
        <div style="margin-top:5px; font-size:12px ">
          <?=chat_photo?>
      </div></td>
    <td width="33%" class="tool-td-chat"><center>
        <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_camera"> <i class="fa fa-camera" ></i> </button>
      <br />
        <div style="margin-top:5px; font-size:12px ">
          <?=chat_camera?>
      </div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" >
   <tr align="center" valign="top">
     <td width="33%" class="tool-td-chat"><center>
         <button type="button"  class="btn btn-default tool-icon-chat"     id="chat_icon_navigation"> <i class="fa fa-location-arrow"  style=" font-size:34px ; margin-top:5PX;
		-webkit-transform:rotate(-45deg);
  -moz-transform:rotate(-45deg);
  -o-transform:rotate(-45deg);
  -ms-transform:rotate(-45deg); "   ></i> </button>
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_navigate?>
         </div>
     </center></td>
     <td width="33%" class="tool-td-chat"><center>
         <button type="button" class="btn btn-default tool-icon-chat"   id="chat_icon_gps"  > <i class="fa fa-map-marker" ></i> </button>
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_location?>
         </div>
     </center></td>
     <td width="33%" class="tool-td-chat"><center>
         <button type="button" class="btn btn-default tool-icon-chat"   id="chat_icon_wait"  > <i class="fa fa-street-view" ></i> </button>
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_wait?>
         </div>
     </center></td>
   </tr>
 </table>
</div>





 