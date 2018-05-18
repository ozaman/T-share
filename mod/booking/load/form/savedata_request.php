 <?php
 include('../../../../includes/class.mysql.php');

	
	$db = New DB();
	$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	// $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
$arr[project] = $db->fetch($res[project]);
//echo $_POST[action].'===='.$arr[project][id];

if($_POST[action]=="money_request"){  
	
	// $db = New DB();
	$date = new DateTime();
	// $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[driver] = $arr[project][id];
	$data[username] = $_POST[driver];
	$data[deposit] = $_POST[amount];
	$data[deposit_bank] = $_POST[bank];
	$data[deposit_date] = $_POST[date];
	$data[deposit_time] = $_POST[time];
	$data[post_date] = time();
	$data[bank_account] = $_POST[bank_name];
	$data[bank_number] = $_POST[bank_number];
	$data[post_date_f] = $date->format('Y-m-d');
	//add_db("deposit_history",array("field"=>"value")); 

	$res = $db->add_db("deposit_history",$data); 
	if ($res === TRUE) {
							echo "1";
						} else {
						    echo "0";
						}
// $sql = "INSERT INTO deposit_history (driver, username, deposit, deposit_bank, deposit_date, deposit_time, post_date)
// VALUES ('".$arr[project][id]."', '".$_POST[driver]."','".$_POST[amount]."','".$_POST[bank]."','".$_POST[date]."','".$_POST[time]."','".time()."')";
// // echo $sql;
// 						if ($db->select_query($sql) === TRUE) {
// 							echo "1";
// 						} else {
// 						    echo "0";
// 						}



				 	
}			
		
?>
