 
 <? echo date("H:i:s");  ?>
 
 
   <?  include ("includes/lang/chat.php");?> 
 <?
 
 
 if($_GET[lang]=='th'){
 
 $read='อ่านแล้ว';
 
 }
 
 
  
 if($_GET[lang]=='en'){
 
 $read='Read';
 
 }
 
  if($_GET[lang]=='cn'){
 
 $read='阅读';
 
 }
 
 

 
 
 
 
 
 
$folder_xml="../data/xml";
//////
$online = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<online>\n";
$online .="<ip>".$_SERVER['REMOTE_ADDR']."</ip>\n";
$online .="<vc>".$_GET[vc]."</vc>\n";
$online .="<order>".$_GET[order]."</order>\n";
$online .="<lat>".$_GET[lat]."</lat>\n";
$online .="<lng>".$_GET[lng]."</lng>\n";
$online .="<time>".time()."</time>";
$online .= "\n</online>";




 
 
//// vc
@unlink("$folder_xml/".$_GET[chat_from]."/online/vc/".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/".$_GET[chat_from]."/online/vc/".$_GET[vc].".xml", "a+");
@fputs($fd, $online . "");

//// order
@unlink("$folder_xml/".$_GET[chat_from]."/online/order/".$_GET[order].".xml");
@$fdorder = @fopen("$folder_xml/".$_GET[chat_from]."/online/order/".$_GET[order].".xml", "a+");
@fputs($fdorder, $online . "");
//////

@fclose($fd);

?>
 
 
 
 
 <?
 
 
 

 
/////  
$user_chat_load = new DOMDocument(); 
 @$user_chat_load->load( '../data/xml/'.$_GET[chat_to].'/online/vc/'.$_GET[vc].'.xml' ); 
//echo $xml_load_driver;
$user_chat_xml = $user_chat_load->getElementsByTagName( "online" ); 
foreach( $user_chat_xml as $load) 
{ 
 $lat=$load->getElementsByTagName('lat')->item(0)->nodeValue;
  $lng=$load->getElementsByTagName('lng')->item(0)->nodeValue;
  $time=$load->getElementsByTagName('time')->item(0)->nodeValue;
 
 
 
   }
 ?>
 
  <? 
  
   $online_time=time()-$time;  ?>
  
  <?
  
  $online_time =1;
  
  
 if($online_time<4){ 
  

require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
 
$db = New DB();
$db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
 
$db->update_db('vc'.$_GET[vc].'',array(

 
 
			"read_msg"=>"1",
			 
		)," comment_to='".$_GET[chat_from]."' and voucher='".$_GET[vc]."' and read_msg=0  ");
		$db->closedb ();
  
  
  
  
  
  
  
  
  
  ?>
  
  
  
  
  
  
  
  
  
  
  
 
<script>


if(document.getElementById('<?=$_GET[chat_to]?>_online').value=='0'){
 // $( "#alert_show_user_online" ).toggle();
 //$("#alert_show_user_online").fadeIn(3000);
  
 document.getElementById('<?=$_GET[chat_to]?>_online').value='1';

}

 
  ///อ่านแล้ว
 
  $( ".read_<?=$_GET[chat_from]?>" ).html('<?=$read?> (2)');
  
$( "#chat_icon_user_status" ).addClass("user-status-online");
$( "#chat_icon_user_status_text" ).html('&nbsp;<font color="#EE0707"><b>Online');

</script>
 <?  }
  ?> 
  
<? if($online_time>3){ ?>
 
<script>
 document.getElementById('<?=$_GET[chat_to]?>_online').value='0';
// $("#alert_show_user_online").fadeOut(2000);
$( "#chat_icon_user_status" ).removeClass("user-status-online");
$( "#chat_icon_user_status_text" ).html('&nbsp;<font color="#333333"><b>Offline');
</script>
 <?  }
  ?> 
  
 <?
 //echo $_GET[lat];
 
$user_id=$_GET[driver];
$folder_xml="../data/xml/realtime/";

$online = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<markers>\n";
$online .="<marker status=\"busy\" lat=\"$_GET[lat]\" lng=\"$_GET[lng]\"/>\n";
$online .="<marker status=\"free\" lat=\"$lat\" lng=\"$lng\"/>\n";
 
$online .= "\n</markers>";
 @unlink("$folder_xml/".$_GET[vc]."_".$_GET[chat_from].".xml");
 @$fd = @fopen("$folder_xml/".$_GET[vc]."_".$_GET[chat_from].".xml", "a+");
 @fputs($fd, $online . "");
 @fclose($fd);
 
?>
  