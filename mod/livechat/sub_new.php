   <?  include ("includes/lang/chat.php");?>  
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

 $update_id=$_GET[lastid]-1;
 ?>
 
 
 
  <?
 
 $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$limit = 1 ;
 
  $res[chatlast] = $db->select_query("SELECT * FROM vc".$_GET[vc]." ORDER BY id desc limit 1"); 
 $arr[chatlast] = $db->fetch($res[chatlast]);

$res[chat] = $db->select_query("SELECT * FROM vc".$_GET[vc]." where id > '".$update_id." ' AND (comment_to='".$chat_to."' or comment_to='".$chat_from."')  ORDER BY id asc limit 2");
$count=0;
while($arr[chat] = $db->fetch($res[chat])){



 
 /// comment_from
?>  
  <? if($arr[chat][comment_id]>0){
			  $res[storechat] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store  where id='".$arr[chat][comment_id]."' ");
$arr[storechat] = $db->fetch($res[storechat]);
			  
			  $arr[chat][comment]=$arr[storechat][topic_th];
 
			  }
			   ?>
			
			
			 <?  include ("mod/livechat/message/list.php");?> 
				
				 
				<? } ?>
 
 
 <div id="chat-load-new"  style="height:250px;" > 
 				<div id="chat-load-new-message-sub-<?=$_GET[lastid]?>"  style="display:nones; margin-top:10px; "  > 
 
				 <div>   
				 <div>   
 
<script>
document.getElementById('message').value="";
$(".messages").animate({ scrollTop: 99999 }, 3000);
 
  </script> 
 