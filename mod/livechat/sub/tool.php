  <?  include ("bootstrap/fonts/all.php");?> 
  
  
  

  
<script>
  ////alert(document.getElementById('check_data_status_gps_lat_old').value)
 
 setInterval(function() {
 ////// อัพเดทตำแหน่งตัวเอง 
 var url_check_data_new_chat = "<?=$chat_part?>load_blank.php?name=livechat/update&file=new_msg&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>&type=check_guest&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang="+document.getElementById('chat_lang').value; 
 
 $('#check-new-message').load(url_check_data_new_chat);
}, 1000); // 60000 milliseconds = one minute
 
	</script>
  
  
  
  
  
  
  
 <style>
	.main-page-loader-wait-chat {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999999;  
	background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF;
}
</style>


 <style>
	.main-page-loader-message {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 999999999;  
	background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF;
	
	
}
</style>

 <div id="main-page-loader-chat" class="main-page-loader-message" style=" display:none"> </div> 
 
 

<?
if($_GET[lang]=='en'){
$lang_talk='en-US';
}
if($_GET[lang]=='th'){
$lang_talk='th-TH';
}

if($_GET[lang]=='cn'){
$lang_talk='cmn-Hans-CN';
}


?>
 
<style>
.bottom_popup_chat
{ 
font-size:22px;   padding:0px;  color:#666666;  width:100%; background-color:<?=$bg_chat_bottom?>;      
  padding-bottom:0px;  
 
position: fixed;
  bottom:  0;
  
 
}
 
 </style>
 
<div class="bottom_popup_chat" style="margin:0;  ">  
<?  include "mod/load/update/sound.php" ;?>
 
				  <form id="chat_form" name="chat_form"  action="<?=$chat_part?>go.php?name=livechat&file=upload_pic_wait&time=<?=time()?>"  method="post" enctype="multipart/form-data"  target="uploadtarget">  
<iframe id="uploadtarget" name="uploadtarget" src="" style="width:200px;height:0px;border:0"></iframe>

<input id="btnupload" type="submit"  class="btn btn-primary"   data-backdrop="false" value="อัพโหลด" style="display:none">

 <div class="box-footer" style="position:fixeds; padding-bottom:5px; margin-top:-20px; margin-left:0px; margin-right:0px; background-color:<?=$bg_chat_bottom?>; border-top: 2px solid #E7E8E8; ">
 			
  <div class="input-group" style="margin-top:-5px; " >
  
  <?
  $db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
 $res[chatlast] = $db->select_query("SELECT id FROM vc".$_GET[vc]." ORDER BY id desc limit 1"); 
 $arr[chatlast] = $db->fetch($res[chatlast]);
 
 
 /////// หาตำแหน่ง
 
 
//echo $_GET[vc];
 
if($_GET[sv]=='cn'){ 
   $db->connectdb_cn(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
   
}
   
else  { 
   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
   
}
   
 $res[chatvc] = $db->select_query("SELECT id,invoice,to_place,airin_time,airin_h,airin_m,air,ondate FROM web_order where invoice= '".$_GET[vc]."' ORDER BY id desc limit 1"); 
 $arr[chatvc] = $db->fetch($res[chatvc]);
 
 
 //// to place
 
 $res[chatplace_to] = $db->select_query("SELECT id,topic,address,amphur,province FROM web_transferplace_new where id= '".$arr[chatvc][to_place]."' ORDER BY id desc limit 1"); 
 $arr[chatplace_to] = $db->fetch($res[chatplace_to]);
 
  //// back place
 
  $res[chatplace_back] = $db->select_query("SELECT id,topic,address,amphur,province FROM web_transferplace_new where id= '".$arr[chatvc][back_place]."' ORDER BY id desc limit 1"); 
 $arr[chatplace_back] = $db->fetch($res[chatplace_back]);
 
  ///echo $arr[chatplace_to][topic];
 
  
  ?>
 

 <input type="hidden" name="<?=$chat_to?>_online" id="<?=$chat_to?>_online" value="0"  style="width:50px " />
 <input type="hidden" name="time" id="time" value="<?=time()?>"  style="width:50px " />
 <input type="hidden" name="statetype" id="statetype" value="chat_text"  style="width:50px " /> 
   <input type="hidden" name="vcchat" id="vcchat" value="<?=$_GET[vc]?>"  style="width:20px " /> 
 <input type="hidden" name="vcchat_last_id" id="vcchat_last_id" value="<?=$arr[chatlast][id]?>"  style="width:50px " /> 
  <input type="hidden" name="chat_from" id="chat_from" value="<?=$chat_from?>"  style="width:20px " /> 
  <input type="hidden" name="chat_to" id="chat_to" value="<?=$chat_to?>"  style="width:20px " />
	<input type="hidden" name="chat_lang" id="chat_lang" value="<?=$_GET[lang]?>"  style="width:20px " /> 
		<input type="hidden" name="load_msg" id="load_msg" value="0"  style="width:20px " /> 
		
		<input type="hidden" name="chat_address" id="chat_address" value="0"  style="width:100px " /> 
	
 
  
				<div style="display:none">
 
				


 
				  <input type="hiddens" name="state" id="state" value="31"  style="width:20px " /> 
 
				 </div>
 
     </div>

	   			 
 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" > <input name="message" type="text"  id="message"   style="height:38px; width:100%; margin-right:5px; font-size:14px; " value="" placeholder="เขียนข้อความ ..." onFocus="checktext();"></td>
    <td style="width:25px; padding-left:5px; display:none<? if($_GET[type]=='transfer' or $_GET[type]==''){ echo '1';}?>"><button type="button" class="btn btn-default" style="margin-right:5px;   margin-left:0px; padding:5px; width:100%; height:38px " id="chat_button_time"> <center><i class="fa fa-bell-o" style="font-size:24px; color: #333333 "></i> </center> </button></td>
    <td   style="width:60px;padding-left:5px  ">      <button type="button" class="btn btn-default"   style="margin-right:0px;  margin-left:0px; padding:2px; width:60px;margin-right:0px; height:38px  " id="chat_button_tool"> <i class="fa fa-plus-square-o" style="font-size:30px; color: #333333; font-weight: "></i>  </button>
	
	 <button type="button" class="btn btn-primary btn-flat" style="display:none; width:60px; height:38px; background-color:<?=$maincolor?>"  id="chat_button_submit"><div style="margin-left:0px; "><?=chat_send?></div></button></td>
  </tr>
</table>


 <!-- /.box-body --> 
 

<!-- /.box-body -->  




 
 
  

  
 
	
	
 

 
 
	  
	  
  
  
 </div>
				<?  include ("mod/livechat/sub/tool_chat.php");?> 
<?  include ("mod/livechat/sub/tool_text.php");?> 
<? include ("mod/livechat/sub/tool_guest.php");?> 
				  </form>


 <?  $arr[project][name_to_place] ?>

<div id="send_chat_data" > </div>								



<style>
	 
.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-bottom: 0px solid #ffffff; margin-bottom: 0px; height:45px; 
  top:  0; position:fixed;
    z-index: 1; 
 
}
 
