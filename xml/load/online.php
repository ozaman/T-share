<?
///// to place
$user_online_load = new DOMDocument(); 
 @$user_online_load->load( '../data/xml/driver/online/'.$user_id.'.xml' ); 
//echo $xml_load_driver;
$user_online_xml = $user_online_load->getElementsByTagName( "newmsg" ); 
foreach( $user_online_xml as $load) 
{ 
 echo $onlinetime=$load->getElementsByTagName('time')->item(0)->nodeValue;
 } 
 
?>


