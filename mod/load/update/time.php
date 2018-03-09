 <?   echo date("H:i:s");  ?>
 
 
<?
//echo $_GET[lat];

$driver_id=$_GET[driver];
$folder_xml="../data/xml";

$online = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<online>\n";
$online .="<lat>".$_GET[lat]."</lat>\n";
$online .="<lng>".$_GET[lng]."</lng>\n";
$online .="<time>".time()."</time>";
$online .= "\n</online>";
@unlink("$folder_xml/driver/online/".$driver_id.".xml");
@$fd = @fopen("$folder_xml/driver/online/".$driver_id.".xml", "a+");
@fputs($fd, $online . "");
@fclose($fd);

?>

 