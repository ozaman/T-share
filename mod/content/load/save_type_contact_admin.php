<?php 
include('../../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
$table = 'shopping_contact_admin_type';

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
?>