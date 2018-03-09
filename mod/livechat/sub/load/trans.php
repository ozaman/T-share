 

<?

 



$user_chat_load_last = new DOMDocument(); 
 @$user_chat_load_last->load( "../data/xml/translate/".$_GET[vc]."_".$_GET[id]."_".$_GET[from].".xml" ); 
//echo $xml_load_driver;
$user_chat_xml_last = $user_chat_load_last->getElementsByTagName( "trans" ); 
foreach( $user_chat_xml_last as $load_last) 
{ 
 echo $trans_message=$load_last->getElementsByTagName('t')->item(0)->nodeValue;
 
 }


?>