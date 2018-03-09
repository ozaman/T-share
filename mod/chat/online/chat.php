 
<?
///// to place
$user_chat_load = new DOMDocument(); 
 @$user_chat_load->load( '../data/xml/driver/chat/'.$_GET[driver].'.xml' ); 
//echo $xml_load_driver;
$user_chat_xml = $user_chat_load->getElementsByTagName( "newmsg" ); 
foreach( $user_chat_xml as $load) 
{ 
 $newchat=$load->getElementsByTagName('status')->item(0)->nodeValue;
  $newchat_message=$load->getElementsByTagName('message')->item(0)->nodeValue;
   $newchat_time=$load->getElementsByTagName('time')->item(0)->nodeValue;
   $newchat_type=$load->getElementsByTagName('type')->item(0)->nodeValue;
      $newchat_state_type=$load->getElementsByTagName('statetype')->item(0)->nodeValue;
   
   if($newchat_type<>14){
   $iconalert="fa-commenting";
   }
 if($newchat_type==14){
   $iconalert="fa-map-marker";
   }
   
   
 } 
 
  if($newchat==1){ ?>
  
  <script>

 $("#box_popup_alert_message").show(); 

 
 setTimeout(function () {
 
  $("#box_popup_alert_message").hide(); 

}, 10000);  


 setTimeout(function () {
 

 
   var url_chat = "go.php?name=livechat&file=sub&vc="+document.getElementById('vc_chat').value;
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
   
}, 5000);  
 
 

 
  
  
  
$("#box_alert_new_msg").show(); 
$("#box_alert_new_msg_comment").html('<?=$newchat_message?>'); 
$("#box_alert_new_msg_time").html('<?=$newchat_time?>'); 
$("#box_alert_new_msg_icon").html('<i class="fa <?=$iconalert?>"  style=" font-size:36px; color:#FFFFFF "></i>'); 
		
		
		 
		 
		 
		
		
/// $("#topmenu_icon_alert_new_msg").show(); 
		
		

 ////alert('มีข้อความใหม่');
 
   </script>
 
   <? if($newchat_state_type=='phone'){?>
   <script>
    $("#play_in_phone").click(); 
   </script>
   
   <? } ?>
   
      <? if($newchat_state_type<>'phone'){?>
   <script>
  /// $("#play_in_phone").click(); 
   
    $("#play_alert_msg_new").click(); 
   </script>
   
   <? } ?>
 
 
   
   
   
  <? 
  
  $folder_xml="../data/xml";

$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
$product .= "<status>0</status>\n";
$product .= "</newmsg>";

@unlink("$folder_xml/driver/chat/".$_GET[driver].".xml");
@$fd = @fopen("$folder_xml/driver/chat/".$_GET[driver].".xml", "a+");
@fputs($fd, $product . "");
@fclose($fd);

  }
  
  
  
?>
 