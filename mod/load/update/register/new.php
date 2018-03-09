 
 
 

 
<?

 

///// to place
$user_chat_load = new DOMDocument(); 
$user_chat_load->load( '../data/xml/register/taxi/new.xml' ); 
//echo $xml_load_driver;
$user_chat_xml = $user_chat_load->getElementsByTagName( "newdriver" ); 
foreach( $user_chat_xml as $load) 
{ 
 
 
 
 $user_id=$load->getElementsByTagName('id')->item(0)->nodeValue;
 
   $user_status=$load->getElementsByTagName('status')->item(0)->nodeValue;
  $user_time=$load->getElementsByTagName('time')->item(0)->nodeValue;
   $user_name=$load->getElementsByTagName('name')->item(0)->nodeValue;
   $user_phone=$load->getElementsByTagName('phone')->item(0)->nodeValue;
   
   $user_code=$load->getElementsByTagName('code')->item(0)->nodeValue;   
  //$user_status=1; 
  
 
 
}


?>






<?




 
  if($user_status==1){ ?>
  
  
  <script>
  
 
 
 
   $('#load_data_new_alert').fadeIn();
 
  //ion.sound.play("register_new");
 
 /// $("#play_in_phone").click(); 
 
     var url_chat = "go.php?name=register/update&file=new_register&id=<?=$user_id?>";
  $('#load_data_new_alert').load(url_chat); 
  
  
   
  document.getElementById('check_status_new_register_alert').value='5';
  
   </script>
 
    <? 
	
$_GET[vc]='new';
	
	$folder_xml="../data/xml";
$newdriver = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newdriver>\n";
 
 
 
///$newdriver .= "<id>".$arr[chatlast][id]."</id>\n";
$newdriver .= "<status>0</status>\n";
$newdriver .= "<time>".date("H:i:s")."</time>\n";
$newdriver .= "<name>".$user_name."</name>\n";
$newdriver .= "<phone>".$user_phone."</phone>\n";
$newdriver .= "<code>".$user_code."</code>\n";

$newdriver .= "<id>".$user_id."</id>\n";

 
$newdriver .= "</newdriver>";
 

@unlink("$folder_xml/register/taxi/".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/register/taxi/".$_GET[vc].".xml", "a+");
@fputs($fd, $newdriver . "");
@fclose($fd);

	
	
  } ?>
   
   
   
   
   

    