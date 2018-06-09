<?php 
if ($_GET[action] == 'add')
	{
//		exit();
	// ////////// à¸„à¸³à¸™à¸§à¸“
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	// $res[price] = $db->select_query("SELECT * FROM  product_price_list_all where country =" . $_POST[nation] . "  and product_id	=" . $_POST[program] . " and plan_id=" . $_POST[price_plan] . " ORDER BY id  ");
	// $arr[price] = $db->fetch($res[price]);
	// // / plan
	// $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list_all WHERE  id=" . $_POST[price_plan] . " ");
	// $arr[plan] = $db->fetch($res[plan]);
	$number = $_POST[adult];
	// ////
	/*
	if($income_price_park<1){
	$income_price_park=0;
	}
	*/
	// $price_park_unit = $arr[price][price_park];
	// $price_person_unit = $arr[price][price_person];
	// if ($arr[extra_park][id])
	// 	{
	// 	$price_park_unit = $arr[extra_park][price_park];
	// 	$price_extra_park = 1;
	// 	}
	// if ($arr[extra_person][id])
	// 	{
	// 	$price_person_unit = $arr[extra_person][price_person];
	// 	$price_extra_person = 1;
	// 	}
	// $price_person_total = $price_person_unit * $number;
	// $price_all_total = $price_person_total + $price_park_unit;
	// /*
	// */
	// //  include ("mod/booking/sendmail/new.php");
	// if ($_POST[check_wait_status] == 'area')
	// 	{
	// 	$transfer_time = $_POST[transfer_time];
	// 	$back_to_place = $_POST[to_place_area];
	// 	}
	// if ($_POST[check_wait_status] == 'out')
	// 	{
	// 	$transfer_time = $_POST[transfer_time_airport];
	// 	$back_to_place = 193;
	// 	}
	// if ($_POST[check_wait_status] == 'no')
	// 	{
	// 	$transfer_time = 0;
	// 	$back_to_place = 0;
	// 	}
	// include ("mod/booking/load/check_price.php");
	// /  diver name
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[car] = $db->select_query("SELECT * FROM   web_driver  where id = '" . $user_id . "'   ");
	$arr[car] = $db->fetch($res[car]);
	$_POST[namedriver] = $arr[car][name];
	// /////////
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$next_increment = 0;
	$qShowStatus = "SHOW TABLE STATUS LIKE 'order_booking'";
	$qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
	$row = mysql_fetch_assoc($qShowStatusResult);
	$last_id = $row['Auto_increment'];
	$member_db = $row['Auto_increment'];
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
	$rand = substr(str_shuffle('123456789012345678901234567890') , 0, 30);
	// / invoice
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$result = $db->add_db('order_booking', array(
		"invoice" => "S$member_in",
		"code" => "$rand",
		// /// à¸‚à¸²à¸à¸¥à¸±à¸š
		"wait_status" => "$_POST[check_wait_status]",
		"transfer_time" => $transfer_time,
		"back_to_place" => $back_to_place,
		// ///////
		"plan_setting" => "$_POST[plan_setting]",
		"plan_id" => "$_POST[price_plan]",
		"plan_commission" => $arr[plan][plan_id],
		"price_park_unit" => $price_park_driver,
		"price_park_total" => $price_park_driver,
		"price_person_unit" => $price_person_driver,
		"price_person_total" => $all_price_person_driver,
		"price_all_total" => $price_park_driver + $all_price_person_driver,
		"price_extra_park" => $price_extra_park,
		"price_extra_person" => $price_extra_park,
		"income_price_park" => $income_price_park,
		"pax" => "$_POST[adult]",
		//
		"product" => "$_POST[program]",
		"program" => "$_POST[program]",
		"transfer_date" => "$_POST[transfer_date_new]",
		"ondate" => "$_POST[transfer_date_new]",
		"outdate" => "$_POST[transfer_date_new]",
		"airout_h" => "00",
		"airout_m" => "$_POST[time_num]",
		"airout_time" => "00".":"."$_POST[time_num]",
		/*
		"price_park" => "$_POST[price_park]",
		"price_person" => "$_POST[price_person]",
		"price_total" => "$_POST[price_total]",
		*/
		"car_color" => "$_POST[car_color]",
		"car_type" => "$_POST[car_type]",
		"car_plate" => "$_POST[car_plate]",
		"check_use_car_id" => "$_POST[check_use_car_id]",
		"adult" => "$_POST[adult]",
		"child" => "$_POST[child]",
		"baby" => "$_POST[baby]",
		"nation" => "$_POST[nation]",
		"name_pickup_place" => "$_POST[pickup_place]",
		"name_to_place" => "$_POST[to_place]",
		"booking_by" => "$_GET[driver]",
		"payment_type" => "$_POST[payment_type]",
		"drivername" => "$_GET[driver]",
		"namedriver" => "$_POST[namedriver]",
		"ondate_time" => "$_POST[ondate_time]",
		"passport_pic" => "$_POST[check_photo_passport]",
		"guest_name" => "$_POST[guest_name]",
		"posted" => "$_SESSION[data_user_driver]",
		"post_date" => "" . TIMESTAMP . "",
		"update_date" => "" . TIMESTAMP . ""
	));
	$db->closedb();
	echo json_encode($result);
	
	

  

	} 
?>

