   <?  include ("includes/lang/chat.php");?> 
   
   <?
///// echo $_GET[chat_from];

if($user_id==''){
$user_id='no';

}

?>

  <script>
  ////alert(document.getElementById('check_data_status_gps_lat_old').value)
 setInterval(function() {
 ////// อัพเดทตำแหน่งตัวเอง 
 var url_check_data_time_chat = "load_blank.php?name=livechat/all/update&file=main&driver=<?=$user_id?>";
 
/// url_check_data_time_chat =url_check_data_time_chat+"&lang="+document.getElementById('chat_lang').value;
url_check_data_time_chat =url_check_data_time_chat+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_check_data_time_chat =url_check_data_time_chat+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 $('#load_data_chat_online_all').load(url_check_data_time_chat);
}, 3000); // 60000 milliseconds = one minute
	</script>