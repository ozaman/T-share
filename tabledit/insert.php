<?php 

require_once("includes/class.mysql.php");
$username = 'admin_MANbooking';
$pass = '252631MANbooking';
$db_name = 'admin_app';
$table = 'app_language';

	
	if($_GET[action]=='type'){
		if($_POST[name_type]!=""){
			$db = New DB();
			$db->connectdb($db_name,$username,$pass);
			$current_date = date('Y-m-d h:i:s');
			$type[en] = $_POST[name_type];
			$type[last_update] = time();
			
			
			mysql_query("SET NAMES utf8"); 
			mysql_query("SET character_set_results=utf-8"); 
			$save_type = $db->add_db($table,$type); 
			echo $save_type;
		}else{
			echo 0;
		}
		

	}
	
	if($_GET[action]=='query_type'){
		$db = New DB();
		$db->connectdb($db_name,$username,$pass);
		mysql_query("SET NAMES utf8"); 
		mysql_query("SET character_set_results=utf-8"); 
		$res[other] = $db->select_query("select * from ".$table." ORDER BY id DESC LIMIT 1  ");
		  while($arr[other] = $db->fetch($res[other])) {
		  	 $lab_meet1[] = $arr[other];
		  }
		  echo json_encode($lab_meet1);
	}


	
?>