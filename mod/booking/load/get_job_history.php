<?php 
	include('../../../includes/class.mysql.php');
	$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
	
	
		$filter_date = 'a.guest_topoint = 1 and a.arrival_date = "'.$_POST[date].'" ';
	
	// $driver = $_POST[driver];
	// $lng = $_GET[lng];
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	$date = date("H:i:s");
	$time = strtotime($date);
	$time = $time;
	$date_result = date("H:i:s", $time);		
			$res = $db->select_query("SELECT a.*, c.topic_en AS topic_en,
		       c.topic_cn AS topic_cn,
		       c.topic_th AS topic_th,
		       b.onsale_top AS pro_ontop,
		       b.id AS transfer_id,
		       b.stay,
		       b.stay_to,
		       b.cartype,
		       b.cost_a_sell AS cost_a_agent_all,
		       b.type,
		       b.post_date,
		       c.id AS car_id,
		       c.person AS person,
		       c.topic_en AS car_topic_en,
		       c.topic_th AS car_topic_th,
		       c.topic_cn AS car_topic_cn,
		       c.id AS pax_id,
		       c.pax AS pax_en,
		       c.pax_th AS pax_th,
		       c.pax_cn AS pax_cn,
		       c.topic AS topic_car,		       
		       c.car_model,  
		       b.aum_from,
		       b.aum_to,
		       b.place_default,
		       b.place_default_to,
		       b.code,
		       b.cost_a,
		       b.cost_a_sell,
		       b.cost_a_nett,
		       b.area
				FROM ap_order as a 				
            	left join web_transferproduct_utf as b ON b.id = a.product
           		left join web_car as c ON c.id = b.cartype 
				where ".$filter_date." and a.driver = '".$_POST[driver]."'");
			while($arr = $db->fetch($res)){ 
			
			$data[] = $arr;
			
			}
	echo json_encode($data);
	
	
	
?>
