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
	$data[result] = $db->update_db('order_booking',$data,'id = "'.$_GET[order_id].'" ');
	$data[order_id] = $_GET[order_id];

	header('Content-Type: application/json');
 	echo json_encode($data);
} 

if($_GET[action]=='approve_pay_driver_admin'){
	
	$data[order_id] = $_POST[order_id];
	$data[invoice] = $_POST[invoice];
	$data[total_price] = $_POST[all_total];
	$data[plan_id] = $_POST[plan];
	$data[status] = 1;
	$data[last_update] = time();
	$data[posted] = $_COOKIE[app_remember_user];
	
	if($_POST[check_park]==NULL){
		$_POST[check_park] = 0;
	}
	if($_POST[check_person]==NULL){
		$_POST[check_person] = 0;
	}
	if($_POST[check_com]==NULL){
		$_POST[check_com] = 0;
	}
	$data_plan[check_park] = $_POST[check_park];
	$data_plan[check_person] = $_POST[check_person];
	$data_plan[check_com] = $_POST[check_com];
	
	$data[income_driver] = json_encode($data_plan);
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->add_db("pay_history_driver_shopping",$data); 
	
	$cn[id] =  $_POST[cn];
	$cn[pax] =  $_POST[regis_cn_pax_input];
	$cn[price_unit] =  $_POST[price_person_cn];
	
	$oth[id] =  $_POST[oth];
	$oth[pax] =  $_POST[regis_oth_pax_input];
	$oth[price_unit] =  $_POST[price_person_oth];
	
	$json_nation_price[0] = $cn;
	$json_nation_price[1] = $oth;
	
	$data_ob[driver_payment] = 1;
	$data_ob[pax] = intval($_POST[regis_cn_pax_input]) + intval($_POST[regis_oth_pax_input]);
	
	$data_ob[price_all_total] = $_POST[all_total];
	$data_ob[price_park_unit] = $_POST[park_price];
	$data_ob[price_park_total] = $_POST[park_price];
	$data_ob[price_person_unit] = $_POST[price_person_cn];
	$data_ob[price_person_total] = $_POST[total_person];
	$data_ob[driver_payment_date] = time();
	$data_ob[json_nation_price] = json_encode($json_nation_price);
	$data_ob[check_lab_pay] = 1;
	
	$data_ob[result] = $db->update_db("order_booking",$data_ob,"id = '".$_POST[order_id]."' "); 
	
	$return[his] = $data;
	$return[book] = $data_ob;
	echo json_encode($return);
	
}

if($_GET[action]=='approve_pay_driver_taxi'){
	
	$data[driver_approve] = 1;
	$data[driver_approve_pay_date] = time();
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db("pay_history_driver_shopping",$data,"order_id = '".$_POST[order_id]."'  and status = 1 "); 
	
	$data_ob[check_driver_pay] = 1;
	$data_ob[result] = $db->update_db("order_booking",$data_ob,"id = '".$_POST[order_id]."' "); 
	
	$res[his_pay] = $data;
	$res[ob_pay] = $data_ob;
	echo json_encode($res);
	
}	

if($_GET[query]=='history_driver'){
	
$url = "http://www.welovetaxi.com:3000/getOrderhisdriver";                              

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST

$curl_post_data2 = '{"driver": '.$_POST[driver].',"date":"'.$_POST[date].'"}';

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$result = curl_exec($ch);
//close cURL resource
curl_close($ch);
$decode = 	json_decode($result);
header('Content-Type: application/json');
echo json_encode($decode);	
	
}

if($_GET[query]=='history_lab'){
	
$url = "http://www.welovetaxi.com:3000/getOrderhislab";                              

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST

$curl_post_data2 = '{"date":"'.$_POST[date].'"}';

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$result = curl_exec($ch);
//close cURL resource
curl_close($ch);
$decode = 	json_decode($result);
header('Content-Type: application/json');
echo json_encode($decode);	
	
}

if($_GET[update]=="update_time_toplace"){
	
	$id = $_POST[order_id];
	$data[airout_m] = $_POST[time];
	$data[update_date] = time();
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db("order_booking",$data,"id = '".$id."'  "); 
	
	header('Content-Type: application/json');
	echo json_encode($data);
}
?>