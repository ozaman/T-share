<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model {
  
  public function add_shop($username){
  
	$number = $_POST[adult];
	$mm = $_POST[time_num];
	if($_POST[time_num]<10){
		$mm = "0".$_POST[time_num];
	}
	if($_POST[persion_china]<=0){
		$_POST[persion_china] = 0;
	}
	if($_POST[persion_other]<=0){
		$_POST[persion_other] = 0;
	}
		/*$data["code"] = "";
		$data["plan_id"] = $_POST[price_plan];
		$data["plan_commission"] = $arr[plan][plan_id];
		$data["price_park_unit"] = $price_park_driver;
		$data["price_park_total"] = $price_park_driver;
		$data["price_person_unit"] = $price_person_driver;
		$data["price_person_total"] = $all_price_person_driver;
//		$data["price_all_total"] = $price_park_driver + $all_price_person_driver;
		$data["price_extra_park"] = $price_extra_park;
		$data["price_extra_person"] = $price_extra_park;
		$data["income_price_park"] = $income_price_park;*/
		$data["pax"] = $_POST[adult];
		$data["program"] = $_POST[program];
		$data["transfer_date"] = date('Y-m-d');
//		$data["ondate"] = $_POST[transfer_date_new];
//		$data["outdate"] = $_POST[transfer_date_new];
		$data["airout_h"] = "00";
		$data["airout_m"] = $mm;
		$data["airout_time"] = "00".":"."$mm";
//		$data["car_color"] = $_POST[car_color];
		$data["car_type"] = trim($_POST[txt_car_type]);
		$data["i_cartype"] = $_POST[car_type];
		$data["car_plate"] = $_POST[car_plate];
		$data["check_use_car_id"] = $_POST[check_use_car_id];
		$data["adult"] = $_POST[adult];
		$data["child"] = $_POST[child];
		$data["phone"] = $_POST[dri_phone];
//		$data["nation"] = $_POST[nation];
		$data["booking_by"] = $_GET[driver];
//		$data["payment_type"] = $_POST[payment_type];
		$data["drivername"] = $_GET[driver];
//		$data["namedriver"] = $_POST[namedriver];
//		$data["ondate_time"] = $_POST[ondate_time];
//		"posted" = "$_SESSION[data_user_driver]";
		$data["post_date"] = time();
		$data["update_date"] = time();
		$data["num_ch"] = $_POST[persion_china];
		$data["num_other"] = $_POST[persion_other];

	$result = $this->db->insert('order_booking', $data);
	$last_id = mysql_insert_id();
	$data[last_id] = $last_id;
	$data[result] = $result;

	$member_db = $last_id;
	if ($member_db >= 10000)
	{
		$member_in = "$member_db";
	}
	elseif ($member_db >= 1000)
	{
		$member_in = "0$member_db";
	}
	elseif ($member_db >= 100)
	{
		$member_in = "00$member_db";
	}
	elseif ($member_db >= 10)
	{
		$member_in = "000$member_db";
	}
	else
	{
		$member_in = "0000$member_db";
	}
	$data_update[invoice] = "S$member_in";
//	$data_update[result] = $db->update_db('order_booking',$data_update,'id = "'.$last_id.'" ');
	$this->db->where('id', $last_id);
	$data_update[result] = $this->db->update('order_booking', $data_update); 
	
	$data[update] = $data_update;

	$this->linenoti();
	
	return $data;
	
  }
  
  public function cancel_shop(){
  	
  	$data[status] = "CANCEL";
	$data[cancel_type] = $_POST[type_cancel];
	$data[driver_complete] = 1;
	$data[update_date] = time();
// 	$data[result] = $db->update_db('order_booking',$data," id='".$_GET[id]."' ");
	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 


	$typname = "typname_".$_POST[type_cancel];
	$data_his[order_id] = $_GET[id];
	$data_his[type] = $_POST[$typname];
	$data_his[status] = "CANCEL";
	$data_his[type] = $_POST[type];
	$data_his[posted] = $_GET[username];
	$data_his[post_date] = time();
	$data_his[update_date] = time();
//	$data_his[result] = $db->add_db('history_del_order_booking', $data_his);
	$data_his[result] = $this->db->insert('history_del_order_booking', $data_his);;
//	$data_his[result] = true;
	$data[history] = $data_his;
	
	return $data;
  }
  
  function linenoti(){
	$txt_short = 'ทะเบียน '.$_POST[car_plate];
	$txt_short .=' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
	$title = "ทำรายการใหม่";
	$time_post = date('Y-m-d h:i:s');
	$mm = $_POST[time_num];
	if($_POST[time_num]<10){
		$mm = "0".$_POST[time_num];
	}
	if($_POST[adult]<1){
		$_POST[adult] = 0;
	}
	$txt_short2 = 'สถานที่ '. $_POST[pro_name].' ';
	$txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
	$txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
	$txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';

	$str  = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\n เบอร์โทร".$_POST[dri_phone];
	define('LINE_API',"https://notify-api.line.me/api/notify");
	$token = "NKtM17mRVqSAoIraJJyKbNkloWrF7QCM2kZCTsXvLXb"; //ใส่Token ที่copy เอาไว้
	$res = $this->notify_message($str,$token);

}

  function notify_message($message,$token){
	$queryData = array('message' => $message);
	$queryData = http_build_query($queryData,'','&');
	$headerOptions = array(
		'http'=>array(
			'method'=>'POST',
			'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($queryData)."\r\n",
			'content' => $queryData
		),
	);
	$context = stream_context_create($headerOptions);
	$result = file_get_contents(LINE_API,FALSE,$context);
}
  
  /**
  * *********** End
  */
}