 <script>
 
   ///$("#play_alert_msg_new").click(); 
 
   </script>
<?
///// to place
$driver_chat_load = new DOMDocument(); 
 @$driver_chat_load->load( '../data/xml/driver/chat/'.$_GET[driver].'.xml' ); 
//echo $xml_load_driver;
$driver_chat_xml = $driver_chat_load->getElementsByTagName( "newmsg" ); 
foreach( $driver_chat_xml as $load) 
{ 

 $newchat_id=$load->getElementsByTagName('id')->item(0)->nodeValue;
  $newchat_vc=$load->getElementsByTagName('vc')->item(0)->nodeValue;
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
 





 
 
    var url_chat = "go.php?name=livechat&file=sub_new&vc=<?=$newchat_vc?>&lastid=<?=$newchat_id?>";
  $('#chat-load-new-<?=$newchat_id?>').load(url_chat); 
  
   $('#chat-load-new-<?=$newchat_id?>').fadeIn(2000);
 
 
   /// document.getElementById('message').value="ss";
 
  
   
 
 
 

 
  
  
  
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
  
  
  
  
  
  
    $folder_xml="../data/xml";

$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<online>\n";
$product .= "<status>1</status>\n";
$product .="<lat>".$_GET[lat]."</lat>\n";
$product .="<lng>".$_GET[lng]."</lng>\n";
$product .="<time>".time()."</time>";
$product .= "</online>";

@unlink("$folder_xml/callcenter/online/company/1.xml");
@$fd = @fopen("$folder_xml/callcenter/online/company/1.xml", "a+");
@fputs($fd, $product . "");
@fclose($fd);
 
 
  
  
  
  
?>
 