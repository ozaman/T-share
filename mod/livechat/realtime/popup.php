<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <div  style="display:nones ">  <input type="hiddens" name="check_data_status_gps_lat_old" id="check_data_status_gps_lat_old" value="0"  style="width:100px " /> 
  <input type="hiddens" name="check_data_status_gps_lng_old" id="check_data_status_gps_lng_old" value="0"  style="width:100px " /> </div>
  
  
  <div id="load_check_gps_chat" style="display:nones ">88</div>
  <?
  if($_GET[chat_from]=='customer'){
$chat_part='../driver/';
$maincolor="#3B5998";
$chat_padding="padding:10px;";

} else {

$chat_part='';

$maincolor=$main_color;

}
  
  ?>
 
<script>
 
 //$('#load_check_gps').load('realtime.php');
 $( document ).ready(function() {

 var url_chat_online = "<?=$chat_part?>../../../go.php?name=livechat/realtime&file=realtime&vc=<?=$_GET[vc]?>&chat_from=<?=$_GET[chat_from]?>&chat_to=<?=$_GET[chat_to]?>&lang=<?=$_GET[lang]?>";
 

  $('#load_check_gps_chat').load(url_chat_online);
  });
  

setInterval(function() {
 
 var url_chat_online = "<?=$chat_part?>../../../go.php?name=livechat/realtime&file=realtime&vc=<?=$_GET[vc]?>&chat_from=<?=$_GET[chat_from]?>&chat_to=<?=$_GET[chat_to]?>&lang=<?=$_GET[lang]?>";

  $('#load_check_gps_chat').load(url_chat_online);
		 
}, 1000); // 60000 milliseconds = one minute



	</script>
	
	<? // include("google/check/location/share.php"); ?> 
	
 