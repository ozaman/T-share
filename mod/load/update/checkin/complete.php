 
<?

 

///// to place
$vc_chat_load = new DOMDocument(); 
$vc_chat_load->load( '../data/xml/taxi/status/complete_new.xml' ); 
//echo $xml_load_driver;
$vc_chat_xml = $vc_chat_load->getElementsByTagName( "newvc" ); 
foreach( $vc_chat_xml as $load) 
{ 
 
 
 
 $vc_id=$load->getElementsByTagName('id')->item(0)->nodeValue;
 
   $vc_status=$load->getElementsByTagName('status')->item(0)->nodeValue;
  $vc_time=$load->getElementsByTagName('time')->item(0)->nodeValue;
   
   $vc_code=$load->getElementsByTagName('code')->item(0)->nodeValue;   
 
  
 
 
}


?>






<?




 
  if($vc_status==1){ ?>
  
  
  <script>
 
 
 
  $('#load_data_new_alert').fadeIn();
 
 /// ion.sound.play("taxi_work_new");
 
 /// $("#play_in_phone").click(); 
 
 var url_chat = "go.php?name=booking/update&file=new_complete&id=<?=$vc_id?>";
 $('#load_data_new_alert').load(url_chat); 
  
 
 
  
   </script>
 
    <? 
	
 
	
$_GET[vc]='new';
	
	$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>0</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
 $newvc .= "<code>".$vc_code."</code>\n";
 
$newvc .= "<id>".$vc_id."</id>\n";
 
$newvc .= "</newvc>";
 

@unlink("$folder_xml/taxi/status/complete_new.xml");
@$fd = @fopen("$folder_xml/taxi/status/complete_new.xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

 
	
  } ?>
   
   
   
   
   

    