



 <?

if($_GET[action]){  ?>



<? 



 
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
 	
 "date_".$_GET[type] => "" . TIMESTAMP . "" ,
 "check_".$_GET[type] => "0",  
 
  "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
	
 
 
 
 
			
 ////////////////
		
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
		
$res[project] = $db->select_query("SELECT id,drivername,program FROM  order_booking  where  id='".$_GET[id]."' ");
$arr[project] = $db->fetch($res[project]);
  
  
$res[place] = $db->select_query("SELECT topic_th FROM  shopping_product  where  id='".$arr[project][program]."' ");
$arr[place] = $db->fetch($res[place]);
  
		 
 
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<update>\n";
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".time()."</time>\n";
$newvc .= "<date>".date("H:i:s")."</date>\n";

$newvc .= "<driver>".$arr[project][drivername]."</driver>\n"; 
$newvc .= "<place>".$arr[project][program]."</place>\n"; 
$newvc .= "<placename>".$arr[place][topic_th]."</placename>\n"; 


$newvc .= "<type>".$_GET[action]."</type>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 

$newvc .= "</update>";
 

@unlink("$folder_xml/taxi/status/".$arr[project][drivername].".xml");
@$fd = @fopen("$folder_xml/taxi/status/".$arr[project][drivername].".xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		
 
 $arr[project][id]=$_GET[id];
	
 
		
	?>
 
    
 <script type="text/javascript">
 
 
  var url_driver_topoint_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_<?=$_GET[type]?>&time=<?=TIMESTAMP?>&status=1";
  
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][id]?>').load(url_driver_topoint_<? echo $arr[project][id];?>); 
 
 
 $('#iconchk_<?=$_GET[type]?>_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
 $("#number_<?=$_GET[type]?>_<?=$arr[project][id];?>").removeClass('step-booking');
  
 $("#number_<?=$_GET[type]?>_<?=$arr[project][id];?>").addClass('step-booking-active');
 
 
 
$("#box_<?=$_GET[type]?>_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
   
 
 
</script>
    
 
    
 <? } ?>
 
 
 
 
 
 
 
 
 
 
  <?

if($_GET[op]=='cancel' and  $_GET[type]=='no_show'  ){

 
 
 
 
 
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 $db->update_db('order_booking', array(
  
 "status" => "CANCEL",
 "cancel_type" => "no_show",
  "booking_edit" => "1", 
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
 
		
		
 ///// /history
  $db->add_db('history_edit', array(
 "vc_id" => "$_GET[id]",
 "status" => "CANCEL",
 "cancel_type" => "no_show",
 
  "user_class" => "driver",
 
    "posted" => "$_SESSION[data_user_id]",
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	
        ));
        $db->closedb();
		
		
		
		
		
		
		
		
		
 
/// 

 $arr[project][id]=$_GET[id];
 
 
 
 
 
 
 
 
 
 
 
 
 
		
		
	?>
    
 
    <script>
	
 $("#main_sub_booking_div_<?=$arr[project][id]?>").hide();
 
 
   var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status&id=<?=$arr[project][id]?>&type=stop";
 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);
 
	</script>
    
    
    
    
<? }  ?>