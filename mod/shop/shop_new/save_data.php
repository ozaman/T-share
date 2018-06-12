<?php 
if ($_GET[action] == 'add')
	{
	$number = $_POST[adult];
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[car] = $db->select_query("SELECT * FROM   web_driver  where id = '" . $user_id . "'   ");
	$arr[car] = $db->fetch($res[car]);
	$_POST[namedriver] = $arr[car][name];
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

	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$result = $db->add_db('order_booking', array(
		"invoice" => "S$member_in",
		"code" => "$rand",
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
		"program" => "$_POST[program]",
		"transfer_date" => date('Y-m-d'),
		"ondate" => "$_POST[transfer_date_new]",
		"outdate" => "$_POST[transfer_date_new]",
		"airout_h" => "00",
		"airout_m" => "$_POST[time_num]",
		"airout_time" => "00".":"."$_POST[time_num]",
		"car_color" => "$_POST[car_color]",
		"car_type" => "$_POST[car_type]",
		"car_plate" => "$_POST[car_plate]",
		"check_use_car_id" => "$_POST[check_use_car_id]",
		"adult" => "$_POST[adult]",
		"child" => "$_POST[child]",
		"phone" => "$_POST[dri_phone]",
		"nation" => "$_POST[nation]",
		"booking_by" => "$_GET[driver]",
		"payment_type" => "$_POST[payment_type]",
		"drivername" => "$_GET[driver]",
		"namedriver" => "$_POST[namedriver]",
		"ondate_time" => "$_POST[ondate_time]",
		"posted" => "$_SESSION[data_user_driver]",
		"post_date" => "" . TIMESTAMP . "",
		"update_date" => "" . TIMESTAMP . ""
	));
	$db->closedb();
	echo json_encode($result);
	} 
?>

