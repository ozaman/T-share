 
 <?  /// echo date("H:i:s");  ?>
  
 	<script>
 
 

 //$("#message_main_1").show();
 
 
 
 if(document.getElementById('chat_list_new').value=='1'){
 

 document.getElementById('chat_list_new').value='0';  
 
 
 
 $('#load_data_chat_top').hide(); 
   
  
	  
 
 
  /// $('#load-direct-chat').load('load/loading/chat.php'); 
 var url_chat = "<?=$chat_part?>go.php?name=livechat/all&file=user_list_new&chat_from=<?=$chat_from?>&lang=<?=$_GET[lang]?>&id=1";
   	url_chat=url_chat+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url_chat=url_chat+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
	
	
   $('#load_data_chat_top').load(url_chat); 
    $("#message_alert_1").html('3');
	$('#load_data_chat_top').fadeIn(2000);


 
   
   
   $("#message_main_1").hide();
   
   
   }
	
		//// $("#top_msg").append('<div id="top_msg_1">sssssssss</div>'); 
	</script>	
  