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
		if (1<0) {
			# code...

			$_where = array();
			$_where['i_shop_country_com_list'] = $_POST[price_plan];
			$_select = array('*');
			$_order = array();
			$_order['id'] = 'asc';
			$list_price = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);
			$_where = array();
			$_where['i_plan_price'] = $list_price[0]->i_plan_price;
			$_select = array('*');
			$_order = array();
			$_order['id'] = 'asc';
			$ick = 0;

			$list_pricex = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
			foreach ($list_pricex as $key => $value) {
				$_where = array();
				$_where['id'] = $value->i_plan_com;
				$_select = array('s_col');
				$_order = array();
				$_order['id'] = 'asc';
				$list_prices = $this->Main_model->rowdata(TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select);
				$s_col = $list_prices->s_col;
				
				if ($value->i_plan_com == 5) {
					if ($list_price[$ick]->s_topic_en == 'park') {

			// if ($ick == 1) {
						$price_person_total = (1*$list_price[$ick]->i_price) * (1*$_POST[adult]);
						$data["aaaaaa".$s_col] = $list_price[$ick]->s_topic_en;
					// }		


					}
					else{
						$price_person_total = $list_price[$ick]->i_price * 1;
						$data["bbbbb".$s_col] = $list_price[$ick]->s_topic_en;


					}
					$data[$s_col] = 1*$list_price[$ick]->i_price;;
					$data["price_person_total"] = 1*$price_person_total;

				}
				else{
					$data[$s_col] =  $list_price[$ick]->i_price;

				}
				$ick++;
			}
		}
		/**********************************************************************************************/
		/*************************              ********************************************************/
		/**********************************************************************************************/
		$_where = array();
		$_where['i_shop_country_com_list'] = $_POST[price_plan];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';

		$list_price = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);

		foreach ($list_price as $key => $value) {
			$_where = array();
			$_where['id'] = $value->i_plan_product_price_name;
			$_select = array('s_col');
			$_order = array();
			$_order['id'] = 'asc';
			$price_name = $this->Main_model->rowdata(TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select);
			// return $price_name;
			$s_col = $price_name->s_col;
			if ($value->i_plan_product_price_name == 6) {
				$price_person_total = (1*$value->i_price) * (1*$_POST[adult]);
				// $data["aaaaaa".$s_col] = $value->s_topic_en;
				$data[$s_col] = 1*$value->i_price;;
				$data["price_person_total"] = 1*$price_person_total;
				
			}


			else{
				$data[$s_col] =  $value->i_price;

			}
			
			if($value->s_topic_en=="comision"){
				$data[check_tran_job] = 1;
			}

			// $ick++;
		}

		// return  $data;
		// $data["price_all_total"] = $price_park_driver + $all_price_person_driver;
		// $data["commission_persent"] = 1*$_POST[commission_persent];




		$data["plan_setting"] = $_POST[plan_setting];
		
		$data["plan_id"] = $_POST[price_plan];
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
		$data["driver_remark"] = $_POST[remark];
//		$data["ondate_time"] = $_POST[ondate_time];
//		"posted" = "$_SESSION[data_user_driver]";
		$data["post_date"] = time();
		$data["update_date"] = time();
        if($_POST[bank_user_select]){
          $data[bank_taxi_id] = $_POST[bank_user_select];
        }
//		if($_POST[nation]==1){
//			$data["num_ch"] = $_POST[persion_china];
//		}else if($_POST[nation]==2){
//			$data["num_other"] = $_POST[persion_other];
//		}else{
//			$data["num_ch"] = $_POST[persion_china];
//			$data["num_other"] = $_POST[persion_other];
//		}
		
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

		if ($data_update[result] == true) {
			$this->linenoti();
			# code...
		}

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
		
		if ($_POST[remark] != '') {
			$txt_short2 .= "\n\n".'หมายเหตุ '.$_POST[remark];
			# code...
		}

		$str  = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\nเบอร์โทร".' '. $_POST[dri_phone] ."\n".'' ;
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

public function driver_topoint(){

	$data[$_GET[type].'_date'] = time();
	$data[$_GET[type]] = 1;
	$data["check_".$_GET[type]] = 1;
	$data[$_GET[type]."_lat"] = $_GET[lat];
	$data[$_GET[type]."_lng"] = $_GET[lng];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true; 
	$data[next_step] = "guest_receive";
	$data[time] = time();

	return $data;
}

public function guest_receive(){

	$data[check_guest_receive] = 1;
	$data[guest_receive_date] = time();
	$data[driver_pickup_lat] = $_GET[lat];
	$data[driver_pickup_lng] = $_GET[lng];
	$data[guest_receive_ps] = $_COOKIE[detect_user];
	
	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "guest_register";
	$data[time] = time();

	return $data;
}

