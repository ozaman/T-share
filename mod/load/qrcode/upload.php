<?
 
$FILE = $_FILES['FILE'];
 
copy ($_FILES['fileupload']['tmp_name'] , "../../admin/file/driver/qrcode/".$_POST[type]."_".$_POST[userid].".png" ); 
//opy ($_FILES['fileupload']['tmp_name'], "".$_POST[userid].".png" ); 

?>
 





