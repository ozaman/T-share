<?php 
include('../../../includes/class.mysql.php');
//include('../../../includes/config.in.php');
define("DB_HOST_HIS","localhost");
define("DB_NAME_HIS","admin_his");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_app");
$db = new DB();
if($_GET[type]=="cancel"){
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[status] = "CANCEL";
	$data[cancel_type] = $_GET[cancel_type];
	$data[booking_edit] = 1;
	$data[update_date] = TIMESTAMP;
// 	$data[result] = $db->update_db('order_booking',$data," id='".$_GET[id]."' ");
 	$data[result] = true;
	$data_his[vc_id] = $_GET[id];
	$data_his[status] = "CANCEL";
	$data_his[cancel_type] = $_GET[cancel_type];
	$data_his[user_class] = "driver";
	$data_his[posted] = $_SESSION[data_user_id];
	$data_his[post_date] = TIMESTAMP;
	$data_his[update_date] = TIMESTAMP;
//	$data_his[result] = $db->add_db('history_edit', $data_his);
	$data_his[result] = true;
	$data[history] = $data_his;
    $db->closedb();
    header('Content-Type: application/json');
    echo json_encode($data);
}

if($_GET[action]=="check_driver_topoint"){  
	/////
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$data[$_GET[type].'_date'] = time();
$data[$_GET[type]] = 1;
$data["check_".$_GET[type]] = 1;
$data[$_GET[type]."_lat"] = $_GET[lat];
$data[$_GET[type]."_lng"] = $_GET[lng];
$data["update_date"] = time();
$data[result] = $db->update_db('order_booking', $data ," id='".$_GET[id]."' ");
//$data[result] = TRUE;
$data[next_step] = "guest_receive";
$db->closedb ();
if($data[result]==0){
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
}
 header('Content-Type: application/json');
 echo json_encode($data);
 $arr[project][id] = $_GET[id];
 } 

if($_GET[action]=="check_guest_receive"){
	
	$data[check_guest_receive] = 1;
	$data[guest_receive_date] = time();
	$data[driver_pickup_lat] = $_GET[lat];
	$data[driver_pickup_lng] = $_GET[lng];
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
//	$data[result] = TRUE;
	$data[next_step] = "guest_register";
	header('Content-Type: application/json');
 	echo json_encode($data);
}

if($_GET[action]=="check_guest_register"){
	
	$data[check_guest_register] = 1;
	$data[guest_register_date] = time();
	$data[driver_register_lat] = $_GET[lat];
	$data[driver_register_lng] = $_GET[lng];
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
//	$data[result] = TRUE;
	$data[next_step] = "driver_pay_report";
	header('Content-Type: application/json');
 	echo json_encode($data);
}

if($_GET[action]=="check_driver_pay_report"){
	
	$data[check_driver_pay_report] = 1;
	$data[driver_pay_report_date] = time();
	$data[driver_register_lat] = $_GET[lat];
	$data[driver_register_lng] = $_GET[lng];
	
	/*$data[driver_complete] = 1;
	$data[driver_complete_date] = time();
	$data[driver_complete_lat] = $_GET[lat];
	$data[driver_complete_lng] = $_GET[lng];*/
	
//	$data[status] = "COMPLETED";
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
//	$data[result] = TRUE;
	$data[next_step] = "finish";
	header('Content-Type: application/json');
 	echo json_encode($data);
} 	

if($_GET[action]=="check_driver_complete"){
	
	$data[driver_complete] = 1;
	$data[driver_complete_date] = time();
	$data[driver_complete_lat] = $_GET[lat];
	$data[driver_complete_lng] = $_GET[lng];
	$data[status] = "COMPLETED";
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');

	header('Content-Type: application/json');
 	echo json_encode($data);
} 

if($_GET[action]=='approve_pay_driver_admin'){
	
	$data[order_id] = $_POST[order_id];
	$data[invoice] = $_POST[invoice];
	$data[total_price] = $_POST[price];
	$data[type] = $_POST[type];
	$data[status] = 1;
	$data[last_update] = time();
	$data[posted] = $_COOKIE[app_remember_user];
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->add_db("pay_history_driver_shopping",$data); 
	
	$data_ob[driver_payment] = 1;
	$data_ob[driver_payment_date] = time();
	$data[result_ob] = $db->add_db("order_booking",$data_ob,"id = '".$_POST[order_id]."' "); 
	
	echo json_encode($data);
	?>
	<script>
		$('#tr_btn_<?=$_POST[type];?>_pay_<?=$_POST[order_id];?>').hide();
		$('#pay_<?=$_POST[type];?>_admin_<?=$_POST[order_id];?>').css('background-color','#59AA47');
		$('#txt_pay_<?=$_POST[type];?>_<?=$_POST[order_id];?>').html('<font color="#59AA47;"><b>จ่ายแล้ว</b></font>');
		$('#price_<?=$_POST[type];?>_time_payment_<?=$_POST[order_id];?>').html('<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;<?=date("H:i:s",time());?></span>');
	</script>
	<?
}

if($_GET[action]=='approve_pay_driver_taxi'){
	
	$data[driver_approve] = 1;
	$data[driver_approve_pay_date] = time();
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db("pay_history_driver_shopping",$data,"order_id = '".$_POST[order_id]."' and type = '".$_POST[type]."' and status = 1 "); 
	echo json_encode($data);
	?>
	<script>
		$('#tr_btn_<?=$_POST[type];?>_approve_<?=$_POST[order_id];?>').hide();
		$('#pay_<?=$_POST[type];?>_taxi_<?=$_POST[order_id];?>').css('background-color','#59AA47');
		
		$('#txt_pay_<?=$_POST[type];?>_<?=$_POST[order_id];?>').html('<font color="#59AA47;"><b>ได้รับเงินแล้ว</b></font>');
		$('#price_<?=$_POST[type];?>_time_payment_<?=$_POST[order_id];?>').html('<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;<?=date("H:i:s",time());?></span>');
		
		$('#pay_<?=$_POST[type];?>_taxi_<?=$_POST[order_id];?>').css('background-color','#59AA47');
	</script>
	<?
}	

if($_GET[query]=='history'){
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[ob] = $db->select_query("SELECT * FROM order_booking  WHERE transfer_date = '".$_POST[date]."' ");
	while($arr[ob] = $db->fetch($res[ob])){
		$row[] = $arr[ob];
	}
	header('Content-Type: application/json');
	echo json_encode($row);
}
?>