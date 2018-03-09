  <? 
  
  /// $_GET[lang]='en'; 
  
  ?>
 
	
   <?  include ("includes/lang/chat.php");?>  
   <div style="display:none ">
    <?  include ("sound/index.php");?>  </div>
 

<?
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all." WHERE invoice='".$_GET[vc]."' ");
$arr[project] = $db->fetch($res[project]);

?>
 
 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
 
 

			
 
 <?
$chat_from=$_GET[chat_from];
$chat_to=$_GET[chat_to];
$chat_from=$_GET[chat_from];
if($chat_from=='customer'){
$chat_part='../driver/';
$maincolor="#3B5998";
$chat_padding="padding:10px;";

} else {

$chat_part='';

$maincolor=$main_color;

}


$bg_chat_head="#FFFFFF";
$bg_chat_bottom="#FFFFFF";
$bg_chat_soft="#FFFFFF";
$bg_chat_soft_border="#E7E8E8";


$bg_chat="#F5F5F5";


 ?>
 
 
 
  
 
 <div id="chat_content"   class="messages" style="height:100vh; overflow:auto;padding-bottom:120px; margin-top: 0px; margin-bottom:-0px;  left:0px;  top:0px; padding:5px;   " >
 
 


  <?

 


 
 
 $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$limit = 1 ;
 
 
 $res[chatlast] = $db->select_query("SELECT * FROM vc".$_GET[vc]." ORDER BY id desc limit 1"); 
 $arr[chatlast] = $db->fetch($res[chatlast]);
 
 
 
 
 
 

 
 

$res[chat] = $db->select_query("SELECT * FROM vc".$_GET[vc]."  where comment_to='".$chat_to."' or comment_to='".$chat_from."'   ORDER BY id asc");
 
while($arr[chat] = $db->fetch($res[chat])){

 
 
 /// comment_from
?> 
  <? if($arr[chat][comment_id]>0){
 $res[storechat] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store  where id='".$arr[chat][comment_id]."' ");
$arr[storechat] = $db->fetch($res[storechat]);
  }    ?>
  
  

			   
			
			
 <!-- เริ่มข้อความเราเอง --> 
 <? if($arr[chat][day_start]==1){ ?>
 <div style="padding-top:20px; "><center> <div class="chat-day"> <center><?=$date = date('d-m-Y ',  $arr[chat][post_date]);?></center></div></div>
 <? } ?>
 
 
<? if($arr[chat][comment_from]<>''){ ?>
 
<?  include ("mod/livechat/message/list.php");?> 

 <? } ?>
 
 <!--  จบ ข้อความเราเอง -->  
			  
  <!-- เริ่มข้อความคนอื่น --> 
<? //if($arr[chat][comment_from]<>$chat_from){?>  
 <? //include ("mod/livechat/message/me.php");?>  
<? // } ?> 
<!--  จบ ข้อความคนอื่น--> 

				
				 <!-- จบ loop --> 
				<? } ?>
				
 
				  <script>
				  
/*		  
  ////alert(document.getElementById('check_data_status_gps_lat_old').value)
 
 setInterval(function() {
 ////// อัพเดทตำแหน่งตัวเอง 
 var url_check_data_new_chat = "<?=$chat_part?>load_blank.php?name=livechat/update&file=new_msg&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>&type=check_guest&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang="+document.getElementById('chat_lang').value; 
 
 $('#check-new-message').load(url_check_data_new_chat);
}, 1000); // 60000 milliseconds = one minute
 
 */
	</script>
				 <div id="check-new-message"> </div>
				
				<div id="chat-load-new"  style="height:250px;" > 
 				<div id="chat-load-new-message-sub"  style="display:nones; margin-top:10px; "  > 
 
				 <div>   
				 <div>   
 

   <script>
 ///alert(document.getElementById('load-direct-chat').offsetHeight);
 
	var height =  $(".messages:visible").height();
 
</script>
<script>
  
 
document.getElementById('message').value="";
 
  //  setInterval(function() {

 
$(".messages").animate({ scrollTop: 99999 }, 3000);
 
 

// }, 3000); // 60000 milliseconds = one minute
  </script>   

  <?  include ("mod/livechat/config.php");?> <br>
<br>
<br>
<br>
<br><a name="gotop"></a>
 