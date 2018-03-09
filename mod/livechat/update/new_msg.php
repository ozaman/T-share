 
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


 

 ?>
 
 
 <?


///load_msg



 ////  
$user_chat_load_last = new DOMDocument(); 
 @$user_chat_load_last->load( '../data/xml/chat_check/vc/'.$_GET[vc].'.xml' ); 
//echo $xml_load_driver;
$user_chat_xml_last = $user_chat_load_last->getElementsByTagName( "newmsg" ); 
foreach( $user_chat_xml_last as $load_last) 
{ 
 $id=$load_last->getElementsByTagName('id')->item(0)->nodeValue;
 $user=$load_last->getElementsByTagName('user')->item(0)->nodeValue;
 
	  }
	  
	  
 

?>

<script>
  //$('#play_alert_msg_new').click();  



if(document.getElementById('load_msg').value==0){

   
if(document.getElementById('vcchat_last_id').value < <?=$id?>){ 





if(document.getElementById('chat_from').value !='<?=$user?>' ){ 

  $('#play_alert_msg_new').click();    
   
   }
 
 document.getElementById('load_msg').value=1;
 var url_chat_new_load = "<?=$chat_part?>go.php?name=livechat&file=sub_new&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>&type=check_guest&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lang=cn&lastid=<?=$id?>";
 
 url_chat_new_load=url_chat_new_load+"&lang="+document.getElementById('chat_lang').value;
 
 $('#chat-load-new-message-sub').hide(); 
 
 $('#chat-load-new-message-sub').load(url_chat_new_load);  
 
 $('#chat-load-new-message-sub').fadeIn(3000); 

   document.getElementById('vcchat_last_id').value='<?=$id?>';
    //alert('<?=$_GET[lang]?>');
   
 
   
 }
 
 
 
  }









if(document.getElementById('load_msg').value==1){


if(document.getElementById('vcchat_last_id').value < <?=$id?>){ 
// $('#play_alert_msg_new').click();  

if(document.getElementById('chat_from').value !='<?=$user?>' ){ 

  $('#play_alert_msg_new').click();    
   
   }
 
 document.getElementById('load_msg').value=1;
 var url_chat_new_load = "<?=$chat_part?>go.php?name=livechat&file=sub_new&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>&type=check_guest&chat_from=<?=$chat_from?>&chat_to=<?=$chat_to?>&lastid=<?=$id?>";
 url_chat_new_load=url_chat_new_load+"&lang="+document.getElementById('chat_lang').value;
 
 
  $('#chat-load-new-message-sub-<?=$id-1;?>').hide(); 
  
  
 $('#chat-load-new-message-sub-<?=$id-1;?>').load(url_chat_new_load);  
 
 $('#chat-load-new-message-sub-<?=$id-1;?>').fadeIn(3000); 
 

   document.getElementById('vcchat_last_id').value='<?=$id?>';
   
 
   
 }
 
 
 
  }
  
 
  
  

</script>