public function guest_register(){
	$data[check_guest_register] = 1;
	$data[guest_register_date] = time();
	$data[driver_register_lat] = $_GET[lat];
	$data[driver_register_lng] = $_GET[lng];
	$data[guest_register_ps] = $_COOKIE[detect_user];
	$data[pax_regis] = $_GET[num_cus];

	$this->db->where('id', $_GET[order_id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "driver_pay_report";
	$data[id] = $_GET[order_id];
	$data[time] = time();

	return $data;
} 

public function change_plan(){
	if($_POST[price_plan]==""){
	 	return FALSE;
	 }
	 $_where['id'] = $_GET[order_id]; 
     $_select = array('*');
     $book = $this->Main_model->rowdata(TBL_ORDER_BOOKING,$_where);
	 	 $backup[order_id] = $book->id;
		 $backup[invoice] = $book->invoice;
		 $backup[status] = $book->status;
		 $backup[post_date] = time();
		 $backup[plan_id] = $book->plan_id;
		 $backup[price_park_unit] = $book->price_park_unit;
		 $backup[price_park_total] = $book->price_park_total;
		 $backup[price_person_unit] = $book->price_person_unit;
		 $backup[pax_regis] = $book->pax_regis;
		 $backup[pax] = $book->pax;
		 $backup[price_person_total] = $book->price_person_total;
		 $backup[price_all_total] = $book->price_all_total;
		 $backup[commission_persent] = $book->commission_persent;
		 $backup[total_commission] = $book->total_commission;
		 if($_POST[cause_change]==""){
		 	$_POST[cause_change] = 0;
		 }
		 $backup[cause_change] = $_POST[cause_change];
	 
	 $backup[result] = $this->db->insert('change_plan_logs', $backup);
	 
	 $update[price_person_unit] = 0;
	 $update[price_park_unit] = 0;
	 $update[commission_persent] = 0;
	 $this->db->where('id', $_GET[order_id]);
	 $update[result] = $this->db->update('order_booking', $update); 
	 
	 
	 $data[plan_id] = $_POST[price_plan];
	 $_where = array();
		$_where['i_shop_country_com_list'] = $_POST[price_plan];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';

		$list_price = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);

		foreach ($list_price as $key => $value) {
			$_where = array();
			$_where['id'] = $value->i_plan_product_price_name;
			$_select = array('s_col');
			$_order = array();
			$_order['id'] = 'asc';
			$price_name = $this->Main_model->rowdata(TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select);
			// return $price_name;
			$s_col = $price_name->s_col;
			if ($value->i_plan_product_price_name == 6) {
				$price_person_total = (1*$value->i_price) * (1*$_POST[adult]);
				// $data["aaaaaa".$s_col] = $value->s_topic_en;
				$data[$s_col] = 1*$value->i_price;;
				$data["price_person_total"] = 1*$price_person_total;
				
			}else{
				$data[$s_col] =  $value->i_price;
			}
			if($value->s_topic_en=="comision"){
				$data[check_tran_job] = 1;
			}else{
				$data[check_tran_job] = 0;
			}
			
		}
	 /*$data[price_person_unit] = $_POST[price_person_unit];
	 $data[price_park_unit] = $_POST[price_park_unit];
	 $data[commission_persent] = $_POST[commission_persent]; */
	 $this->db->where('id', $_GET[order_id]);
	 $data[result] = $this->db->update('order_booking', $data); 

	 $return[backup] = $backup;
	 $return[update] = $data;
	 $return[result] = $data[result];
//	 $return[time] = time();
//	 $return[post] = $_POST;
	 
	return $return;
}

public function driver_pay_report(){
	$data[check_driver_pay_report] = 1;
	$data[driver_pay_report_date] = time();

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "finish";
	$data[time] = time();

	return $data;
}

public function driver_complete(){
	$data[driver_complete] = 1;
	$data[driver_complete_date] = time();
	$data[driver_complete_lat] = $_GET[lat];
	$data[driver_complete_lng] = $_GET[lng];
	$data[remark_pay] = $_GET[remark_pay];
	$data[status] = "COMPLETED";

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[time] = time();

	return $data;
}

public function editpax(){
	$data['adult'] = $_GET[adult];
	$data['child'] = $_GET[child];
	$data['pax'] = $_GET[adult];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 

	return $data;
}

public function editadult(){
	$data['adult'] = $_GET[num];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 

	return $data;
}

public function editchild(){
	$data['child'] = $_GET[num];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 

	return $data;
}

public function place_companycount(){
	$this->db->select('count(*)');
	$this->db->from(TBL_SHOPPING_PRODUCT);
	$this->db->where('status','1');
	$query = $this->db->get();

	return $query->num_rows();
  		// $this->load->view('shop/place_company',$data);
}

public function car_count(){
	/*$login_id = $this->input->cookie('detect_user');
	$this->db->from(TBL_WEB_CARALL);
	$this->db->where('drivername',$login_id);
	$query = $this->db->get();*/
	
	$query = $this->db->query('SELECT * FROM web_carall where drivername = '.$_COOKIE[detect_user]);
//	echo $query->num_rows();

	return $query->num_rows();
  		// $this->load->view('shop/place_company',$data);
}

public function car_counthis(){
	$login_id = $this->input->cookie('detect_user');
		//echo $login_id;
  		// $this->db->select('count(*)');
	$this->db->from(TBL_WEB_CARALL);
	$this->db->where('drivername',$login_id);
	$query = $this->db->get();
		// echo $query->num_rows();
	return $query->num_rows();
  		// $this->load->view('shop/place_company',$data);
}

public function lab_acknowledge(){

	$data[lab_approve_job] = 1;
	$data[lab_approve_job_date] = time();
	$data[lab_approve_job_post] = $_POST[posted];
	$this->db->where('id', $_POST[id]);
	$data[result] = $this->db->update('order_booking', $data); 
	return $data;
}

public function update_time_toplace(){
	$id = $_POST[order_id];
	$data[airout_m] = $_POST[time];
	$data[update_date] = time();
	
	$this->db->where('id', $id);
	$data[result] = $this->db->update('order_booking', $data); 
	return $data;
}

public function lab_approved_pay(){
	$id = $_POST[order_id];
	$data_ob[driver_payment_date] = time();
	$data_ob[check_lab_pay] = 1;
	$this->db->where('id', $id);
	$data_ob[result] = $this->db->update('order_booking', $data_ob); 
	return $data_ob;
}

public function driver_approved_pay(){

	$id = $_GET[order_id];
	$data_ob[check_driver_pay] = 1;
	$data_ob[driver_pay_report_date] = time();
	$this->db->where('id', $id);
	$data_ob[result] = $this->db->update('order_booking', $data_ob); 
	return $data_ob;
}

public function editpax_regis(){
	$data['pax_regis'] = $_GET[pax_regis];
	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 

	return $data;
}

public function cancel_shop(){

		$data[status] = "CANCEL";
		$data[cancel_type] = $_POST[type_cancel];
		$data[driver_complete] = 0;
		$data[update_date] = time();

		$this->db->where('id', $_POST[order_id]);
		$data[result] = $this->db->update('order_booking', $data); 
		$data[order_id] = $_POST[order_id];

		$typname = "typname_".$_POST[type_cancel];
		$data_his[order_id] = $_POST[order_id];
		$data_his[type] = $_POST[type_cancel];
		$data_his[status] = "CANCEL";
		$data_his[i_status] = 0;
		$data_his[type_name] = $_POST[$typname];
		$data_his[user_cancel] = $_COOKIE[detect_user];
		$data_his[class_user_cancel] = $_COOKIE[detect_userclass];
		$data_his[posted] = $_COOKIE[detect_username];
		$data_his[post_date] = time();
		$data_his[update_date] = time();

		$data_his[result] = $this->db->insert('history_del_order_booking', $data_his);;
//	$data_his[result] = true;
		$data[history] = $data_his;

		return $data;
	}

public function taxi_approved_cancel(){
	
	$data[driver_complete] = 1;
	$data[update_date] = time();
	$this->db->where('id', $_GET[order_id]);
    $data[result] = $this->db->update('order_booking', $data); 
    
    $data2[i_status] = 1;
    $data2[user_approved] = $_COOKIE[detect_user];
    $data2[class_user_approved] = $_COOKIE[detect_userclass];
	$this->db->where('order_id', $_GET[order_id]);
    $data2[result] = $this->db->update('history_del_order_booking', $data); 
    
    $data[ord] = $data;
    $data[his] = $data2;
    
    return $data;
}

public function get_trans_com(){
    $order['driver_approve'] = 1;
    $order['driver_approve_pay_date'] = time();
	$this->db->where('id', $_GET[id]);
	$order[result] = $this->db->update('order_booking', $order); 
    
    $data['driver_approve'] = 1;
    $data['driver_approve_pay_date'] = time();
	$this->db->where('order_id', $_GET[id]);
   
	$data[result] = $this->db->update('pay_history_driver_shopping', $data); 
    
    $return[order] = $order;
    $return[his] = $data;
    $return['id'] = $_GET[id];
    return $return;
}

public function select_bank_after_change_plan(){
    $data['bank_taxi_id'] = $_POST[bank_user_select];
	$this->db->where('id', $_GET[id]);
   
	$data[result] = $this->db->update('order_booking', $data); 
    $data[id] = $_GET[id];
    return $data;
}

  /**
  * 
  * driver_topoint
	guest_receive
	guest_register
	driver_pay_report
	* 
  * *********** End
  * 
  */
  
}