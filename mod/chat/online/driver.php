 
<?
///// to place
$user_chat_load = new DOMDocument(); 

 

 @$user_chat_load->load( '../data/xml/guest/chat/from//driver_'.$_GET[vc].'.xml' ); 
//echo $xml_load_driver;
$user_chat_xml = $user_chat_load->getElementsByTagName( "newmsg" ); 
foreach( $user_chat_xml as $load) 
{ 
 $newchat=$load->getElementsByTagName('status')->item(0)->nodeValue;
  $newchat_message=$load->getElementsByTagName('message')->item(0)->nodeValue;
   $newchat_time=$load->getElementsByTagName('time')->item(0)->nodeValue;
   $newchat_type=$load->getElementsByTagName('type')->item(0)->nodeValue;
      $newchat_vc=$load->getElementsByTagName('vc')->item(0)->nodeValue;
///  $newchat_state_type=$load->getElementsByTagName('statetype')->item(0)->nodeValue;
   
   if($newchat_type<>14){
   $iconalert="fa-commenting";
   }
 if($newchat_type==14){
   $iconalert="fa-map-marker";
   }
   
   
 } 
 
  if($newchat==1){ ?>
  
  <script>
    $("#play_alert_msg_new").click(); 
 
setTimeout(function () {
 

 
   var url_chat = "go.php?name=chat&file=sub&vc=<?=$newchat_vc?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";

}, 5000);  
 
 
   </script>
   
   <? } ?>
 
 
   
   
   
  <? 
 
  $folder_xml="../data/xml";

$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
$product .= "<status>0</status>\n";
$product .= "</newmsg>";

@unlink("$folder_xml/guest/chat/from/driver_".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/guest/chat/from/driver_".$_GET[vc].".xml", "a+");
@fputs($fd, $product . "");
@fclose($fd);

  }
  
  
  
?>
 