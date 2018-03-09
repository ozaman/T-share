 
 
 
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
 
  <?  $online_time=time()-$time;  ?>
  
  <? if($online_time<10){ ?>
 
<script>

if(document.getElementById('<?=$_GET[chat_to]?>_online').value=='0'){
 // $( "#alert_show_user_online" ).toggle();
 $("#alert_show_user_online").fadeIn(3000);
  
 document.getElementById('<?=$_GET[chat_to]?>_online').value='1';

}

 
  
 
  
  
$( "#chat_icon_user_status" ).addClass("user-status-online");
$( "#chat_icon_user_status_text" ).html('&nbsp;<font color="#EE0707"><b><?=chat_online?>');

</script>
 <?  }
  ?> 
  
<? if($online_time>10){ ?>

<script>
 document.getElementById('<?=$_GET[chat_to]?>_online').value='0';
 $("#alert_show_user_online").fadeOut(2000);
$( "#chat_icon_user_status" ).removeClass("user-status-online");
$( "#chat_icon_user_status_text" ).html('&nbsp;<font color="#333333"><b><?=chat_offline?>');
</script>
 <?  }
  ?> 
  