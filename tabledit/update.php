<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.
require_once("includes/class.mysql.php");

header('Content-Type: application/json; charset=utf-8');
$table = 'app_language';
$username = 'admin_MANbooking';
$pass = '252631MANbooking';
$db_name = 'admin_app';
$input = filter_input_array(INPUT_POST);

//$mysqli = new mysqli('localhost', 'root', '123', 'admin_dddtrip');
$db = New DB();
$db->connectdb($db_name,$username,$pass);
$current_date = time();
mysql_query("SET NAMES utf8"); 
mysql_query("SET character_set_results=utf-8"); 
	
/*if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}
*/
if ($input['action'] === 'edit') {
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8"); 
  // $mysqli->query("UPDATE ap_language  SET s_eng ='" . $input['English'] . "', s_cn='" . $input['China'] . "', s_th='" . $input['Thai'] . "' WHERE i_id='" . $input['Id'] . "'");
 	$data[en] = $input['English'];
   	$data[cn] = $input['China'];
   	$data[th] = $input['Thai'];
   	$data[keyword] = $input['Keyword'];
   	$data[link] = $input['Link'];
   	$data[last_update] = $current_date;
    $data[result] = $db->update_db($table,$data,"id = '".$input['Id']."' "); 
} 

else if ($input['action'] === 'delete') {
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8"); 
//    $mysqli->query("UPDATE ap_language  SET i_deleted=1 WHERE i_id='" . $input['Id'] . "'");
   	$data[deleted] = 1;
   	$data[last_update] = $current_date;
    $data[result] = $db->update_db($table,$data,"id = '".$input['Id']."' "); 
} 

else if ($input['action'] === 'restore') {
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8"); 
//    $mysqli->query("UPDATE ap_language  SET i_deleted=0 WHERE i_id='" . $input['Id'] . "'");
	$data[deleted] = 0;
   	$data[last_update] = $current_date;
    $data[result] = $db->update_db($table,$data,"id = '".$input['Id']."' "); 
}

//mysqli_close($mysqli);

echo json_encode($data);
//echo $input['Thai'];
