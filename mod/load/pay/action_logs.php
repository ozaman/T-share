<?php 



 include('../../../includes/class.mysql.php');

  
  $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
  
 mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	$filter_date = 'post_date_f = "'.$_POST[date].'" ';
  if ($_GET[action] == 'deposit_logs') {
  	

 //$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res = $db->select_query("SELECT * FROM  deposit_history where ".$filter_date." AND username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 
 while($arr = $db->fetch($res)){ 
			
			$data[] = $arr;
			
			}
	
  
 }
 echo json_encode($data);

 

	
?>