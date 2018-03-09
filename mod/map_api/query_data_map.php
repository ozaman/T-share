<?php
	include('../../includes/class.mysql.php');
define("DB_HOST","localhost");
define("DB_NAME_APP","admin_app");
define("DB_NAME","admin_web");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
$db = new DB();

if($_GET[request]=='place'){
	$_POST[province] = 1;
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[place] = $db->select_query("SELECT 
	id, topic_th, topic_cn, topic_en, lat, lng,   province, status, main,address
	FROM  shopping_product where province = '".$_POST[province]."' and status = 1 ");
	$key = 0;
	while($arr[place] = $db->fetch($res[place])){	
		$open_time = '';
		$icon = '';
		/*$res[open] = $db->select_query("SELECT * FROM  shopping_open_time where product_id = '".$arr[place][id]."' and status = 1 ");
		while($arr[open] = $db->fetch($res[open])){	
			$open_time[] = $arr[open];
		}*/
		$res[main] = $db->select_query("SELECT logo_code FROM  shopping_product_main where id = '".$arr[place][main]."' and status = 1 ");
		while($arr[main] = $db->fetch($res[main])){	
			$icon = $arr[main];
		}
	
		$data[$key][main] = $arr[place];	
//		$data[$key][opentime] = $open_time;	
		$data[$key][icon] = $icon;	
		$key++;
		
	}
	
	
	$return[stats] = '202';
	$return[data] = $data;
	$return[today] = date('D');
	 
	echo json_encode($return);
}

if($_GET[request]=='location_province'){
	
	/*$res[main] = $db->select_query("SELECT logo_code FROM  shopping_product_main where id = '".$arr[place][main]."' and status = 1 ");
	while($arr[main] = $db->fetch($res[main])){	
			$icon = $arr[main];
		}*/
		$url = "http://maps.google.com/maps/api/geocode/json?address=".$_GET[txt_province]."&sensor=false";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);
		$location[lat] = $response_a->results[0]->geometry->location->lat;
		$location[lng] = $response_a->results[0]->geometry->location->lng;
		$location[address] = $response_a->results[0]->address_components[0]->long_name;
		
		echo json_encode($location);
}

if($_GET[request]=='search_place'){
	
	$keyword = $_POST[keyword];
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[place] = $db->select_query("SELECT t1.id, t1.topic_th, t1.topic_cn, t1.topic_en, t1.lat, t1.lng, t1.province, t1.main,t2.logo_code,t2.topic_th as main_name
	FROM  shopping_product as t1 left join shopping_product_main as t2 on t1.main = t2.id
	where (t1.topic_en like '%".$keyword."%' 
	or t1.topic_th like '%".$keyword."%' 
	or t1.topic_cn like '%".$keyword."%' )
	and t1.status = 1 ");
	
	while($arr[place] = $db->fetch($res[place])){
		$data[] = $arr[place];
	}
	
	echo json_encode($data);
}
?>