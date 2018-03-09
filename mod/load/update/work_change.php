 
 
<?
 //echo $_GET[driver];
 
/////  
$driver_chat_load = new DOMDocument(); 
 @$driver_chat_load->load( '../data/xml/driver/work_change/to_'.$_GET[driver].'.xml' ); 
//echo $xml_load_driver;
$driver_chat_xml = $driver_chat_load->getElementsByTagName("online" ); 
foreach( $driver_chat_xml as $load) 
{ 
 $status=$load->getElementsByTagName('status')->item(0)->nodeValue;
  $type=$load->getElementsByTagName('type')->item(0)->nodeValue;
  $from=$load->getElementsByTagName('from')->item(0)->nodeValue;
  $to=$load->getElementsByTagName('to')->item(0)->nodeValue;
 
 $time=$load->getElementsByTagName('time')->item(0)->nodeValue;
 
 $id=$load->getElementsByTagName('id')->item(0)->nodeValue;
  
 
	  }
 ?>
 <?
 

 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); 

$res[from] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$from."' ");
$arr[from] = $db->fetch($res[from]);
 $arr[from][nickname];
 
 
 
$res[to] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$to."' ");
$arr[to] = $db->fetch($res[to]);
$arr[to][nickname];

 
 
 
  if($to==$_GET[driver] and  $status=='new'){ ?>
  
  <?  include "load/popup_change_work.php" ;?>
  
  
  <script>
    $( "#load_data_change_work_show" ).show();
 
  </script>
 

 
 <? }  else { ?>
 
   <script>
    $( "#load_data_change_work_show" ).hide();
 
  </script>
 <? } ?>