</style>
 

 

 	<script>
 
	
$('#chat_icon_navigation').click(function(){  
$( "#popup_chat_preview_map_realtime" ).toggle();

 
 
  var text_map = $( "#popup_chat_preview_map_realtime" ).is(":hidden");
  
 

/*
$("#view_location_text").html('<?=chat_navigate?>');
 
 $("#load_chat_preview_map_realtime").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=<?=$google_api?>&destination=<? echo $arr[chatplace_to][topic]; ?> <? echo $arr[chatplace_to][amphur]?> <? echo $arr[chatplace_to][province] ?>&origin='+document.getElementById('check_data_status_gps_lat_old').value+','+document.getElementById('check_data_status_gps_lng_old').value+'&center='+document.getElementById('check_data_status_gps_lat_old').value+','+document.getElementById('check_data_status_gps_lng_old').value+'&avoid=tolls|highways&zoom=12" allowfullscreen></iframe>');
 
 */
 
 

 
 
 
 
// alert(<?=$_GET[lng]?>);

 

////
 
 var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+document.getElementById('check_data_status_gps_lat_old').value+","+document.getElementById('check_data_status_gps_lng_old').value+"&sensor=false";
 

 
 
$.getJSON(url, function (data) {
    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;
 
	  $( "#load_chat_preview_map_realtime_address" ).html(adress);
	  
	  
	  
	
	document.getElementById('chat_address').value=adress;
	
	
	
	
	
	
	  
 
	  
	  
	    var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=map&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=delay";
 
 	url_text=url_text+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	 url_text=url_text+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
	 url_text=url_text+"&address="+document.getElementById('chat_address').value;
	
	
 
 
  // $('#load_chat_preview_map_realtime').load(url_text); 
   
   
   
   
   /* 
 var url="<?=$chat_part?>go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=<?=$_GET[lang]?>";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state="+document.getElementById('state').value;
	 	url=url+"&state_type="+document.getElementById('statetype').value;
	
  
   $.post(url_text,$('#chat_form').serialize(),function(response){
 $('#load_chat_preview_map_realtime').html(response);  });
   	*/
   
	  $("#view_location_text").html('<?=chat_navigate?>');
 
 $("#load_chat_preview_map_realtime").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=<?=$google_api?>&destination=<? echo $arr[chatplace_to][topic]; ?> <? echo $arr[chatplace_to][amphur]?> <? echo $arr[chatplace_to][province] ?>&origin='+document.getElementById('check_data_status_gps_lat_old').value+','+document.getElementById('check_data_status_gps_lng_old').value+'&center='+document.getElementById('check_data_status_gps_lat_old').value+','+document.getElementById('check_data_status_gps_lng_old').value+'&avoid=tolls|highways&zoom=12" allowfullscreen></iframe>');
	  
	  
  
    }
	
});
 
 

 
 
 
 
 
 
 
 });
 
			</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 <div style="display:none ">
   <? include ("mod/livechat/sub/photo_wait.php");?>
 <? include ("mod/livechat/sub/photo_album.php");?>
 <? include ("mod/livechat/sub/photo_camera.php");?>

  </div>
 
 
 
 

 