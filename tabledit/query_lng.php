<?php
include('../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
mysql_query("SET NAMES UTF8"); 
mysql_query("SET character_set_results=utf-8"); 
if($_GET[type]="calender"){
	$lng = $_POST[lng];
	if($_POST[key]!=""){
		$like_key = "and keyword like '%".$_POST[key]."%' ";
	}
	$check = $db->num_rows('app_language','id','deleted = 0 '.$like_key);
	if($check>0){
		$res[result] = $db->select_query("SELECT * FROM app_language where deleted = '0' ".$like_key." ");
		while($arr[result] = $db->fetch($res[result])){ 
			$data[] = $arr[result];
		}
	}else{
		$data[] = "no rows";
	}
	$param[lng] = $lng;
	$param[key] = $_POST[key];
	
	$res[result] = $data;
	$res[row] = $check;
	$res[param] = $param;
	
	header('Content-Type: application/json');
	echo json_encode($res);
		
}
?>