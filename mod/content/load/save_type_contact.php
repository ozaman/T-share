<?php 
include('../../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
$table = 'shopping_contact_type';

if($_GET[action]=='add'){
	
	$data = array(
 		"name_th"=>$_POST[name_th],
 		"name_en"=>$_POST[name_en],
 		"name_cn"=>$_POST[name_cn],
		 "status"=>1,
		);
	
	$result = $db->add_db($table,$data);
	
	echo $result;
}
if($_GET[action]=='edit'){
	
	$data = array(
 		"name_th"=>$_POST[name_th],
 		"name_en"=>$_POST[name_en],
 		"name_cn"=>$_POST[name_cn],
		 "status"=>1,
		);
	
	$result = $db->update_db($table,$data,'id = "'.$_GET[id].'" ');

	echo $result;
}

if($_GET[action]=='del'){
	$data = array(
		 "status"=>0
		);
	$result = $db->update_db($table,$data,'id = "'.$_GET[id].'" ');
	echo $result;
}
if($_GET[action]=='restore'){
	$data = array(
		 "status"=>1
		);
	$result = $db->update_db($table,$data,'id = "'.$_GET[id].'" ');
	echo $result;
}
if($_GET[action]=='get_sub'){
		$res[sub] = $db->select_query("SELECT * FROM shopping_product_sub where main = '".$_GET[main]."' ORDER BY  topic_en ASC  ");
		while($arr[sub] = $db->fetch($res[sub])){ 
		
			$data[] = $arr[sub];
		
		}
	echo json_encode($data);	
}
if($_GET[action]=='get_amphur'){
		$res[sub] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID = '".$_GET[province]."' ORDER BY  name_th ASC  ");
		while($arr[sub] = $db->fetch($res[sub])){ 
		
			$data[] = $arr[sub];
		
		}
	echo json_encode($data);	
}
if($_GET[action]=='get_region'){
	$db->connectdb('admin_web','admin_MANbooking','252631MANbooking');
		$res[sub] = $db->select_query("SELECT * FROM web_province where area = '".$_GET[region]."' ORDER BY  name_th ASC  ");
		while($arr[sub] = $db->fetch($res[sub])){ 
		
			$data[] = $arr[sub];
		
		}
	echo json_encode($data);	
}
?>