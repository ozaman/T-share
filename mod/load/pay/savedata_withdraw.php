 <?php
 include('../../../includes/class.mysql.php');

	
	$db = New DB();
	$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	// $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
$arr[project] = $db->fetch($res[project]);
//echo $_POST[action].'===='.$arr[project][id];
$date = new DateTime();
// echo $date;
 
if($_POST[action]=="money_withdraw"){  
	// $db = New DB();
	// $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	// $date = new DateTime();
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[driver] = $arr[project][id];
	$data[bank_account] = $_POST[bank_name];
	$data[bank_number] = $_POST[bank_number];
	$data[username] = $_POST[driver];
	$data[deposit] = $_POST[amount];
	$data[deposit_bank] = $_POST[bank];
	$data[deposit_date] = $date->format('Y-m-d');
	$data[deposit_time] = $date->format('H:i');
	$data[post_date] = time();
	$data[type] = "WITHDRAW";
	$data[post_date_f] =  $date->format('Y-m-d');
	//add_db("deposit_history",array("field"=>"value")); 

	$res = $db->add_db("deposit_history",$data); 
	if ($res === TRUE) {
							echo "1";
						} else {
						    echo "0";
						}



				 	
}			
		
?>
